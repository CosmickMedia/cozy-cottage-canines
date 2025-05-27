import React, {Component} from 'react';
import { connect } from 'react-redux';

class SinglePetBreedDetails extends Component {

    constructor() {
        super();

        this.barkingValues = {
            quite_barks: 'Quite Barks',
            barks_if_necessary: 'Barks If Necessary',
            loves_to_bark: 'Barks If Necessary',
        };

        this.trainabilityValues = {
            easy: 100,
            moderate: 50,
            hard: 10,
        };
    }

    render() {

        const {breed, theme_url} = this.props;
        const behavior = breed ?  breed.behavior :  null;

        return (
                breed && behavior ? <div>
                    <div className="specs">
                        <div className="detail__subtitle detail__subtitle--lg">
                            <img src={`${theme_url}/styles/assets/images/shared/icon-dog-01.svg`} alt="" />
                            <h2>Behavior</h2>
                        </div>
                        <div className="row">
                            <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div className="specs__group">
                                    <h4 className="specs__title">Temperament </h4>
                                    <p className="specs__text">{behavior.temperament}</p>

                                    <h4 className="specs__title">Barking</h4>
                                    <p className="specs__text">{this.barkingValues[behavior.barking]}</p>
                                </div>
                            </div>

                            <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div className="specs__group">

                                    <div className="specs__progress">
                                        <h4 className="specs__title">Adaptability</h4>

                                        <h6 className="progress__label">Adaptability to apartment living</h6>
                                        <div className="progress">
                                            <div className="progress-bar  bg-info"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.apartmentLiving)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.apartmentLiving)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                        <h6 className="progress__label">Good for novice owners</h6>
                                        <div className="progress">
                                            <div className="progress-bar  bg-info"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.noviceOwners)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.noviceOwners)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                        <h6 className="progress__label">Tolerates being alone</h6>
                                        <div className="progress">
                                            <div className="progress-bar bg-info"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.beingAlone)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.beingAlone)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                        <h6 className="progress__label">Tolerates cold weather</h6>
                                        <div className="progress">
                                            <div className="progress-bar bg-info"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.coldWeather)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.coldWeather)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                        <h6 className="progress__label">Family Friendly</h6>
                                        <div className="progress">
                                            <div className="progress-bar  bg-info"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.familyFriendly)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.familyFriendly)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                                <div className="specs__group">
                                    <div className="specs__progress">
                                        <h4 className="specs__title">Exercise needs</h4>

                                        <h6 className="progress__label">Energy level</h6>
                                        <div className="progress">
                                            <div className="progress-bar bg-dark-gray"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.energyLevel)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.energyLevel)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>

                                        <h6 className="progress__label">Exercise needs</h6>
                                        <div className="progress">
                                            <div className="progress-bar bg-dark-gray"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.exerciseNeeds)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.exerciseNeeds)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>

                                        <h6 className="progress__label">Playfulness</h6>
                                        <div className="progress">
                                            <div className="progress-bar bg-dark-gray"
                                                 role="progressbar"
                                                 style={{width: `${this.getPercentageFromNumber(behavior.playfulness)}%`}}
                                                 aria-valuenow={this.getPercentageFromNumber(behavior.playfulness)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                    </div>

                                    <div className="specs__progress">
                                        <h4 className="specs__title">Trainability</h4>

                                        <div className="progress">
                                            <div className="progress-bar bg-success"
                                                 role="progressbar"
                                                 style={{width: `${this.getTrainabilityPercentage(behavior.trainability)}%`}}
                                                 aria-valuenow={this.getTrainabilityPercentage(behavior.trainability)}
                                                 aria-valuemin="0"
                                                 aria-valuemax="100" />
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                : null
        );
    }

    getPercentageFromNumber(value) {
        return Math.floor(value * 100 / 5);
    }

    getTrainabilityPercentage(trainability) {
        return this.trainabilityValues[trainability];
    }
}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        breed: state.singlePuppy.breed
    };
};

export default connect(mapStateToProps)(SinglePetBreedDetails);