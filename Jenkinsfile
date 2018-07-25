pipeline {
  agent any
  stages {
    stage('Checkout') {
      steps {
        git(url: 'https://github.com/truedit/tewppi.git', poll: true, branch: '$BRANCH_NAME', changelog: true, credentialsId: 'TruEdit_Github')
      }
    }
    stage('Setup Environment') {
      steps {
        sh 'rm -rf ${WORKSPACE}/dist && cd src && composer install && cd ${WORKSPACE}/spa && yarn && npm install && cd ${WORKSPACE}/src/web/app/plugins/truedit/ && composer install '
      }
    }
    stage('Build Plugin') {
      steps {
        sh 'cd ${WORKSPACE} && npm run build '
      }
    }
    stage('Archive Artifacts') {
      steps {
        archiveArtifacts(artifacts: 'dist/*/*_wppi.zip', onlyIfSuccessful: true)
      }
    }
  }
}
