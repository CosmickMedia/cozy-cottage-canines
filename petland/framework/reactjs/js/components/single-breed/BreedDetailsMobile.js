import React, {Component} from 'react';
import { connect } from 'react-redux';
import BreedCharacteristics from './BreedCharacteristics';

class BreedDetailsMobile extends Component {


    render() {
        const {theme_url, breed} = this.props;

        return (
            <div className={'d-md-none'}>
                <section className="nav__buttons">
                    <nav className="detail__tabs d-md-none">
                        <div className="nav nav-tabs" id="nav-tab" role="tablist">
                            <a className="nav-item nav-link active" id="bio-tab" data-toggle="tab" href="#bio" role="tab"
                               aria-controls="bio" aria-selected="true">bio</a>
                            <a className="nav-item nav-link" id="nav-profile-tab" data-toggle="tab" href="#details"
                               role="tab"
                               aria-controls="nav-profile" aria-selected="false">details</a>
                        </div>
                    </nav>
                </section>
                <div className={'detail__container'}>
                    <section className="tab-content">

                        <div className="specs tab-pane fade active show" id="bio" role="tabpanel"
                             aria-labelledby="details-tab">

                            <div className="detail__subtitle detail__subtitle--lg">
                                <img src={`${theme_url}/styles/assets/images/shared/icon-dog-02.svg`} alt="" />
                                <h2>Bio</h2>
                            </div>

                            <div className="row">
                                <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                    <div className="specs__group">
                                        <h4 className="specs__title">Description </h4>
                                        <p className="specs__text">{breed.description}</p>

                                        <h4 className="specs__title">History</h4>
                                        <p className="specs__text">{breed.origin}</p>

                                        <h4 className="specs__title">Color</h4>
                                        <p className="specs__text">{breed.colorDescription}</p>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <BreedCharacteristics />

                    </section>
                </div>
            </div>
        );
    }
}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        breed: state.singleBreed.k9_breed
    };
};

export default connect(mapStateToProps)(BreedDetailsMobile);