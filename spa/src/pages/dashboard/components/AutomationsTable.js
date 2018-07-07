import React from 'react'
import Table from '~/components/UI/Table/Table'
import { FORMAT_DATE } from '~/constant/helpers'

export default class AutomationsTable extends React.Component {
  renderHead () {
    return (
      <thead>
        <tr>
          <th>Name</th>
          <th>Last Executed</th>
        </tr>
      </thead>
    )
  }

  renderBody () {
    return (
      <tbody>
        {
          this.props.automations.map((auto, i) =>
            <tr key={i}>
              <td>{ auto.post_meta.json.name }</td>
              <td>{ FORMAT_DATE(auto.post_meta.json.lastExecuted) }</td>
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
