import React from 'react';

import { GET_ACTIONS, GET_PROFILES } from '~/constant/requests';
import { PUBLISH_OPTS, TYPES, TITLES, FORMATS, VISIBILITY, ACTIONS, AUTHORS } from '~/constant/options';

import Notice from '~/components/UI/Notice/Notice';
import Spinner from '~/components/UI/Spinner/Spinner';
import FormStatus from '~/components/Common/FormStatus';

import Select from '~/components/UI/Form/Select/Select';
import FormGroup from '~/components/UI/Form/FormGroup/FormGroup';

import NoticeModel from '~/models/NoticeModel';

import FocusTrap from 'focus-trap-react';

export default class Form extends React.Component {

    constructor(props) {
        super(props);

        this.LOADING_COUNT = 0;

        this.state = {
            LOADING: true,
            FORM_PROCESSING: false,
            name: '',
            url: '',
            action: '',
            profiles: [],
            publish_action: 'create_update',
            publish_title: 'h1',
            publish_format: 'prompt_on_run',
            publish_status: 'prompt_on_run',
            publish_visibility: 'prompt_on_run',
            publish_author: 'current_user',
            publish_type: 'prompt_on_run',
            notice: null
        };

        this.actions = [];
        this.getActions();
        this.profiles = [];
        this.getProfiles();

        this.handleChange = this.handleChange.bind(this);
        this.handleChangeMulti = this.handleChangeMulti.bind(this);
        this.handleSubmit = this.handleSubmit.bind(this);
        this.handleLoad = this.handleLoad.bind(this);

    }

    componentWillReceiveProps(nextProps) {

        if (this.state.notice !== nextProps.notice)
            this.setState({
                notice: nextProps.notice
            });
        
    }

    getActions() {

        GET_ACTIONS()
            .then(res => {

                this.actions = res.data;
                this.show();

            })
            .catch(err => {

                this.setState({
                    notice: new NoticeModel('error', err.message, err.warnings)
                });

                this.show();

            });

    }

    getProfiles() {

        GET_PROFILES().then(res => {
                
            if (res.status === 200) {
                this.profiles = res.data;
                this.show();
            } else {
                console.error(res);
            }

        })
        .catch(err => {

            this.setState({
                notice: new NoticeModel('error', err.message, err.warnings)
            });
            
            this.show();

        });

    }

    handleChange = (e) => {
        let s = this.state;
        s[e.target.name] = e.target.value;
        this.setState(s);
    }

    handleChangeMulti = (e) => {
        let selected = [];
        let options = e.target.options;

        for (var i = 0; i < options.length; i += 1) {
            if (options[i].selected) {
                for (var j = 0; j < this.profiles.length; j += 1) {

                    if (options[i].value === this.profiles[j].name) {
                        selected.push(this.profiles[j]);
                    }
                }
            }
        }

        let s = this.state;
        s[e.target.name] = selected.map((opt) => {
            return opt.name;  
        });
        this.setState(s);
    }

    handleSubmit = (e) => {

        e.preventDefault();

        if (this.state.FORM_PROCESSING) return;

        let form = JSON.parse(JSON.stringify(this.state));

        // TODO: Replace this with a form error instead of a generic notice. + A validation method instead of this single check
        // Check to see if the name is filled in with real characters
        form.name = form.name.trim();
        if (form.name.length < 1) {
            this.setState({
                notice: new NoticeModel('error', 'An automation name is required')
            });
            return;
        }

        // Apply the write data structure for action.
        form.action = this.actions.find(action => {
            return action.name === form.action;
        });
        
        // Apply the write data structure for profiles.
        form.profiles = form.profiles.map(str => {
            return this.profiles.find(profile => {
                return profile.name === str;
            });
        });

        this.setState({
            FORM_PROCESSING: true
        });

        this.props.handleSubmit(form)
            .catch((err) => {

                this.setState({
                    FORM_PROCESSING: false,
                    notice: new NoticeModel('error', err.message, err.warnings)
                });

            });

    }

    handleLoad(){
        if(this.props.onLoad){
            this.props.onLoad();
        }
    }

    show() {

        if (this.LOADING_COUNT > 0) {
            this.prefill();
        } else {
            this.LOADING_COUNT += 1;
        }

    }

    prefill() {

        let name = '';
        let url = '';
        let action = ["Remote Form"];
        let profiles = [];

        if (this.props.automation) {

            let json = this.props.automation.post_meta.json;
            
            name = json.name;
            url = json.config.formUrl;
            action = json.action.name;
            profiles = json.profiles.map(function(profile) {
                return profile.name;
            });

        }

        let state = {
            name: name,
            url: url,
            action: action,
            profiles: profiles,
            LOADING: false
        }

        if (this.props.automation) {
            PUBLISH_OPTS.forEach((opt) => {
                state[opt] = this.props.automation.post_meta[opt]
            });
        }

        this.setState(state);

        this.handleLoad();

    }

    handleClose = () => {
        this.setState({
            notice: null
        });
    }

    render() {

        return (

            <div>
                <Spinner shouldSpin={this.state.LOADING} />

                {
                    this.state.notice ? 
                        <Notice notice={this.state.notice} handleClose={this.handleClose} /> :
                        ''
                }

                <div className={'page page-hide' + (this.state.LOADING ? '' : ' page-show')}>

                    {this.form(!this.state.LOADING)}

                </div>

            </div>

        );

    }

    form = (loaded) => {
        if (loaded) return <form onSubmit={this.handleSubmit} autoComplete="off">

                <div className="flex">
                    <div className="flex-item">

                        <h2 className="form-groups-title">
                            Automation Details
                        </h2>

                        <div className="form-group">
                            <label className="form-label">
                                Name*
                            </label>
                            <div className="form-item">
                                <input
                                    name="name"
                                    type="text"
                                    minLength="2"
                                    maxLength="255"
                                    value={this.state.name}
                                    onChange={this.handleChange}
                                    // pattern=".*[^ ].*"
                                    required
                                />
                            </div>
                        </div>

                        <div className="form-group">
                            <label className="form-label">
                                Action
                            </label>
                            <div className="form-item">
                                <select
                                    name="action"
                                    onChange={this.handleChange}
                                    value={this.state.action}
                                    disabled
                                    required
                                >
                                    <option value="">Please select</option>
                                    {
                                        this.actions.map((action, i) =>
                                            <option key={i} value={action.name}>{action.name}</option>)
                                    }
                                </select>
                            </div>
                        </div>

                        <FormGroup label="Profile*">
                            <Select
                                name="profiles"
                                pleaseSelect={true}
                                handleChange={this.handleChangeMulti}
                                required={true}
                                items={this.profiles}
                                value={this.state.profiles}
                                size={this.profiles.length > 10 ? 10 : this.profiles.length + 1}
                                multiple={true}
                                />
                        </FormGroup>

                    </div>

                    <div className="flex-item">

                        <h2 className="form-groups-title">
                            Publish Settings
                        </h2>

                        <FormGroup label="Action Type">
                            <Select
                                name="publish_action"
                                handleChange={this.handleChange}
                                required={true}
                                items={ACTIONS}
                                value={this.state.publish_action}
                            />
                        </FormGroup>

                        <FormGroup label="Type">
                            <Select
                                name="publish_type"
                                handleChange={this.handleChange}
                                value={this.state.publish_type}
                                items={TYPES}
                                pleaseSelect={false}
                                required
                                >
                            </Select>
                        </FormGroup>

                        <FormGroup className={this.state.publish_type === 'post' ? '' : 'form-group-hide'} label="Format">
                            <Select
                                name="publish_format"
                                handleChange={this.handleChange}
                                items={FORMATS}
                                value={this.state.publish_format}
                                allowBlanks={true}
                                />
                        </FormGroup>


                        <FormGroup label="Title">
                            <Select
                                name="publish_title"
                                handleChange={this.handleChange}
                                required={true}
                                items={TITLES}
                                value={this.state.publish_title}
                            />
                        </FormGroup>

                        <FormGroup label="Visibility">
                            <Select
                                name="publish_visibility"
                                handleChange={this.handleChange}
                                items={VISIBILITY}
                                value={this.state.publish_visibility}
                                allowBlanks={true}
                            />
                        </FormGroup>

                        <FormStatus
                            visibility={this.state.publish_visibility}
                            status={this.state.publish_status}
                            handleChange={this.handleChange}
                            allowBlanks={true}
                            disabled={this.state.publish_visibility === 'prompt_on_run'}
                        />

                        <FormGroup label="Authors">
                            <Select
                                name="publish_author"
                                handleChange={this.handleChange}
                                required={true}
                                items={AUTHORS}
                                value={this.state.publish_author}
                            />
                        </FormGroup>
                    </div>
                </div>

                <div className="form-group">
                    <button
                        className="button"
                        disabled={this.state.FORM_PROCESSING}
                        type="submit"
                    >{
                        (this.state.FORM_PROCESSING ? <i className="spinner is-active"></i> : (
                            this.props.submitTitle
                        ))
                    }</button>
                </div>

            </form>
    }

}
