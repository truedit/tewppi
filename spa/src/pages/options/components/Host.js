import React from 'react'

class Host extends React.Component {
  constructor (props) {
    super(props)

    this.handleChange = this.handleChange.bind(this)
  }

  handleChange (e) {
    this.props.onHostOptionChange(e.target.value)
  }

  renderLabel () {
    return <label className='form-label'>Host</label>
  }

  renderInput () {
    return (
      <div className='form-item'>
        <select
          name='host_options'
          onChange={this.handleChange}
          value={this.props.hostOption}
          required
        >
          <option value=''>Please select</option>
          {
            this.props.hosts.map((host, i) =>
              <option key={i} value={host.domain}>{ host.label }</option>)
          }
        </select>
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

export default Host
