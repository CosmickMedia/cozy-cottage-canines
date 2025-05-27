import React, { Component } from 'react';
import { connect } from 'react-redux';

class PuppiesList extends Component {

    render() {
        return (
            <div className={'puppies__list'}>
                <div className={'row'}>
                    {this.puppiesList()}
                </div>
            </div>
        );
    }

    puppiesList() {
        const { puppies, location, petGender, petBreed, petType} = this.props;
        const puppyClass = 'col-xs-12 col-sm-12 col-md-12 col-lg-4';

        return puppies
            .filter(puppy => location.all || location[puppy.Location])
            .filter(puppy => petGender.all || petGender[puppy.Gender])
            .filter(puppy => petBreed.all || petBreed[puppy.BreedId])
            .filter(puppy => petType.all || petType[puppy.PetType])
            .map(puppy => {
                return (
                    <div key={puppy.PetId} className={puppyClass}>
                        <div className={'puppies__card'}>
                            <a href={this.getPuppyDetailsPage(puppy)}
                               className={'puppies__action'}></a>
                            <div className={'puppies__image'}>
                                {this.puppyImage(puppy)}
                            </div>
                            <div className={'puppies__content'}>
                                <div className={'puppies__info'}>
                                    <ul>
                                        <li>{puppy.PetType}</li>
                                        <li>• {puppy.Gender}</li>
                                        <li>• Ref id: {puppy.PetId}</li>
                                        <li>• {puppy.BirthDate}</li>
                                    </ul>
                                </div>
                                <div className={'puppies__title'}>
                                    <h6>{puppy.BreedName}</h6>
                                </div>
                                <div className={'puppies__city'}>
                                    <p>{puppy.OrgName.replace('Petland ', '')}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                )
            });
    }

    getPuppyDetailsPage(puppy) {
        const {pet_details_url} = this.props;
        return pet_details_url
            .replace(':location', puppy.Location)
            .replace(':petId', puppy.PetId);
    }

    puppyImage(puppy) {
        const { theme_url } = this.props;
        return puppy.Photo
            ? <img src={`${puppy.Photo.BaseUrl}${puppy.Photo.Size300}`} alt="" />
            : <img src={`${theme_url}/assets/images/no-available.png`} alt="" />;
    }

}

const mapStateToProps = state => {
    const { puppies, location, petGender, petBreed, petType } = state.availablePuppies;
    const { petlandOptions } = state.petlandOptions;
    return {
        puppies: puppies,
        theme_url: petlandOptions.theme_url,
        pet_details_url: petlandOptions.pet_details_url,
        location,
        petGender,
        petBreed,
        petType
    };
};

export default connect(mapStateToProps)(PuppiesList);