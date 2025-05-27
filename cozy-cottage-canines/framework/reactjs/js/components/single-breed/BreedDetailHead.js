import React, {Component} from 'react';
import {connect} from 'react-redux';
import BreedDescription from './BreedDescription';

class BreedDetailHead extends Component {

    render() {
        const {breed, theme_url} = this.props;

        return (
            <section className="detail__head">
                <div className="row">

                    <div className="col-xs-12 col-sm-12 col-md-5 col-lg-5">
                        {
                            this.getBreedImage(breed)
                                ? <div className="detail__image">
                                    <img src={this.getBreedImage(breed)} alt={breed.name}/>
                                </div>
                                : null
                        }
                        <h1 className="detail__title d-md-none">{breed.name}</h1>
                    </div>

                    <div className="col-xs-12 col-sm-12 col-md-7 col-lg-7 d-none d-md-block">
                        <div className="detail__bio" id="bioClone">
                            <div className="detail__subtitle">
                                <img src={`${theme_url}/styles/assets/images/shared/icon-dog-02.svg`} alt="" />
                                    <h2><span className="d-none d-md-inline-block">{breed.name} </span>Bio</h2>
                            </div>
                            <div className="detail__description">
                                <BreedDescription />
                            </div>
                        </div>
                    </div>

                </div>
            </section>
        );
    }

    getBreedImage(breed) {
        return breed.pictures && breed.pictures.images
            ? breed.pictures.images[0].downloadUrl
            : null;
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        breed: state.singleBreed.k9_breed
    };
};

export default connect(mapStateToProps)(BreedDetailHead);