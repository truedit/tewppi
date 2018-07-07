import React from 'react';

import './FormGroup.css';

export default class FormGroup extends React.Component {
    
    render() {

        return (

            <div className={'form-group ' + (this.props.className ? this.props.className : '') }>
                <label className="form-label">
                    { this.props.label }

                    {
                        this.props.icon ?
                            <span className={'dashicons dashicons-' + this.props.icon}></span> :
                            ''
                    }
                </label>
                <div className="form-item">
                    { this.props.children }
                </div>
            </div>
            
        );

    }

}


