pipeline {
  agent any
  stages {
    stage('Checkout') {
      steps {
        git(url: 'https://github.com/truedit/tewppi.git', poll: true, branch: 'develop', changelog: true, credentialsId: 'CodeCommit')
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
    stage('Build getNEXT Branded Plugin') {
      steps {
        sh 'cd ${WORKSPACE} && npm run buildgn'
      }
    }
    stage('Archive Artifacts') {
      steps {
        archiveArtifacts(artifacts: 'dist/*/*_wppi.zip', onlyIfSuccessful: true)
      }
    }
    stage('Publish Artifacts to S3') {
      steps {
        sh 'echo "Publish to: s3nvcodevit01-assets/artifacts/ccnvjndevenrep07-wppi/$BRANCH_NAME"'
      }
    }
  }
}
