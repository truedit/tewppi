const http = require('http')
const fs = require('fs')
const process = require('process')
const child_process = require('child_process')

const API_SPEC = 'https://tech.truedit.com/api/v2/api-docs'
const BIN_FOLDER = process.cwd() + '/bin/'
const SWAGGER_PATH = BIN_FOLDER + 'swagger-gen.jar'
const SWAGGER_DOWNLOAD = 'http://central.maven.org/maven2/io/swagger/swagger-codegen-cli/2.3.1/swagger-codegen-cli-2.3.1.jar'
const GENERATED_PATH = 'SwaggerClient-php'
const TARGET_PATH = process.cwd() + '/src/web/app/plugins/truedit/'
const LIB_PATH = TARGET_PATH + 'lib/truedit-api-php/'

try {
    fs.mkdirSync(BIN_FOLDER)
} catch (e) {
    // bin folder probably exists
}

console.log('Checking for Swagger JAR...')
if (!fs.existsSync(SWAGGER_PATH)) {
    console.log('Not found! Downloading...')
    download_swagger(() => {
        console.log('Success!')
        run_swagger()
    }, console.log)
} else {
    console.log('Found!')
    run_swagger()
}

function download_swagger(success, error) {
    var file = fs.createWriteStream(SWAGGER_PATH)
    var request = http.get(SWAGGER_DOWNLOAD, (res) => {
        if (res.statusCode != 200) {
            return err(new Error('response code was: ' + res.statusCode))
        }
        res.pipe(file)
        file.on('finish', () => file.close(success))
        file.on('error', err)
    })
    request.on('error', err)

    function err (e) {
        fs.unlink(SWAGGER_PATH)
        return error('Unable to download Swagger JAR: ' + e.message)
    }
}

function run_swagger() {
    try {
        var tmp = fs.mkdtempSync('apigen')
        if (!tmp.endsWith('/')) tmp += '/'
        cmd(`java -jar ${SWAGGER_PATH} generate -i ${API_SPEC} -l php -o ${tmp}`)

        console.log('Moving generated files...')
        cmd(`rm -rf ${LIB_PATH}`)
        fs.renameSync(tmp + GENERATED_PATH, LIB_PATH)
        cmd(`rm -rf ${tmp}`)

        var composerFile = fs.readFileSync(LIB_PATH + 'composer.json', 'utf-8')
        composerFile = composerFile.replace(/GIT_USER_ID/g, 'truedit').replace(/GIT_REPO_ID/g, 'api-php')
        fs.writeFileSync(LIB_PATH + 'composer.json', composerFile)

        console.log('Installing dependancies...')
        cmd(`cd ${TARGET_PATH} && composer install`)

        console.log('Done!')
    } catch (e) {
        console.log('Error running Swagger!')
        console.log(e)
    }

    function cmd (str) {
        console.log('Running', str)
        child_process.execSync(str, { stdio:[0,1,2] })
    }
}

