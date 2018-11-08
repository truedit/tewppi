import React from 'react';

import { DEBUG } from '~/constant/settings';
import { GET_AUTOMATION, VERIFY_IFRAME, PUBLISH } from '~/constant/requests';
import { PUBLISH_OPTS, TITLES, FORMATS, TYPES, ACTIONS, AUTHORS, VISIBILITY } from '~/constant/options';
import { GET_URL_PARAMS } from '~/constant/helpers';

import Postbox from '~/components/UI/Postbox/Postbox';
import Spinner from '~/components/UI/Spinner/Spinner';

import Select from '~/components/UI/Form/Select/Select';
import FormGroup from '~/components/UI/Form/FormGroup/FormGroup';
import FormStatus from '~/components/Common/FormStatus';

import State from './State';

import NoticeModel from '~/models/NoticeModel';

import './Publish.css';

export default class Publish extends React.Component {

    constructor(props) {

        super(props);

        this.state = {
            LOADING: true,
            PROCESSING: false,
            FORM_IS_SUCCESSFUL: false,
            automation: null,
            form: {
            }
        }

        this.handleChange = this.handleChange.bind(this);
        this.handlePublish = this.handlePublish.bind(this);

        if (!DEBUG) {
            let url = window.location.href;
            let match = url.match(/x-Source-Verification-Token=(.+)/);
            let token = match ? match[1] : 'test';

            VERIFY_IFRAME(token)
                .then((res) => {

                    return GET_AUTOMATION(GET_URL_PARAMS()['automation_post_id']);

                })
                .then((res) => {

                    this.automation = res.data;
                    this.prepareForm();
                    this.fetchPostMsg();

                })
                .catch((err) => {
                    
                    this.setState({
                        LOADING: false,
                        notice: new NoticeModel('error', err.message, err.warnings),
                    });
                    
                });

        } else {

            GET_AUTOMATION(GET_URL_PARAMS()['automation_post_id'])
                .then((res) => {

                    this.automation = res.data;
                    this.prepareForm();
                
                })
                .catch((err) => {

                    this.setState({
                        LOADING: false,
                        notice: new NoticeModel('error', err.message, err.warnings)
                    });

                });

        }
        
    }

    prepareForm = () => {

        let params = GET_URL_PARAMS();
        let post_meta = this.automation.post_meta;

        let form = {};
            
        // Loop through possible options
        for (let field of PUBLISH_OPTS) {
            form[field] = post_meta[field];
        }

        // // Replace all prompt fields
        for (let field in form) {
            if (form[field] === 'prompt_on_run') form[field] = '';
        }

        form.id = params['automation_post_id'];

        this.setState({
            LOADING: false,
            form: Object.assign(form, this.state.form)
        });

    }

    fetchPostMsg = () => {
        if (document.referrer) {
            window.parent.postMessage('fetch_job_meta_data', document.referrer);
            window.addEventListener('message', (e) => {
                    
                if (e.data && typeof e.data !== 'string' && e.data.eventType === 'init') {
                    let data = JSON.parse(JSON.stringify(e.data)); console.log(data);

                    this.setState({
                        LOADING: false,
                        form: Object.assign(data, this.state.form)
                    });

                    window.removeEventListener('message', this, false);
                }
            });
        }
    }

    handleChange = (e) => {
        let form = this.state.form;
        form[e.target.name] = e.target.value;
        this.setState({ form: form });
    }

    handlePublish = (e) => {
        e.preventDefault();

        if (this.state.PROCESSING) return;

        let form = this.state.form;

        this.setState({
            PROCESSING: true
        });

        PUBLISH(form)
            .then((res) => {
                console.log(res);
                // display a success display with close and a message.
                this.setState({
                    PROCESSING: false,
                    FORM_IS_SUCCESSFUL: true
                });

            })
            .catch((err) => {
                
                this.setState({
                    PROCESSING: false,
                    notice: new NoticeModel('error', err.message, err.warnings)   
                });

            });

    }

    /**
     * TruEdit handle close,
     * this action does NOT create a job log in TruEdit.
     */
    handleCancel = () => {

        let data = this.state.form;
        data.message = 'Cancel.';
        data.action = 'cancel';

        window.parent.postMessage(data, document.referrer);

    }

    /**
     * TruEdit handle successfully close,
     * This action creates a job log on TruEdit.
     */
    handleClose = () => {

        let data = this.state.form;
        data.message = 'Successfully published.';
        data.action = 'send';
        data.success = true;

        window.parent.postMessage(data, document.referrer);

    }

    /**
     * RENDER
     * --------------------------------------------------------
     */

    render = () => {

        return (

            <Postbox>

                <Spinner shouldSpin={this.state.LOADING} />

                <div className={'page page-hide' + (this.state.LOADING ? '' : ' page-show')}> 

                    {
                        this.state.notice ?
                            <div className="publish-state">
                                <div>
                                    <State state={false} />
                                    <p>
                                        { this.state.notice.message }
                                    </p>
                                    <button
                                        data-name="cancel"
                                        className="button"
                                        onClick={ this.handleCancel }
                                        >
                                        Close
                                    </button>
                                </div>
                            </div> : ''

                    }

                    {

                        !this.state.FORM_IS_SUCCESSFUL && !this.state.notice && !this.state.LOADING ?

                            (       
                                <div>
                                    <form onSubmit={this.handlePublish} autoComplete="off">   
                                        <FormGroup label="Action Type">
                                            <Select
                                                name="publish_action"
                                                handleChange={this.handleChange}
                                                required={true}
                                                items={ACTIONS}
                                                value={ this.state.form.publish_action }
                                                />
                                        </FormGroup>     

                                        <FormGroup label="Type">
                                            <Select
                                                name="publish_type"
                                                handleChange={this.handleChange}
                                                items={TYPES}
                                                value={this.state.form.publish_type}
                                                filter={['', 'prompt_on_run']}
                                                pleaseSelect={true}
                                                required={true}
                                                prefilled={this.state.form.publish_type !== ''}
                                                />
                                        </FormGroup>            

                                        <FormGroup className={this.state.form.publish_type === 'post' || this.state.form.publish_type === '' ? '' : 'form-group-hide'} label="Format">
                                            <Select
                                                name="publish_format"
                                                handleChange={this.handleChange}
                                                items={FORMATS}
                                                value={this.state.form.publish_format}
                                                filter={['', 'prompt_on_run']}
                                                pleaseSelect={true}
                                                required={this.state.form.publish_type === 'post'}
                                                prefilled={this.state.form.publish_format !== ''}
                                                />
                                        </FormGroup>                                     
                    
                                        <FormGroup label="Title">
                                            <Select
                                                name="publish_title"
                                                handleChange={this.handleChange}
                                                items={TITLES}
                                                value={this.state.form.publish_title}
                                                required={true}
                                                disabled={true}
                                                />
                                        </FormGroup>

                                        <FormGroup label="Visibility">
                                            <Select
                                                name="publish_visibility"
                                                handleChange={this.handleChange}
                                                items={VISIBILITY}
                                                value={this.state.form.publish_visibility}
                                                filter={['', 'prompt_on_run']}
                                                pleaseSelect={true}
                                                required={true}
                                                prefilled={this.state.form.publish_visibility !== ''}
                                            />
                                        </FormGroup>

                                        <FormStatus
                                            publishing={true}
                                            visibility={this.state.form.publish_visibility}
                                            status={this.state.form.publish_status}
                                            handleChange={this.handleChange}
                                            filter={['', 'prompt_on_run']}
                                            pleaseSelect={true}
                                            required={true}
                                            disabled={this.state.form.publish_visibility === ''}
                                            prefilled={this.state.form.publish_status !== ''}
                                        />
                    
                                        <FormGroup label="Authors">
                                            <Select
                                                name="publish_author"
                                                handleChange={this.handleChange}
                                                items={AUTHORS}
                                                value={this.state.form.publish_author}
                                                filter={['', 'prompt_on_run']}
                                                pleaseSelect={true}
                                                required={true}
                                                prefilled={this.state.form.publish_author !== ''}
                                                />
                                        </FormGroup>


                                        <div className="button-group">
                                            <button
                                                data-name="cancel"
                                                className="button"
                                                onClick={ this.handleCancel }
                                                disabled={ this.state.PROCESSING ? true : false }    
                                                >
                                                Cancel
                                            </button>
                                            <button
                                                data-name="publish"
                                                className="button"
                                                disabled={ this.state.PROCESSING ? true : false }                                
                                                >
                                                {
                                                    this.state.PROCESSING ? 
                                                        <i className="spinner is-active"></i> :
                                                        'Publish'
                                                }
                                            </button>
                                        </div>

                                    </form>

                                </div>

                            ) : ''

                    }

                    {
                        this.state.FORM_IS_SUCCESSFUL ?
                            <div className="publish-state">
                                <div>
                                    <State state={true} />
                                    <p>
                                        Successfully published.
                                    </p>
                                    <button
                                        data-name="cancel"
                                        className="button"
                                        onClick={ this.handleClose }
                                        >
                                        Close
                                    </button>
                                </div>
                            </div> : ''
                    }

                </div>

            </Postbox>

        );

    }

}