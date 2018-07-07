import React from 'react'

class CustomHost extends React.Component {
  constructor (props) {
    super(props)

    this.handleChange = this.handleChange.bind(this)
  }

  handleChange (e) {
    this.props.onCustomHostChange(e.target.value)
  }

  isHostCustom () {
    return this.props.hostOption === 'Other'
  }

  formGroupClass () {
    return this.isHostCustom() ? 'form-group-show' : 'form-group-hide'
  }

  renderLabel () {
    return <label className='form-label'>Custom Host</label>
  }

  renderInput () {
    return (
      <div className='form-item'>
        <input
          name='host_url'
          type='text'
          pattern='^([a-zA-Z0-9]([a-zA-Z0-9\-]{0,61}[a-zA-Z0-9])?\.)+([a-zA-Z]{2,10})+(:[0-9]{2,5})?'
          value={this.props.hostUrl}
          required={this.isHostCustom()}
          onChange={this.handleChange}
        />
        <p className='help-text'>
          Example: <br />
          mysite.com <br />
          api.mysite.com <br />
          api.mysite.com:1234
        </p>
      </div>
    )
  }

  render () {
    return (
      <div className={'form-group ' + this.formGroupClass()}>
        {this.renderLabel()}
        {this.renderInput()}
      </div>
    )
  }
}

export default CustomHost
