import React, {Component} from 'react';
import { connect } from 'react-redux';

import {fetchBreeds} from '../../actions/breedsActions';
import BreedsList from './BreedsList';
import BreedFilters from './BreedFilters';

class Breeds extends Component {

    componentWillMount() {
        this.props.fetchBreeds();
    }

    render() {
        return (
            <section className="breeds">
                <BreedFilters />
                <BreedsList />
            </section>
        );
    }

}

const mapStateToProps = state => ({});

export default connect(mapStateToProps, {fetchBreeds})(Breeds);