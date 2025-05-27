import React, {Component} from 'react';
import { connect } from 'react-redux';

import PuppyFilters from "./PuppyFilters";
import PuppiesList from "./PuppiesList";
import {fetchAvailablePuppies} from '../../actions/puppiesActions';

class AvailablePuppies extends Component {

    componentWillMount() {
        this.props.fetchAvailablePuppies();
    }

    render() {
        return (
            <section className={'puppies'}>
                <PuppyFilters />
                <PuppiesList />
            </section>
        );

    }

}

const mapStateToProps = state => ({});

export default connect(mapStateToProps, {fetchAvailablePuppies})(AvailablePuppies);