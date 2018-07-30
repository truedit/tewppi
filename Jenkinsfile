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
    stage('Linting') {
      steps {
        sh '${WORKSPACE}/src/vendor/bin/phpcs --runtime-set ignore_warnings_on_exit 1 --runtime-set ignore_errors_on_exit 1 --standard=WordPress --report=checkstyle --report-file=${WORKSPACE}/phpcs_checkstyle.xml --ignore=*/tests/*,*/node_modules/*,*/vendor/* ${WORKSPACE}/src/web/app/plugins/truedit'
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
