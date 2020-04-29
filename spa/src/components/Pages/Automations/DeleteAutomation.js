import React from 'react';

import { DELETE_AUTOMATION } from '~/constant/requests';

import Spinner from '~/components/UI/Spinner/Spinner';
import Notices from '~/components/UI/Notice/Notice';
import NoticeModel from '~/models/NoticeModel';

export default class DeleteAutomation extends React.Component {

    constructor(props) {
        super(props);

        // State
        this.state = {};

        this.handleButton = this.handleButton.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.focusForm = this.focusForm.bind(this);
        this.handleLoad = this.handleLoad.bind(this);
    }

    componentDidMount() {
        setTimeout(function() {
            this.textInput.focus()
        }.bind(this), 100);
        this.handleLoad();
    }

    focusForm() {
        this.textInput.focus();
    }

    handleLoad(){
        if(this.props.onLoad){
            this.props.onLoad();
        }
    }

    delete() {

        let postId = this.props.automation.ID;

        DELETE_AUTOMATION(postId)
            .then(res => {
            
                if (res.status === 200) {
                    this.props.addNotice(new NoticeModel('success', 'Automation deleted successfully.'));
                    this.props.remAutos([postId]);
                } else {
                    console.error(res);
                }

            }).catch(err => {

                this.setState({
                    FORM_PROCESSING: false,
                    notice: new NoticeModel('error', err.message, err.warnings)
                });

            });

    }

    handleSubmit(e) {
        e.preventDefault();

        this.setState({
            FORM_PROCESSING: true
        });

        this.delete();

    }

    handleButton(e) {
        e.preventDefault();
        
        this.setState({
            FORM_PROCESSING: true
        });

        let name = e.target.dataset.name;
        if (name === 'confirm') this.delete();
        if (name === 'cancel') this.props.toggle();

    }

    render() {

        return (
            <div>

                <Spinner shouldSpin={this.state.LOADING}></Spinner>

                <div className={'page page-hide' + (this.state.LOADING ? '' : ' page-show')}>

                    <Notices notice={this.state.notice} />

                    <form>
                        <p>Are you sure you want to delete automation <b>{this.props.automation.post_meta.json.name}</b>? This action can not be reversed.</p>
                        <div className="button-group button-group-margin modal-delete-buttons">
                            <button
                                data-name="confirm"
                                ref={(input) => { this.textInput = input; }} 
                                type="submit"
                                className="button"
                                disabled={this.state.FORM_PROCESSING}
                                onClick={this.handleButton}>
                                {
                                    this.state.FORM_PROCESSING ? 
                                        <i className="spinner is-active"></i> : 
                                        'Delete'
                                }
                            </button>

                            <button
                                data-name="cancel" 
                                type="button" 
                                className="button"
                                onClick={this.handleButton}>
                                Cancel
                            </button>

                        </div>

                    </form>

                </div>

            </div>
        );

    }

}
