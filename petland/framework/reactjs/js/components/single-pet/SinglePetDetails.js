import React, {Component} from 'react';
import { connect } from 'react-redux';
import {fetchPetDetails} from '../../actions/singlePetActions';
import PetImage from './PetImage';
import PetTabs from './PetTabs';

class SinglePetDetails extends Component {

    componentWillMount() {
        const {pet_details, fetchPetDetails} = this.props;
        fetchPetDetails(pet_details.pet_id, pet_details.pet_location);
    }

    render() {
        const { pet } = this.props;
        return (
            <div className="row m-0">
                {pet ? <PetImage />:null}
                {pet ? <PetTabs />:null}
            </div>
        );
    }
}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        pet_details: petlandOptions.pet_details,
        pet: state.singlePuppy.pet
    };
};

export default connect(mapStateToProps, {fetchPetDetails})(SinglePetDetails);