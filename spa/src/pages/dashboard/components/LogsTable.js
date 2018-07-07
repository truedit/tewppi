import React from 'react'
import Table from '~/components/UI/Table/Table'
import { FORMAT_DATE } from '~/constant/helpers'

export default class LogsTable extends React.Component {
  renderHead () {
    return (
      <thead>
        <tr>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
    )
  }

  renderBody () {
    return (
      <tbody>
        {
          this.props.logs.map((log, i) =>
            <tr key={i}>
              <td>{ log.comment_content }</td>
              <td>{ FORMAT_DATE(log.comment_date) }</td>
            </tr>
          )
        }
      </tbody>
    )
  }

  render () {
    return (
      <Table>
        {this.renderHead()}
        {this.renderBody()}
      </Table>
    )
  }
}
