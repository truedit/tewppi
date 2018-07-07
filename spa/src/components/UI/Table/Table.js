import React from 'react';

import './Table.css';

export default class Table extends React.Component {

    render() {

        return (

            <div className="table-container">

                <table className={'table widefat striped comments ' + (this.props.name ? this.props.name : '')}>

                    { this.props.children }

                </table>

            </div>
            
        );

    }

}
