import React from 'react';
import ReactDOM from 'react-dom';
import FocusTrap from 'focus-trap-react';

import './Modal.css';

const modalRoot = document.getElementById('modal-root');

export default class Modal extends React.Component {

    constructor(props) {
        super(props);
        this.el = document.createElement('div');
    }

    componentDidMount() {
        // The portal element is inserted in the DOM tree after
        // the Modal's children are mounted, meaning that children
        // will be mounted on a detached DOM node. If a child
        // component requires to be attached to the DOM tree
        // immediately when mounted, for example to measure a
        // DOM node, or uses 'autoFocus' in a descendant, add
        // state to Modal and only render the children when Modal
        // is inserted in the DOM tree.
        modalRoot.appendChild(this.el);
    }

    componentWillUnmount() {
        modalRoot.removeChild(this.el);
    }


    render() {

        return ReactDOM.createPortal((
            <React.Fragment>
                {this.props.isOpen === true ? this.modalContent() : ''}
            </React.Fragment>
            ), this.el
        );

    }

    modalContent (){
        return <React.Fragment>
            <FocusTrap active={this.props.formLoaded}>
                <div className={'media-modal wp-core-ui media-modal-show'}>

                    <button type="button" className="media-modal-close" onClick={this.props.toggle}>
                        <span className="media-modal-icon">
                            <span className="screen-reader-text">
                                Close modal panel
                            </span>
                        </span>
                    </button>
                    {/* <h2 className="hndle"><span>{this.props.title ? this.props.title : ''}</span></h2> */}

                    <div className="media-modal-content">

                            <div className="media-frame mode-select wp-core-ui">
                                {
                                    this.props.menu ?
                                        <div className="media-frame-menu">
                                        </div> :
                                        ''
                                }

                                <div className={'media-frame-title' + (this.props.menu ? '' : ' no-menu')}>
                                    <h1>{this.props.title}</h1>
                                </div>
                                <div className={'media-frame-content' + (this.props.menu ? '' : ' no-menu')}>
                                    {this.props.children}
                                </div>
                            </div>

                    </div>

                </div>
                <div className={'media-modal-backdrop' + (this.props.isOpen ? '' : ' media-modal-backdrop-hide')} />
            </FocusTrap>
        </React.Fragment>
    }


}
