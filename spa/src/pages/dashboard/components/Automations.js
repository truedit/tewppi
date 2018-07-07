import React from 'react'
import PostboxWidget from '~/components/UI/PostboxWidget/PostboxWidget'
import { URL_ARGIFY } from '~/constant/helpers'
import AutomationsTable from './AutomationsTable'

export default class Automations extends React.Component {
  renderButtons () {
    return (
      <p className='button-group'>
        <a className='button' href={this.props.url + 'automations'}>
          View All
        </a>
        <a
          className='button'
          href={this.props.url + 'automations' + URL_ARGIFY({ create: true })}>
          Create
        </a>
      </p>
    )
  }

  render () {
    return (
      <PostboxWidget title='Recent Automations'>
        <AutomationsTable automations={this.props.automations} />
        {this.renderButtons()}
      </PostboxWidget>
    )
  }
}
