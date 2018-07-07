import React from 'react'
import PostboxWidget from '~/components/UI/PostboxWidget/PostboxWidget'

export default class Welcome extends React.Component {
  render () {
    return (
      <PostboxWidget title='Dashboard'>
        <div>
          <h1>Welcome to TruEdit</h1>
          <p>
            TruEdit® is the secure, cloud-based content and workflow management
            system, that centralizes content creation and manages workflows for
            mobile, print, and web publishing. Managing, producing, and
            delivering content is easier than ever.
          </p>
          <p>
            With TruEdit’s collaborative workflows, teams can manage projects
            from planning to publishing. Authors, editors, and designers can
            work with confidence, knowing the status of a project and who it is
            assigned to. TruEdit simplifies and automates the content creation
            process, so you can work more efficiently and productively.
          </p>
          <p>
            <a
              className='button'
              href='https://TruEdit.com/'
              target='_blank'
              rel='noopener noreferrer'>
              Website
            </a>
          </p>
        </div>
      </PostboxWidget>
    )
  }
}
