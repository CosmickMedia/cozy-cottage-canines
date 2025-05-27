import React, {Component} from 'react';
import { connect } from 'react-redux';

class PetCharacteristics extends Component {


    render() {
        const {pet} = this.props;

        return (
            <div>
                <div className="d-md-none">
                    <button className="btn btn--collapse btn-block btn-sm collapsed" data-toggle="collapse"
                            data-target="#characteristics"
                            aria-expanded="true" aria-controls="characteristics">characteristics <i className="fa fa-angle-down ml-3" />
                    </button>
                </div>

                <div className="detail__bio detail__bio--v2 tab-pane fade active show collapse " id="characteristics"
                     data-parent="#tabPanel">

                    <div className="detail__description">
                        <ul className="detail__list">
                            <li className="detail__item">
                                <span className="detail__span">Life Span</span>
                                <span className="detail__detail">12-15 years</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Shedding</span>
                                <span className="detail__detail">Moderate</span>
                            </li>
                            <li className="detail__item">
                                <span className="detail__span">Coat Lenght</span>
                                <span className="detail__detail">Medium</span>
                            </li>
                            <li className="detail__item">
                                <span className="detail__span">Grooming</span>
                                <span className="detail__detail">Medium</span>
                            </li>
                            <li className="detail__item">
                                <span className="detail__span">Size</span>
                                <span className="detail__detail">M</span>
                            </li>
                            <li className="detail__item">
                                <span className="detail__span">Color</span>
                                <span className="detail__detail">
                                        <span className="color" style={{'backgroundColor': '#e0b592'}}></span>
                                        <span className="color" style={{'backgroundColor': '#e0b592'}}></span>
                                        <span className="color" style={{'backgroundColor': '#e0b592'}}></span>
                                        <span className="color" style={{'backgroundColor': '#e0b592'}}></span>
                                    </span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Mom's Weight</span>
                                <span className="detail__detail">43 Kg</span>
                            </li>
                            <li className="detail__item">
                                <span className="detail__span">Dad's Weight</span>
                                <span className="detail__detail">48 Kg</span>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        );
    }
    
}

const mapStateToProps = state => {
    const { pet } = state.singlePuppy;
    const { petlandOptions } = state.petlandOptions;

    return {
        locations: petlandOptions.filters.locations,
        pet_details: petlandOptions.pet_details,
        theme_url: petlandOptions.theme_url,
        pet
    };
};

export default connect(mapStateToProps)(PetCharacteristics);