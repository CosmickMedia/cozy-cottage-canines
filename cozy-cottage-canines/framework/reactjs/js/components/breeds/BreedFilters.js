import React, {Component} from 'react';
import { connect } from 'react-redux';

import BreedFilter from './BreedFilter';
import {changeBreed} from '../../actions/breedsActions';

class BreedFilters extends Component {

    render() {
        const {theme_url, localization, selectedBreeds} = this.props;
        return (
            <div className={'breeds__bar filters__bar'}>

                <div className="filters__info d-none d-md-block">
                    <img src={`${theme_url}/styles/assets/images/shared/filter-icon.svg`} alt="" />
                        <h6>Filter by:</h6>
                </div>

                <BreedFilter name={localization.breed}
                             pluralName={localization.all_breeds}
                             id={'breeds'}
                             options={this.getOptions()}
                             value={selectedBreeds}
                             multi={true}
                             onChange={(value) => this.handleFilterChange(value, 'breeds')}
                />

            </div>
        );
    }

    getOptions() {
        const {breeds} = this.props;

        return breeds
            .filter(breed => this.getBreedImage(breed))
            .map(breed => ({name: breed.name, value: breed.id}));
    }

    getBreedImage(breed) {
        return breed.pictures && breed.pictures.images
            ? breed.pictures.images[0].downloadUrl
            : null;
    }

    handleFilterChange(value, id) {
        const {changeBreed} = this.props;
        switch (id) {
            case 'breeds':
                changeBreed(value);
                break;

        }
    }

}

const mapStateToProps = state => {
    const { k9_breeds, selectedBreeds } = state.breedsReducer;
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        localization: petlandOptions.i18n,
        breeds: k9_breeds,
        selectedBreeds,
    }
};

export default connect(mapStateToProps, {changeBreed})(BreedFilters);