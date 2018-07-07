import React from 'react';

import './Spinner.css';

export default class Spinner extends React.Component {

    constructor(props) {
        super(props);

        this.state = {};

    }

    render() {

        return (

            <div className={'spinner-page' + (this.props.shouldSpin ? '' : ' spinner-page-hide')}>
                <i className="spinner is-active"></i>
            </div>
            
        );

    }

}
