import React from 'react'
import Postbox from '~/components/UI/Postbox/Postbox'
import Form from './Form'

class Configuration extends React.Component {
  render () {
    return (
      <Postbox title='Configuration'>
        <Form
          setLoading={this.props.setLoading}
          addNotice={this.props.addNotice}
        />
      </Postbox>
    )
  }
}

export default Configuration
