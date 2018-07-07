import React from 'react';

import { UPDATE_AUTOMATION } from '~/constant/requests';

import Form from './Form';

import NoticeModel from '~/models/NoticeModel';

export default class UpdateAutomation extends React.Component {

    constructor(props) {
        super(props);

        // State
        this.state = {
            notice: null
        }

        this.handleSubmit   = this.handleSubmit.bind(this);
        this.handleLoad = this.handleLoad.bind(this);
    }

    handleSubmit(automation) {

        let data = automation;
        let auto = this.props.automation;

        return UPDATE_AUTOMATION(auto.ID, data)
            .then(res => {

                this.props.addNotice(new NoticeModel('success', 'Automation updated successfully.'));
                this.props.refAutos([res.data]);

            })
            .catch(err => {

                throw err;

            });

    }

    handleLoad(){
        if(this.props.onLoad){
            this.props.onLoad();
        }
    }

    render() {

        return (

            <div>

                <Form
                    automation={this.props.automation}
                    handleSubmit={this.handleSubmit}
                    submitTitle="Update"
                    notice={this.state.notice}
                    handleLoad={this.handleLoad}
                    />

            </div>
        );

    }

}
    