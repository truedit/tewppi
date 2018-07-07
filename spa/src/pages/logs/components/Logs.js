import React from 'react'

import { GET_LOGS } from '~/constant/requests'
import { GET_URL_PARAMS } from '~/constant/helpers'

import Postbox from '~/components/UI/Postbox/Postbox'
import PageLoader from '~/components/UI/PageLoader/PageLoader'

import Notices from '~/components/UI/Notice/Notice'
import NoticeModel from '~/models/NoticeModel'

import LogsTable from './LogsTable'
import Pagination from './Pagination'

export default class Logs extends React.Component {
  constructor (props) {
    super(props)

    this.state = {
      notices: [],
      loading: true,
      refreshing: false
    }

    this.currentPageNo = this.getCurrentPageNo()
    this.totalPages = 0
    this.logs = { [this.currentPageNo]: [] }
    this.getLogs(this.currentPageNo)

    this.goToPreviousPage = this.goToPreviousPage.bind(this)
    this.goToNextPage = this.goToNextPage.bind(this)
  }

  getCurrentPageNo () {
    const params = GET_URL_PARAMS()
    return params['page_no'] ? parseInt(params['page_no']) : 1
  }

  getLogs (pageNo) {
    const LOGS_PER_PAGE = 10
    GET_LOGS(pageNo, LOGS_PER_PAGE)
      .then(res => {
        if (res.status === 200) {
          this.logs[pageNo] = res.data
          this.currentPageNo = pageNo
          this.totalPages = res.headers['x-wp-totalpages']
          this.setState({
            loading: false,
            refreshing: false
          })
        } else {
          console.error(res)
        }
      })
      .catch(err => {
        this.currentPageNo = pageNo
        this.setState({
          loading: false,
          refreshing: false,
          notice: new NoticeModel('error', err.message, err.warnings)
        })
      })
  }

  goToPreviousPage () {
    const previousPageNo = this.currentPageNo - 1
    if (this.logs[previousPageNo]) {
      this.currentPageNo = previousPageNo
      this.setState({
        refreshing: false
      })
    } else {
      this.setState({ refreshing: true })
      this.getLogs(previousPageNo)
    }
  }

  goToNextPage () {
    const nextPageNo = this.currentPageNo + 1
    if (this.logs[nextPageNo]) {
      this.currentPageNo = nextPageNo
      this.setState({
        refreshing: false
      })
    } else {
      this.setState({ refreshing: true })
      this.getLogs(nextPageNo)
    }
  }

  renderInvalidPageMessage () {
    if (!this.pageNumberIsValid()) {
      return <p>An invalid page number was specified.</p>
    }
  }

  renderLogsTable () {
    if (this.pageNumberIsValid()) {
      return (
        <LogsTable
          logs={this.logs}
          currentPageNo={this.currentPageNo}
        />
      )
    }
  }

  renderPagination () {
    if (this.pageNumberIsValid()) {
      return (
        <Pagination
          goToPreviousPage={this.goToPreviousPage}
          goToNextPage={this.goToNextPage}
          refreshing={this.state.refreshing}
          currentPageNo={this.currentPageNo}
          totalPages={this.totalPages}
        />
      )
    }
  }

  pageNumberIsValid () {
    return this.currentPageNo >= 1 && this.currentPageNo <= this.totalPages
  }

  render () {
    return (
      <div>
        <Notices notices={this.state.notices} />
        <PageLoader shouldSpin={this.state.loading}>
          <Postbox title='Logs' overflowScroll={true}>
            {this.renderInvalidPageMessage()}
            {this.renderLogsTable()}
            {this.renderPagination()}
          </Postbox>
        </PageLoader>
      </div>
    )
  }
}
