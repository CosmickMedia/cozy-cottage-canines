import React, {Component} from 'react';
import { connect } from 'react-redux';
import {fetchBreedDetails} from '../../actions/singleBreedActions';
import BreedDetailHead from './BreedDetailHead';
import BreedDetailsMobile from './BreedDetailsMobile';
import BreedDetailsDesktop from './BreedDetailsDesktop';
import BreedInterestForm from './BreedInterestForm';

class SingleBreed extends Component {

    componentWillMount() {
        const {breed_details, fetchBreedDetails} = this.props;
        fetchBreedDetails(breed_details.breed_id);
    }

    render() {
        const {breed} = this.props;
        return (
                !!breed ? <div className="container container--reduce container-fluid-sm detail">
                    <BreedDetailHead />
                    <BreedDetailsMobile />
                    <BreedDetailsDesktop />
                    <BreedInterestForm />
                </div>
                : null
        );
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        breed_details: petlandOptions.breed_details,
        breed: state.singleBreed.k9_breed
    }
};

export default connect(mapStateToProps, {fetchBreedDetails})(SingleBreed);