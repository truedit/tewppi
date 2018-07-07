import React from 'react';

import './Postbox.css';

export default class Postbox extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
        };

    }

    render() {

        return (

            <div className="postbox">
                { 
                    this.props.title ? 
                        <h2 className="hndle ui-sortable-handle"><span>{ this.props.title }</span></h2> :
                        ''
                }
            
                <div className={'inside' + (this.props.overflowScroll ? ' overflow-scroll' : '')}>

                    { this.props.children }

                </div>

            </div>
            
        );

    }

}
