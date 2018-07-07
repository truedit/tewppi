import React from 'react';

import './PageLoader.css';

import Spinner from '~/components/UI/Spinner/Spinner';

export default class Postbox extends React.Component {

    constructor(props) {
        super(props);

        this.state = {}

    }

    render() {

        return (

            <div className="page-container">

                <Spinner shouldSpin={this.props.shouldSpin} />

                <div className={'page page-hide' + (this.props.shouldSpin ? '' : ' page-show')}>

                    { this.props.children }

                </div>

            </div>
            
        );

    }

}
