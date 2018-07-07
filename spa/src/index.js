import React from 'react';
import ReactDOM from 'react-dom';
import App from '~/components/App/App';
//import registerServiceWorker from './registerServiceWorker';

const Root = () => {
    return (
        <App />
    );
}

ReactDOM.render((
    <Root />    
), document.getElementById('root'));
//registerServiceWorker();


