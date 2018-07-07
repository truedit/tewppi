import React from 'react'
import PostboxWidget from '~/components/UI/PostboxWidget/PostboxWidget'
import LogsTable from './LogsTable'

export default class Logs extends React.Component {
  renderViewAllButton () {
    return (
      <p>
        <a className='button' href={this.props.url + 'logs'}>View All</a>
      </p>
    )
  }

  render () {
    return (
      <PostboxWidget title='Logs'>
        <LogsTable logs={this.props.logs} />
        {this.renderViewAllButton()}
      </PostboxWidget>
    )
  }
}
