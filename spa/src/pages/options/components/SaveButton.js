import React from 'react'

class SaveButton extends React.Component {
  renderButton () {
    return (
      <button
        className='button'
        disabled={this.props.processingSave}
        type='submit'
        value='save'
      >
        {
          this.props.processingSave
            ? <i className='spinner is-active' />
            : 'Save and Verify'
        }
      </button>
    )
  }

  render () {
    return (
      <div className='form-group'>
        {this.renderButton()}
      </div>
    )
  }
}

export default SaveButton
