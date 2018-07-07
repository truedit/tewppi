import React from 'react';

export default class Spinner extends React.Component {

    constructor(props) {
        super(props);

        this.filterItems = this.filterItems.bind(this);

        this.state = {
            items: this.filterItems(props.items, props.filter)
        };

        this.PREFILLED = props.prefilled;

    }

    componentWillReceiveProps(nextProps){
        this.setState({
            items: this.filterItems(nextProps.items, this.props.filter)
        });
    }

    render() {

        return (

            <select
                name={this.props.name}
                onChange={this.props.handleChange}
                value={this.props.value}
                required={this.props.required}
                disabled={this.PREFILLED ? true : (this.props.disabled ? this.props.disabled : false)}
                size={this.props.size ? this.props.size : ''}
                multiple={this.props.multiple ? this.props.multiple : false}
                >

                {this.props.pleaseSelect ? <option value="">Please select</option> : ''}

                {
                    this.state.items.map((item, i) =>
                        <option key={i} value={item.value}>{item.name}</option>
                    )
                }
            </select>
            
        );

    }

    filterItems = (items, filter) => {

        if (filter) {
            items = items.filter((item) => {
                return filter.indexOf(item.value) === -1;
            });
        }
        return items;

    }


}
