import React, {Component} from 'react';
import { connect } from 'react-redux';

class PetImage extends Component {

    render() {
        const {pet} = this.props;

        return (
            <div className="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-0">
                <div className="detail__image">
                    {this.petImage()}
                    {
                        pet.Status === 'Available'
                        ? <span className="detail__stock">Available now</span>
                        : null
                    }
                </div>
            </div>
        )
    }

    petImage() {
        const { theme_url, pet } = this.props;
        return pet.Photo
            ? <img src={`${pet.Photo.BaseUrl}${pet.Photo.Size800}`} alt="" />
            : <img src={`${theme_url}/assets/images/no-available.png`} alt="" />;
    }

}

const mapStateToProps = state => {
    const {pet} = state.singlePuppy;
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        pet
    };
};

export default connect(mapStateToProps)(PetImage);