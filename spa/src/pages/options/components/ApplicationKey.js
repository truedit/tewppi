import React from 'react'

class ApplicationKey extends React.Component {
  constructor (props) {
    super(props)

    this.handleChange = this.handleChange.bind(this)
  }

  handleChange (e) {
    this.props.onApplicationKeyChange(e.target.value)
  }

  renderLabel () {
    return <label className='form-label'>Application Key</label>
  }

  renderInput () {
    return (
      <div className='form-item'>
        <textarea
          name='app_api_key'
          rows='3'
          value={this.props.applicationKey}
          required
          onChange={this.handleChange}
        />
        <p className='help-text'>
          Please contact TruEdit to receive your Application Key.
          If you have any questions about this plugin, need an Application Key,
          or anything else do not hesitate to contact our&nbsp;
          <a href='mailto:support@truedit.com'>support team</a>.
        </p>
      </div>
    )
  }

  render () {
    return (
      <div className='form-group'>
        {this.renderLabel()}
        {this.renderInput()}
      </div>
    )
  }
}

export default ApplicationKey
