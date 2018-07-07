import React from 'react'

import { URL } from '~/constant/settings'
import { GET_DASHBOARD } from '~/constant/requests'

import PageLoader from '~/components/UI/PageLoader/PageLoader'
import NoticeModel from '~/models/NoticeModel'

import '../styles/Dashboard.css'
import Notices from '~/components/UI/Notice/Notice'

import Welcome from './Welcome'
import Configuration from './Configuration'
import Logs from './Logs'
import Automations from './Automations'

export default class Dashboard extends React.Component {
  constructor (props) {
    super(props)

    this.state = {
      loading: true,
      dashboard: {
        has: {},
        automations: [],
        logs: []
      },
      error: null
    }

    this.getDashboard()
  }

  getDashboard () {
    GET_DASHBOARD()
      .then(res => {
        this.setState({
          loading: false,
          dashboard: res.data
        })
      })
      .catch(err => {
        this.setState({
          loading: false,
          error: new NoticeModel('error', err.message, err.warnings)
        })
      })
  }

  renderConfiguration () {
    if (this.state.dashboard.has.verified === true) return
    return <Configuration url={URL} />
  }

  renderInformation () {
    if (this.state.dashboard.has.verified === false) return
    return (
      <div className='dashboard-secondary'>
        <div>
          <Automations
            automations={this.state.dashboard.automations}
            url={URL}
          />
          <Logs logs={this.state.dashboard.logs} url={URL} />
        </div>
      </div>
    )
  }

  renderDashboard () {
    return (
      <div id='dashboard-widgets' className='metabox-holder'>
        <div className='dashboard-primary'>
          <div>
            <Welcome />
          </div>
        </div>
        <PageLoader shouldSpin={this.state.loading}>
          {this.renderConfiguration()}
          {this.renderInformation()}
        </PageLoader>
      </div>
    )
  }

  render () {
    return (
      <div>
        <div id='dashboard-widgets-wrap'>
          {
            this.state.error === null
              ? this.renderDashboard()
              : <Notices notice={this.state.error} />
          }
        </div>
      </div>
    )
  }
}
