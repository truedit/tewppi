import React from 'react';

import Postbox from '~/components/UI/Postbox/Postbox';

export default class PostboxWidget extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
        };

    }

    render() {

        return (

            <div className="postbox-container">
                <div className="meta-box-sortables ui-sortable">
                    
                    <Postbox title={ this.props.title }>
                        { this.props.children }
                    </Postbox>

                </div>
            </div>
            
        );

    }

}
