import React from 'react'
import Postbox from '~/components/UI/Postbox/Postbox'
import { GET_PREREQUISITES } from '~/constant/requests'
import NoticeModel from '~/models/NoticeModel'
import Table from '~/components/UI/Table/Table'

class PluginRequirements extends React.Component {
  constructor (props) {
    super(props)

    this.state = { prerequisites: [] }
  
    this.getPrerequisites()
  }

  getPrerequisites = () => {
    GET_PREREQUISITES()
      .then((res) => {
        this.setState({
          prerequisites: res.data
        });
      })
      .catch((err) => {
        this.props.addNotice(
          new NoticeModel('error', err.message, err.warnings)
        )
      })
  }

  renderTableHead () {
    return (
      <thead>
        <tr>
          <th>Name</th>
          <th>State</th>
        </tr>
      </thead>
    )
  }

  renderTableBody () {
    return (
      <tbody>
        {
          Object.entries(this.state.prerequisites).map((prerequisite, i) =>
            this.renderTableRow(prerequisite, i)
          )
        }
      </tbody>
    )
  }

  renderTableRow (prerequisite, i) {
    return (
      <tr key={i}>
        <td>{ prerequisite[1].name }</td>
        <td>
          {
            prerequisite[1].boolean
            ? <span className="dashicons dashicons-yes c-green"></span>
            : <span className="dashicons dashicons-no c-red"></span>
          }
        </td>
      </tr>
    )
  }
  
  renderTable () {
    return (
      <Table>
        {this.renderTableHead()}
        {this.renderTableBody()}
      </Table>
    )
  }

  render () {
    return (
      <Postbox title="Plugin Requirements">
        {this.renderTable()}
      </Postbox>
    )
  }
}

export default PluginRequirements
