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
      sh 'echo Path: $PATH'
      sh 'phpcs --standard=WordPress-VIP-Go,WordPressVIPMinimum --report=summary --report-file=${WORKSPACE}/phpcs_summary.txt ${WORKSPACE}/dist/*/truedit'
    }
  }
  stage('Publish Linting Results') {
    node('Linux') {
      checkstyle defaultEncoding: '', healthy: '', pattern: 'phpcs_checkstyle.xml', unHealthy: '', useStableBuildAsReference: true
    }
  }
  stage('Archive Artifacts') {
    node('Linux') {
      //sh 'echo "Not currently archiving this build."'
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
