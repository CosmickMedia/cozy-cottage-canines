import React, {Component} from 'react';
import { connect } from 'react-redux';
import BreedCharacteristics from './BreedCharacteristics';

class BreedDetailsDesktop extends Component {


    render() {
        return (
            <div className={'detail__container'}>
                <section className="tab-content">

                    <div className="specs tab-pane fade active show"
                         id="bio"
                         role="tabpanel"
                         aria-labelledby="details-tab" />

                    <BreedCharacteristics />

                </section>

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

export default connect(mapStateToProps)(BreedDetailsDesktop);