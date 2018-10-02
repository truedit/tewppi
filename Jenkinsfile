try {
  properties([buildDiscarder(logRotator(artifactDaysToKeepStr: '', artifactNumToKeepStr: '', daysToKeepStr: '', numToKeepStr: '3')), [$class: 'GithubProjectProperty', displayName: '', projectUrlStr: 'https://github.com/truedit/tewppi/'], pipelineTriggers([pollSCM('H * * * * ')])])
  stage('Checkout') {
    node('Linux') {
      checkout scm
    }
  }
  stage('Setup Environment') {
    node('Linux') {
      sh 'rm -rf ${WORKSPACE}/dist && cd src && composer install && cd ${WORKSPACE}/spa && yarn && npm install && cd ${WORKSPACE}/src/web/app/plugins/truedit/ && composer install '
    }
  }
  stage('Build TruEdit Plugin') {
    node('Linux') {
      sh 'cd ${WORKSPACE} && npm run build '
    }
  }
  stage('Checking PHP') {
    node('Linux') {
      sh 'phpcs --runtime-set ignore_warnings_on_exit 1 --runtime-set ignore_errors_on_exit 1 --standard=WordPress-VIP-Go --report=checkstyle --report-file=${WORKSPACE}/vip_go_phpcs_checkstyle.xml ${WORKSPACE}/dist/*/truedit'
      sh 'phpcs --runtime-set ignore_warnings_on_exit 1 --runtime-set ignore_errors_on_exit 1 --standard=WordPressVIPMinimum --report=checkstyle --report-file=${WORKSPACE}/vip_min_phpcs_checkstyle.xml ${WORKSPACE}/dist/*/truedit'
    }
  }
  stage('Publish Linting Results') {
    node('Linux') {
      checkstyle defaultEncoding: '', healthy: '', pattern: '*_checkstyle.xml', unHealthy: '', useStableBuildAsReference: true
      /*def checkstyle = scanForIssues tool: [$class: 'Checkstyle'], pattern: '**_checkstyle.xml'
      publishIssues issues:[checkstyle]

      publishIssues id:'analysis', name:'PHPCS Results', 
            issues:[checkstyle], 
            filters:[includePackage('io.jenkins.plugins.analysis.*')]
      */
    }
  }
  stage('Archive Artifacts') {
    node('Linux') {
      archiveArtifacts(artifacts: 'dist/*/*_wppi.zip', onlyIfSuccessful: true)
    }
  }
  stage('Publish Artifacts') {
    node('Linux') {
      s3Upload consoleLogLevel: 'INFO', dontWaitForConcurrentBuildCompletion: false, entries: [[bucket: 's3nvcodevit02-public/downloads/vipGo', excludedFile: '', flatten: true, gzipFiles: true, keepForever: false, managedArtifacts: false, noUploadOnFailure: true, selectedRegion: 'us-east-1', showDirectlyInBrowser: false, sourceFile: '*_checkstyle.xml,dist/*/*_wppi.zip', storageClass: 'REDUCED_REDUNDANCY', uploadFromSlave: true, useServerSideEncryption: true]], pluginFailureResultConstraint: 'UNSTABLE', profileName: 'TruEdit S3 Profile', userMetadata: []
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
