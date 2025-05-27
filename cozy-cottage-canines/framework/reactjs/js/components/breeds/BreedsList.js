import React, {Component} from 'react';
import { connect } from 'react-redux';

class BreedsList extends Component {


    render() {
        return (
            <div className="breeds__list">
                <div className="row">
                    {this.breedsList()}
                </div>
            </div>
        );
    }

    breedsList() {
        const {breeds, selectedBreeds} = this.props;
        const breedClass = 'col-xs-12 col-sm-12 col-md-12 col-lg-4';
        return breeds
            .filter(breed => !!this.getBreedImage(breed) && (selectedBreeds.all || selectedBreeds[breed.id]))
            .map(breed => {
                return (
                    <div className={breedClass} key={breed.id}>
                        <div className="breeds__card">
                            {
                                this.getBreedImage(breed)
                                    ? <div className="breeds__image">
                                        <a href={this.getBreedDetailsPage(breed)}>
                                            <img src={this.getBreedImage(breed)} alt={breed.name}/>
                                        </a>
                                    </div>
                                    : null
                            }
                            <div className="breeds__title">
                                <a href={this.getBreedDetailsPage(breed)}><h6>{breed.name}</h6></a>
                            </div>
                            <div className="breeds__description">
                                <p>{breed.description}
                                    <a href={this.getBreedDetailsPage(breed)}><i className="fa fa-plus" /></a>
                                </p>

                            </div>
                        </div>
                    </div>
                );
            });
    }

    getBreedImage(breed) {
        return breed.pictures && breed.pictures.images && breed.pictures.images[0]
            ? breed.pictures.images[0].downloadUrl
            : null;
    }

    getBreedDetailsPage(breed) {
        const {breeds_details_url} = this.props;
        return breeds_details_url
            .replace(':breedId', breed.breedId);
    }

}

const mapStateToProps = state => {
    const { k9_breeds, selectedBreeds } = state.breedsReducer;
    const { petlandOptions } = state.petlandOptions;

    return {
        breeds: k9_breeds,
        breeds_details_url: petlandOptions.breeds_details_url,
        selectedBreeds
    };
};

export default connect(mapStateToProps)(BreedsList);