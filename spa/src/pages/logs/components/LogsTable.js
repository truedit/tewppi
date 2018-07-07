import React from 'react'
import { FORMAT_DATE } from '~/constant/helpers'
import Table from '~/components/UI/Table/Table'

export default class LogsTable extends React.Component {  
  renderRows = () => {
    return this.props.logs[this.props.currentPageNo].map((log, i) => {
      return (
        <tr key={i}>
          {this.renderCell(log.comment_type)}
          {this.renderCell(log.comment_content)}
          {this.renderCell(FORMAT_DATE(log.comment_date))}
        </tr>
      )
    })
  }

  renderCell (content) {
    return (
      <td className='comment column-comment has-row-actions column-primary'>
        <p>{ content }</p>
      </td>
    )
  }

  renderHead () {
    return (
      <thead>
        <tr>
          <th>Type</th>
          <th>Message</th>
          <th>Date</th>
        </tr>
      </thead>
    )
  }

  renderBody () {
    return (
      <tbody>
        { this.renderRows() }
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
