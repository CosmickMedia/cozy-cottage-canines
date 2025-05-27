import React, {Component} from 'react';
import {connect} from 'react-redux';

class PetTabs extends Component {

    constructor() {
        super();
        this.buttonElement;
    }

    render() {
        const {breed, pet} = this.props;

        return (
            <div className="col-xs-12 col-sm-12 col-md-6 col-lg-6  p-0">

                <div className="nav__buttons">
                    <nav className="detail__tabs d-none d-md-block">
                        <div className="nav nav-tabs" id="nav-tab" role="tablist">

                            <a className="nav-item nav-link active"
                               id="bioVt-tab"
                               data-toggle="tab"
                               href="#bioVt"
                               role="tab"
                               aria-controls="bioVt"
                               aria-selected="true">Bio</a>

                            <a className="nav-item nav-link"
                               id="characteristics-tab"
                               data-toggle="tab"
                               href="#characteristics"
                               role="tab"
                               aria-controls="characteristics" aria-selected="false">Characteristics</a>
                        </div>
                    </nav>
                </div>

                <div className="tab-content detail__panel" id="tabPanel">

                    <div className="d-md-none">
                        <button className="btn btn--collapse btn-block btn-sm"
                                data-toggle="collapse"
                                ref={button => this.buttonElement = button }
                                data-target="#bioVt"
                                aria-expanded="true" aria-controls="bioVt">Bio <i className="fa fa-angle-down ml-3" />
                        </button>
                    </div>

                    <div className="detail__bio detail__bio--v2 char fade collapse active show"
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

                    <div className="d-md-none">
                        <button className="btn btn--collapse btn-block btn-sm collapsed" data-toggle="collapse"
                                data-target="#characteristics"
                                aria-expanded="true" aria-controls="characteristics">characteristics <i className="fa fa-angle-down ml-3" />
                        </button>
                    </div>

                    <div className="detail__bio detail__bio--v2 fade collapse" id="characteristics"
                         data-parent="#tabPanel">

                        <div className="detail__description">
                            {
                                breed
                                    ? <ul className="detail__list">
                                        <li className="detail__item">
                                            <span className="detail__span">Life Span</span>
                                            <span className="detail__detail"> {breed.characteristics.lifespan} years</span>
                                        </li>

                                        <li className="detail__item">
                                            <span className="detail__span">Shedding</span>
                                            <span className="detail__detail text-capitalize"> {breed.characteristics.shedding}</span>
                                        </li>
                                        <li className="detail__item">
                                            <span className="detail__span">Coat Length</span>
                                            <span className="detail__detail text-capitalize"> {breed.characteristics.coatLength}</span>
                                        </li>
                                        <li className="detail__item">
                                            <span className="detail__span">Grooming</span>
                                            <span className="detail__detail text-capitalize"> {breed.characteristics.grooming}</span>
                                        </li>
                                        <li className="detail__item">
                                            <span className="detail__span">Size</span>
                                            <span className="detail__detail text-capitalize"> {breed.characteristics.size}</span>
                                        </li>
                                        <li className="detail__item">
                                            <span className="detail__span">Color</span>
                                            <span className="detail__detail text-capitalize">
                                                {this.getBreedColors(breed)}
                                            </span>
                                        </li>

                                    </ul>
                                    : null
                            }

                        </div>
                    </div>

                    <div className="reserve-playtime">
                        <hr/>
                        Reserve your puppy playtime
                    </div>

                    <div className="detail__button">
                        <a href={'#pet-info'} onClick={this.scrollToForm} className="btn btn-primary btn-block btn--image">
                            request puppy <br className={'d-md-none'}/> information
                        </a>
                    </div>
                </div>

            </div>
        );
    }

    componentDidUpdate() {
        //this.buttonElement.click();
    }

    scrollToForm(event) {
        event.preventDefault();
        document.querySelector('#pet-info').scrollIntoView({
            behavior: 'smooth'
        });
    }

    getBreedColors(breed) {
        return Array.apply(null, {length: 4})
            .map((value, index) => `color${index + 1}`)
            .filter(colorKey => breed[colorKey] !== '')
            .map(colorKey => {
                return (
                    <span key={colorKey} className="color" style={{'backgroundColor': breed[colorKey]}} />
                );
            })
    }

}

const mapStateToProps = state => {
    const { pet, breed } = state.singlePuppy;
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        pet,
        breed,
    };
};

export default connect(mapStateToProps)(PetTabs);