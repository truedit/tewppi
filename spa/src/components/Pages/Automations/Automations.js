import React from 'react';

import { GET_AUTOMATIONS } from '~/constant/requests';
import { GET_URL_PARAMS, FORMAT_DATE } from '~/constant/helpers';

import CreateAutomation from './CreateAutomation'; 
import UpdateAutomation from './UpdateAutomation'; 
import DeleteAutomation from './DeleteAutomation'; 

import Modal from '~/components/UI/Modal/Modal';
import Postbox from '~/components/UI/Postbox/Postbox';
import PageLoader from '~/components/UI/PageLoader/PageLoader';
import Table from '~/components/UI/Table/Table';

import Notices from '~/components/UI/Notices/Notices';
import NoticeModel from '~/models/NoticeModel';

import './Automations.css';

export default class Automations extends React.Component {

    constructor(props) {
        super(props);

        // State
        this.state = {
            LOADING: true,
            showList: false,
            notices: [],
            modal: {
                ID: -1,
                isOpen: false,
                name: '',
                component: '',
                isLoaded: false
            },
            clicks: 0,

        };

        // Bindings
        this.initBindings();

        // Init
        this.automations = [];
        this.getAutomations();
    }

    initBindings() {
        this.openModal      = this.openModal.bind(this);
        this.closeModal         = this.closeModal.bind(this);

        this.addNotice     = this.addNotice.bind(this);

        this.addAutos   = this.addAutos.bind(this);
        this.remAutos   = this.remAutos.bind(this);
        this.refAutos   = this.refAutos.bind(this);
        this.handleLoad = this.handleLoad.bind(this);
    }

    getAutomations() {

        GET_AUTOMATIONS()
            .then(res => {

                if(!res.data.has.verified) {
                    this.setState({
                        SHOW_ADD: false,
                        LOADING: false
                    });

                    this.addNotice(new NoticeModel('error', 'No valid configuration. Please select configuration from the left hand menu and validate server settings.', []));
                    return;
                }

                this.automations = res.data.automations;
                
                this.setState({
                    LOADING: false,
                    SHOW_ADD: true,
                });

                let params = GET_URL_PARAMS();

                if (params['create'] === 'true') {
                    this.openModal({
                        target: { dataset: { name: 'create'}}
                    });
                }

            })
            .catch(err => {
                this.setState({
                    SHOW_ADD: false,
                    LOADING: false
                });

                this.addNotice(new NoticeModel('error', err.message, err.warnings));

            });
    }
    
    /**
     * MODAL INTERACTIONS
     * ----------------------------------------
     */

    closeModal() {
        this.setState({
            modal: {
                isOpen: false,
                isLoaded: false
            }
        });
    }

    openModal(e) {

        let focus = e.target.dataset.name;
        let ID = parseInt(e.target.dataset.id, 10);
        let automation = this.automations.find(function(auto) {
            return auto.ID === ID;
        });

        let modals = {
            create: {
                name: 'create',
                title: 'Add Automation',
                component: <CreateAutomation
                    toggle={ this.closeModal }
                    addAutos={ this.addAutos }
                    addNotice={ this.addNotice }
                    onLoad={ this.handleLoad }
                    />
            },
            edit: {
                name: 'edit',
                title: 'Edit Automation',
                component: <UpdateAutomation
                    automation={automation}
                    toggle={ this.closeModal }
                    refAutos={ this.refAutos }
                    addNotice={ this.addNotice }
                    onLoad={ this.handleLoad }
                    />
            },
            delete: {
                name: 'delete',
                title: 'Delete Automation',
                component: <DeleteAutomation
                    automation={automation}
                    toggle={ this.closeModal }
                    remAutos={ this.remAutos }
                    addNotice={ this.addNotice }
                    onLoad={ this.handleLoad }

                    />
            }
        }

        let modal = {};
        modal.automation = automation;
        modal.isOpen = true;
        modal.name = modals[focus].name;
        modal.title = modals[focus].title;
        modal.component = modals[focus].component;

        this.setState({
            modal: modal
        });

    }

    /**
     * UI Changes
     * -------------------------------------
     */
    
    addAutos(auto) {

        this.automations.unshift(auto);
        this.closeModal();

    }

    remAutos(ids) {

        ids.forEach(id => {
            this.automations = this.automations.filter(function(auto) {
                return parseInt(auto.ID, 10) !== parseInt(id, 10);
            });
        })
        this.closeModal();

    }

    refAutos = (autos) => {

        autos.forEach(auto => {
            this.automations.forEach((automation, i) => {
                if (parseInt(auto.ID, 10) === parseInt(automation.ID, 10)) {
                    this.automations[i] = auto;
                }
            });
        });
        this.closeModal();

    }

    /**
     * Notices
     */
    addNotice = (notice) => {
        console.log(this.state.notices);
        console.log(notice);
        this.setState({
            notices: this.state.notices.concat([notice])
        });
    }

    handleLoad() {
        this.setState({modalLoaded: true});
    }

    /**
     * RENDER
     * ------------------------------------------
     */

    render() {

        return (

            <div>

                <Notices notices={this.state.notices} />

                <PageLoader shouldSpin={this.state.LOADING}>

                    {
                        this.state.SHOW_ADD ?
                            <div className="actions bulkactions">
                                <button data-name="create" onClick={this.openModal} className="button button-primary action">
                                    Add Automation
                                </button>
                            </div> :
                            ''
                    }

                    <Postbox title="Automations" overflowScroll={true}>

                        {
                            this.automations.length === 0 ?
                                <div>
                                    No automations found.
                                </div> :

                                <Table name="automations">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Automation ID</th>
                                            <th>Name</th>
                                            <th>Last Executed</th>
                                            <th>Process</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        {
                                            this.automations.map((auto, i) =>
                                                <tr key={i}>
                                                    <td data-colname="ID">
                                                        <p>{auto.ID}</p>
                                                    </td>
                                                    <td data-colname="Automation ID">
                                                        <p>{auto.post_meta.automation_id}</p>
                                                    </td>
                                                    <td data-colname="Name">
                                                        <p>{
                                                            auto.post_meta.json ? 
                                                                auto.post_meta.json.name : 
                                                                ''
                                                        }</p>
                                                    </td>
                                                    <td data-colname="Last Executed">
                                                        <p>{
                                                            auto.post_meta.json ? 
                                                                FORMAT_DATE(auto.post_meta.json.lastExecuted) : 
                                                                ''
                                                        }</p>
                                                    </td>
                                                    <td data-colname="Process">
                                                        <div className="button-group">
                                                            <button data-name="edit" data-id={auto.ID} onClick={this.openModal} className="button">
                                                                Edit
                                                            </button>
                                                            <button data-name="delete" data-id={auto.ID} onClick={this.openModal} className="button">
                                                                Delete
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            )
                                        }
                                    </tbody>
                                </Table>
                        }

                    </Postbox>
                </PageLoader>

                <Modal
                    title={this.state.modal.title}
                    isOpen={this.state.modal.isOpen}
                    toggle={this.closeModal}
                    formLoaded={this.state.modal.isLoaded}
                >
                    {this.state.modal.component}
                </Modal>
                
            </div>
        );

    }

}
