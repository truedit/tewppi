class SavingService {
  static setHostFromForm (hostOption, hostUrl) {
    return hostOption === 'Other' ? hostUrl : hostOption
  }
}

export default SavingService
