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
            <div className="modal-background">
                <FocusTrap active={this.props.formLoaded}>
                    <div className='modal'>
                        <div className="modal-header">
                            <button tabIndex="-1" type="button" className="modal-close-btn" onClick={this.props.toggle}>
                                <span>×</span>
                            </button>
                            <h1 id="modal-header-text">{this.props.title}</h1>
                        </div>
                        <div className="modal-content">
                            {this.props.children}
                        </div>
                    </div>
                </FocusTrap>
            </div>
        </React.Fragment>
    }
}
