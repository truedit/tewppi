import React from 'react';

import { PROMPT, PUBLIC_STATUSES, PRIVATE_STATUSES } from '~/constant/options';

import Select from '~/components/UI/Form/Select/Select';
import FormGroup from '~/components/UI/Form/FormGroup/FormGroup';


export default class FormStatus extends React.Component {

    constructor(props) {
        super(props);

        this.state = {
            statuses: FormStatus.getStatusesFromVisibility(props.visibility, props.publishing),
            publish_status: props.status ? props.status : ''
        };

        this.handleChange = this.handleChange.bind(this);

    }

    static getStatusesFromVisibility = (visibility, publishing) => {

        let statuses;

        switch (visibility) {
            case 'public':
                statuses = PUBLIC_STATUSES;
                break;
            case 'private':
                statuses = PRIVATE_STATUSES;
                break;
            case '':
                if (publishing) {
                    statuses = PUBLIC_STATUSES;
                } else {
                    statuses = [PROMPT];
                }
                break;
            default:
                statuses = PUBLIC_STATUSES;
        }

        return statuses;

    }

    componentWillReceiveProps = (nextProps) => {
        let publish_status = nextProps.status;
        let statuses = FormStatus.getStatusesFromVisibility(nextProps.visibility, nextProps.publishing);

        if (this.props.visibility !== nextProps.visibility) {
            publish_status = statuses[0];

            this.handleChange({
                target:{
                    name: 'publish_status',
                    value: publish_status.value
                }
            });
        }

        this.setState({
            statuses: statuses,
            publish_status: publish_status
        });

    };

    handleChange = (e) => {
        let s = this.state;
        s[e.target.name] = e.target.value;
        this.setState(s);
        this.props.handleChange(e);
    };

    render() {
        
        return (
            <FormGroup label="Status">
                <Select
                    name="publish_status"
                    handleChange={this.handleChange}
                    items={this.state.statuses}
                    value={this.state.publish_status}
                    disabled={this.props.disabled || this.state.statuses.length === 1}
                    filter={this.props.filter}
                    pleaseSelect={this.props.pleaseSelect}
                    required={this.props.required}
                />
            </FormGroup>
        );

    }

}
