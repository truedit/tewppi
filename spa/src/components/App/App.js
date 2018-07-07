import React, { Component } from 'react';

import './Atomic.css';
import './App.css';

import Dashboard from '~/pages/dashboard/components/Dashboard';
import Options from '~/pages/options/components/Options';
import Automations from '~/components/Pages/Automations/Automations';
import Logs from '~/pages/logs/components/Logs';
import Publish from '~/components/Pages/Publish/Publish';

import { DEBUG } from '~/constant/settings';
import { GET_URL_PARAMS } from '~/constant/helpers';

import logo from './logo.png';

export default class App extends Component {
    getPathFromParams () {
        const searchParams = GET_URL_PARAMS();

        // Used to get to the publish iFrame URL, e.g. 
        // http://localhost:3000/?truedit=true&type=automation&id=52
        if (
            searchParams['truedit'] &&
            searchParams['type'] &&
            searchParams['id']
        ) {
            return 'publish';
        } else if (DEBUG) {
            return window.location.pathname.substr(1);
        } else {
            if (searchParams['page']) {
                return searchParams['page'].split('-').slice(-1)[0];
            }
        }
    }

    renderComponent () {
        switch (this.getPathFromParams()) {
            case 'options':
                return <Options />;
            case 'automations':
                return <Automations />;
            case 'logs':
                return <Logs />;
            case 'publish':
                return <Publish />;
            default:
                return <Dashboard />;
        }
    }

    renderLogo () {
        if (this.getPathFromParams() !== 'publish') {
            return (
                <h1 className="wp-heading-inline">
                    <img src={logo} alt="TruEdit Logo" />
                </h1>
            )
        }
    }

    render () {
        return (
            <div className={'wrap wrap-' + this.getPathFromParams()}>
                {this.renderLogo()}
                <div className="metabox-holder">
                    {this.renderComponent()}
                </div>
            </div>
        );
    }
}
