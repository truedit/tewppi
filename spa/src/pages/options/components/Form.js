import React from 'react'

import {
  UPDATE_OPTIONS,
  TEST_API_KEY,
  GET_REGIONS,
  GET_OPTIONS
} from '~/constant/requests'

import LoadingService from '../services/LoadingService'
import SavingService from '../services/SavingService'

import NoticeModel from '~/models/NoticeModel'

import Host from './Host'
import CustomHost from './CustomHost'
import ApiKey from './ApiKey'
import ApplicationKey from './ApplicationKey'
import SaveButton from './SaveButton'

class Form extends React.Component {
  constructor(props) {
    super(props)
    
    this.setHostOption = this.setHostOption.bind(this)
    this.setHostUrl = this.setHostUrl.bind(this)
    this.setApiKey = this.setApiKey.bind(this)
    this.setApplicationKey = this.setApplicationKey.bind(this)
    this.handleSubmit = this.handleSubmit.bind(this)

    this.state = {
      hosts: [],
      hostOption: '',
      hostUrl: '',
      applicationKey: '',
      apiKey: '',
      processingSave: false
    }

    this.loadHostsAndOptions()
  }

  /* Loading logic */

  loadOptions = (res) => {
    if (res.status === 200) {
      this.setState({
        hostOption: LoadingService.getHostOptionToLoad(
          res.data, this.state.hosts
        ),
        hostUrl: LoadingService.getHostUrlToLoad(res.data, this.state.hosts),
        apiKey: res.data.api_key,
        applicationKey: res.data.app_api_key
      })
      this.props.setLoading(false)
    } else {
      console.error(res)
    }
  }

  handleLoadFailure = (err) => {
    this.props.addNotice(new NoticeModel('error', err.message, err.warnings))
    this.props.setLoading(false);
  }

  loadHostsAndOptions = (res) => {
    GET_REGIONS()
      .then(res => {
        this.setState({ hosts: res.data })
        return GET_OPTIONS()
      })
      .then(this.loadOptions)
      .catch(this.handleLoadFailure)
    }

    /* Set form fields logic */

    setHostOption (hostOption) {
      this.setState({ hostOption: hostOption })
    }

    setHostUrl (hostUrl) {
      this.setState({ hostUrl: hostUrl })
    }

    setApplicationKey (applicationKey) {
      this.setState({ applicationKey: applicationKey })
    }

    setApiKey (apiKey) {
      this.setState({ apiKey: apiKey })
    }

    /* Saving logic */

    setSaveSuccessfulNotice (res) {
      if (res.status === 200) {
        this.props.addNotice(new NoticeModel(
            'success',
            'Successfully saved the configuration settings.'
        ))
      } else {
        console.error(res);
      }
    }

    setVerifySuccessfulNotice = (res) => {
      let tenantName = res.data.tenantName;

      this.props.addNotice(new NoticeModel(
        'success',
        'Successfully connected to TruEdit, tenant ' + tenantName +
          '.'
      ))

      this.setState({ processingSave: false })
    }

    handleUpdateAndVerifyError (err) {
      this.props.addNotice(new NoticeModel('error', err.message, err.warnings))
      this.setState({ processingSave: false })
    }

    handleSubmit(e) {
      e.preventDefault()

      this.setState({ processingSave: true })

      UPDATE_OPTIONS({
        host: SavingService.setHostFromForm(
          this.state.hostOption, this.state.hostUrl
        ),
        api_key: this.state.apiKey,
        app_api_key: this.state.applicationKey
      })
        .then(res => {
          this.setSaveSuccessfulNotice(res)
          return TEST_API_KEY()
        })
        .then(res => { 
          this.setVerifySuccessfulNotice(res)
        })
        .catch((res) => { this.handleUpdateAndVerifyError(res) })
    }

    /* Render logic */

    renderFormFields () {
      return (
        <div className="form-groups">
          <Host
            hostOption={this.state.hostOption}
            hosts={this.state.hosts}
            onHostOptionChange={this.setHostOption}
          />
          <CustomHost
            hostUrl={this.state.hostUrl}
            hostOption={this.state.hostOption}
            onCustomHostChange={this.setHostUrl}
          />
          <ApiKey
            apiKey={this.state.apiKey}
            onApiKeyChange={this.setApiKey}
          />
          <ApplicationKey
            applicationKey={this.state.applicationKey}
            onApplicationKeyChange={this.setApplicationKey}
          />
          <SaveButton processingSave={this.state.processingSave} />
        </div>
      )
    }

    render () {
      return (
        <form
          className='form'
          data-name='save'
          onSubmit={this.handleSubmit}
          autoComplete='off'
        >
          {this.renderFormFields()}
      </form>
    )
  }
}

export default Form
