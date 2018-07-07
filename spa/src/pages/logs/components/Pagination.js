
import React from 'react'

export default class Pagination extends React.Component {
  renderPreviousButton () {
    return (
      <div className='nav-previous'>
        <button
          onClick={this.props.goToPreviousPage}
          className='button'
          disabled={this.props.currentPageNo <= 1}>
          Prev
        </button>
      </div>
    )
  }

  renderCurrentPageButton () {
    return (
      <div className='nav-page'>
        <button className='button' disabled='true'>
          {
            this.props.refreshing
              ? <i className='spinner is-active' />
              : this.renderCurrentPage()
          }
        </button>
      </div>
    )
  }

  renderCurrentPage () {
    return <span>{this.props.currentPageNo}/{this.props.totalPages}</span>
  }

  renderNextButton () {
    return (
      <div className='nav-next'>
        <button
          onClick={this.props.goToNextPage}
          className='button'
          disabled={this.props.currentPageNo >= this.props.totalPages}>
          Next
        </button>
      </div>
    )
  }

  render () {
    return (
      <nav className='pagination'>
        {this.renderPreviousButton()}
        {this.renderCurrentPageButton()}
        {this.renderNextButton()}
      </nav>
    )
  }
}
