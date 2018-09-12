try {
  properties([buildDiscarder(logRotator(artifactDaysToKeepStr: '', artifactNumToKeepStr: '', daysToKeepStr: '', numToKeepStr: '3')), [$class: 'GithubProjectProperty', displayName: '', projectUrlStr: 'https://github.com/truedit/tewppi/'], pipelineTriggers([pollSCM('H * * * * ')])])
  stage ('Pre-flight') {
    node('Master') {
      sh 'echo Branch is $BRANCH_NAME'
    }
  }
  stage('Checkout') {
    node('Master') {
      checkout scm
    }
  }
  stage('Setup Environment') {
    node('Master') {
      sh 'rm -rf ${WORKSPACE}/dist && cd src && composer install && cd ${WORKSPACE}/spa && yarn && npm install && cd ${WORKSPACE}/src/web/app/plugins/truedit/ && composer install '
    }
  }
  stage('Linting') {
    node('Master') {
      sh 'phpcs --runtime-set ignore_warnings_on_exit 1 --runtime-set ignore_errors_on_exit 1 --standard=WordPress-VIP-Go --report=checkstyle --report-file=${WORKSPACE}/phpcs_checkstyle.xml --ignore=*/test*/*,*/vendor/* ${WORKSPACE}/src/web/app/plugins/truedit'
    }
  }
  stage('Build TruEdit Plugin') {
    node('Master') {
      sh 'cd ${WORKSPACE} && npm run build '
    }
  }
  stage('Build getNEXT Plugin') {
    node('Master') {
      //git branch: 'rebrand', credentialsId: 'jenkinsGitCCPI', url: 'https://git-codecommit.us-east-1.amazonaws.com/v1/repos/wordPressPluginFork'
      //sh 'cd ${WORKSPACE} && npm run buildgn'
      sh 'echo "Not currently building gn version"'
    }
  }
  stage('Publish Linting Results') {
    node('Master') {
      checkstyle defaultEncoding: '', healthy: '', pattern: 'phpcs_checkstyle.xml', unHealthy: '', useStableBuildAsReference: true
    }
  }
  stage('Archive Artifacts') {
    node('Master') {
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
