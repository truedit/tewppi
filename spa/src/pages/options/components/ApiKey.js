import React from 'react'

class ApiKey extends React.Component {
  constructor (props) {
    super(props)

    this.handleChange = this.handleChange.bind(this)
  }

  handleChange (e) {
    this.props.onApiKeyChange(e.target.value)
  }

  renderLabel () {
    return <label className='form-label'>API Key</label>
  }

  renderInput () {
    return (
      <div className='form-item'>
        <textarea
          name='api_key'
          rows='3'
          value={this.props.apiKey}
          required
          onChange={this.handleChange}
        />
        <p className='help-text'>
            Your API Key can be found in TruEdit.
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

export default ApiKey
