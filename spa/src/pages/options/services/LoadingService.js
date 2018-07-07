class LoadingService {
  static findHost (host, hosts) {
    if (hosts.find(aHost => aHost.domain === host)) {
      return host
    } else {
      return null
    }
  }

  static getHostOptionToLoad (resultData, hosts) {
    if (LoadingService.findHost(resultData.host, hosts)) {
      return resultData.host
    } else if (resultData.host) {
      return 'Other'
    } else {
      return 'Please select'
    }
  }

  static getHostUrlToLoad (resultData, hosts) {
    if (LoadingService.getHostOptionToLoad(resultData, hosts) === 'Other') {
      return resultData.host
    } else {
      return ''
    }
  }
}

export default LoadingService
