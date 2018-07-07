import React from 'react';

import { CREATE_AUTOMATION } from '~/constant/requests';

import Form from './Form';

import NoticeModel from '~/models/NoticeModel';

export default class CreateAutomation extends React.Component {

    constructor(props) {
        super(props);

        // State
        this.state = {}

        this.handleSubmit   = this.handleSubmit.bind(this);
        this.handleLoad = this.handleLoad.bind(this);
    }

    handleSubmit(automation) {

        return CREATE_AUTOMATION(automation)
            .then(res => {
                
                this.props.addNotice(new NoticeModel('success', 'New automation added successfully.'));
                this.props.addAutos(res.data);

            })
            .catch(err => {

                this.setState({
                    notice: new NoticeModel('error', err.message, err.warnings)
                });

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

            <Form
                handleSubmit={this.handleSubmit}
                submitTitle="Create"
                notice={this.state.notice}
                onLoad={this.handleLoad}
                >

            </Form>

        );

    }

}
