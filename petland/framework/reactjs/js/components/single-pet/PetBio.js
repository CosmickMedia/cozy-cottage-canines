import React, {Component} from 'react';
import { connect } from 'react-redux';

class PetBio extends Component {


    render() {
        const {pet} = this.props;

        return (
            <div>
                <div className="d-md-none">
                    <button className="btn btn--collapse btn-block btn-sm collapsed" data-toggle="collapse"
                            data-target="#bioVt"
                            aria-expanded="true" aria-controls="bioVt">Bio <i className="fa fa-angle-down ml-3" />
                    </button>
                </div>

                <div className="detail__bio detail__bio--v2 char tab-pane fade collapse"
                     id="bioVt"
                     data-parent="#tabPanel">
                    <div className="detail__description">
                        <ul className="detail__list">
                            <li className="detail__item">
                                <span className="detail__span">Breed</span>
                                <span className="detail__detail">{pet.BreedName}</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Color</span>
                                <span className="detail__detail">{pet.Coloring}</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Location</span>
                                <span className="detail__detail">{pet.OrgName.replace('Petland ', '')}</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Gender</span>
                                <span className="detail__detail">{pet.Gender}</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">D.O.B</span>
                                <span className="detail__detail">{pet.BirthDate}</span>
                            </li>

                            <li className="detail__item">
                                <span className="detail__span">Ref ID</span>
                                <span className="detail__detail">{pet.ReferenceNumber}</span>
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

export default connect(mapStateToProps)(PetBio);