import React from 'react';

import './Notice.css';

export default class Notice extends React.Component {

    constructor(props) {

        super(props);

        let message = '';
        let warnings = [];
        let type = '';

        if (props.notice) {
            type = props.notice.type;

            if (props.notice.message) {
                message = props.notice.message;
            }
            if (props.notice.data && props.notice.data.warnings) {
                if (props.notice.data.warnings.length > 0) {
                    warnings = props.notice.warnings;
                }

            }
        }

        if (typeof message === 'object') {
            // errorMessage is a known server parameter that is sent, we can safely use this
            if (message.errorMessage) {
                message = message.errorMessage;
            } else {
                console.error('Unknown error message was passed into Notices', message);
                message = 'An unknown error has occurred. Please check logs';
            }
        }

        this.state = {
            show: false,
            type: type,
            message: message,
            warnings: warnings
        }

        /**
         * Animate and hide if its apart of a list.
         */
        if (message.length) {
            setTimeout(() => {
                this.setState({
                    show: true
                });
                if (props.apartOfList) {
                    setTimeout(() => {

                        // Already not showing
                        if (!this.state.show) return;

                        this.handleClose();
                    }, 10000);
                }
            });
        }

        this.handleClose = this.handleClose.bind(this);
        
    }

    componentWillReceiveProps(nextProps) {
        console.log(nextProps)
        if (nextProps.notice && nextProps.notice.message !== this.state.message) {
            this.setState({
                message: nextProps.notice.message
            })
        }

    }

    handleClose = () => {

        this.setState({
            show: false
        });

        setTimeout(() => {
            this.props.handleClose(this.state);
        }, 350);
    }

    render() {

        return (

            <div className={'notice notice-' + (this.state.type) + (this.state.show ? ' notice-show' : ' notice-hide')}>

                <p>
                    { this.state.type === 'success' ?
                        <span className="dashicons dashicons-yes c-green"></span> :
                        <span className="dashicons dashicons-no c-red"></span>
                    }

                    { this.state.message }

                    <span className="dashicons dashicons-no dashicon-close" onClick={this.handleClose}></span>
                </p>
                {
                    this.state.warnings.map((warning, i) =>
                        <p key={i}>{warning.errorMessage}</p>
                    )
                }

            </div>

        );

    }

}
