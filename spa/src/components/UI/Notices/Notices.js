import React from 'react';

import Notice from '~/components/UI/Notice/Notice';

export default class Notices extends React.Component {

    constructor(props) {
        super(props);

        this.notices = props.notices;

        this.handleClose = this.handleClose.bind(this);

    }

    componentWillReceiveProps(nextProps) {
       
        this.notices = nextProps.notices;

    }

    handleClose(notice) {
        
        this.notices = this.notices.filter(function(n) {
            return n.message !== notice.message;
        });

    }

    render() {

        return (
            
            <div>

                {
                    this.notices.map((notice, i) => {
                        return <Notice 
                            key={i} 
                            notice={notice} 
                            handleClose={this.handleClose} 
                            apartOfList={true}
                            />
                    })
                }

            </div>

        );

    }

}
