import React, { Component } from 'react';
import { connect } from 'react-redux';

import PuppyFilter from './PuppyFilter';
import {changeLocation, changePetBreed, changePetGender, changePetType} from '../../actions/puppiesActions';

class PuppyFilters extends Component {

    render() {
        const {
            theme_url,
            locations,
            defaultLocation,
            genders,
            defaultPetGender,
            pet_types,
            defaultPetType,
            breeds,
            defaultBreed,
            localization
        } = this.props;

        console.log(defaultPetType);

        const breedValues = breeds.filter(breed => defaultPetType.all || defaultPetType[breed.petType]);

        return (
            <div className={'puppies__bar filters__bar'} id={'filter_bar'}>
                <div className={'filters__info d-none d-md-block'}>
                    <img src={`${theme_url}/styles/assets/images/shared/filter-icon.svg`}/>
                    <h6>Filter By:</h6>
                </div>

                <PuppyFilter name={localization.location}
                             pluralName={localization.all_locations}
                             id={'location'}
                             options={locations}
                             value={defaultLocation}
                             multi={true}
                             onChange={(value) => this.handleFilterChange(value, 'location')} />

                <PuppyFilter name={localization.pet_type}
                             pluralName={localization.all_pet_types}
                             id={'pet_type'}
                             options={pet_types}
                             value={defaultPetType}
                             multi={true}
                             onChange={(value) => this.handleFilterChange(value, 'pet_type')} />

                <PuppyFilter name={localization.breed}
                             pluralName={localization.all_breeds}
                             id={'breed'}
                             options={breedValues}
                             value={defaultBreed}
                             multi={true}
                             onChange={(value) => this.handleFilterChange(value, 'breed')} />

                <PuppyFilter name={localization.gender}
                             pluralName={localization.all_genders}
                             id={'gender'}
                             options={genders}
                             value={defaultPetGender}
                             multi={true}
                             onChange={(value) => this.handleFilterChange(value, 'gender')} />
            </div>
        );
    }

    handleFilterChange(value, id) {
        const {changeLocation, changePetBreed, changePetGender, changePetType} = this.props;

        switch (id) {
            case 'location':
                changeLocation(value);
                break;
            case 'pet_type':
                changePetType(value);
                break;
            case 'breed':
                changePetBreed(value);
                break;
            case 'gender':
                changePetGender(value);
                break;

        }
    }

    updateOptions() {

    }

}

const mapStateToProps = state => {
    const { breeds, location, petGender, petBreed, petType } = state.availablePuppies;
    const { petlandOptions } = state.petlandOptions;
    const { locations, pet_genders, pet_types } = petlandOptions.filters;

    return {
        breeds,
        defaultLocation: location,
        defaultPetGender: petGender,
        defaultBreed: petBreed,
        defaultPetType: petType,
        locations: locations,
        genders: pet_genders,
        pet_types: pet_types,
        theme_url: petlandOptions.theme_url,
        localization: petlandOptions.i18n
    };

};

export default connect(mapStateToProps, {changeLocation, changePetBreed, changePetGender, changePetType})(PuppyFilters);