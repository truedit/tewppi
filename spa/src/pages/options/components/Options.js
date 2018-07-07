import React from 'react';

import PageLoader from '~/components/UI/PageLoader/PageLoader'
import Notices from '~/components/UI/Notices/Notices'

import PluginRequirements from './PluginRequirements'
import Configuration from './Configuration'

export default class Options extends React.Component {
  constructor(props) {
    super(props)

    this.state = {
      loading: true,
      notices: []
    }
  }

  addNotice = (notice) => {
    this.setState({ notices: this.state.notices.concat([notice]) })
  }

  setLoading = (loading) => {
    this.setState({ loading: loading })
  }

  render() {
    return (
      <div>
        <Notices notices={this.state.notices} />
        <PageLoader shouldSpin={this.state.loading}>
          <div className='flex'>
            <div className='flex-item'>
              <PluginRequirements addNotice={this.addNotice} />
            </div>
            <div className='flex-item'>
              <Configuration
                setLoading={this.setLoading}
                addNotice={this.addNotice}
              />
            </div>
          </div>
        </PageLoader>
      </div>  
    )
  }
}
