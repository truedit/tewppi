try {
    stage('Checkout') {
      step {
        git(url: 'https://github.com/truedit/tewppi.git', poll: true, branch: '$BRANCH_NAME', changelog: true, credentialsId: 'TruEdit_Github')
      }
    }
    stage('Setup Environment') {
      step {
        sh 'rm -rf ${WORKSPACE}/dist && cd src && composer install && cd ${WORKSPACE}/spa && yarn && npm install && cd ${WORKSPACE}/src/web/app/plugins/truedit/ && composer install '
      }
    }
    stage('Linting') {
      step {
        sh '${WORKSPACE}/src/vendor/bin/phpcs --runtime-set ignore_warnings_on_exit 1 --runtime-set ignore_errors_on_exit 1 --standard=WordPress --report=checkstyle --report-file=${WORKSPACE}/phpcs_checkstyle.xml --ignore=*/tests/*,*/node_modules/*,*/vendor/* ${WORKSPACE}/src/web/app/plugins/truedit'
      }
    }
    stage('Build TruEdit Plugin') {
      step {
        sh 'cd ${WORKSPACE} && npm run build '
      }
    }
    stage('Build getNEXT Plugin') {
      step {
        sh 'cd ${WORKSPACE} && npm run buildgn'
      }
    }
    stage('Archive Artifacts') {
      step {
        archiveArtifacts(artifacts: 'dist/*/*_wppi.zip', onlyIfSuccessful: true)
      }
    }
}
catch (caughtError) {
    err = caughtError
    currentBuild.result = "FAILURE"

    mail body: "${env.JOB_NAME}: ${err}",
    from: 'jenkins@maned.com',
    replyTo: 'mmiehling@maned.com',
    subject: 'Jenkins build failed',
    to: 'mmiehling@maned.com'

    throw err
}
finally {
    //Currently empty
}
