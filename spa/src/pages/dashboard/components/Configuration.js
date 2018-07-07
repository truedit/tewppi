import React from 'react'
import PostboxWidget from '~/components/UI/PostboxWidget/PostboxWidget'

export default class Configuration extends React.Component {
  render () {
    return (
      <div className='dashboard-secondary'>
        <div>
          <PostboxWidget title='Configuration'>
            <p>TruEdit plugin requires an API and Application Key to be set.</p>
            <p>Visit this page to set them up.</p>
            <p>
              <a className='button' href={this.props.url + 'options'}>
                Setup Configuration
              </a>
            </p>
          </PostboxWidget>
        </div>
      </div>
    )
  }
}
