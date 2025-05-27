import React, {Component} from 'react';
import { connect } from 'react-redux';

class PuppiesAvailableByBreed extends Component {

    render() {
        return (
            <section className="puppies__list">

                <div className="row">
                    <div className="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                        <h2 className="puppies__heading">
                            AVAILABLE AKITAS
                        </h2>
                    </div>
                    <div className="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div className="puppies__card">
                            <a href="" className="puppies__action"  />
                            <div className="puppies__image">
                                <img src="https://picsum.photos/320/220?image=1062" alt="" />
                            </div>
                            <div className="puppies__content">
                                <div className="puppies__info">
                                    <ul>
                                        <li>Dog</li>
                                        <li>• Male</li>
                                        <li>• Ref id: 3703</li>
                                        <li>• 02/21/2018</li>
                                    </ul>
                                </div>
                                <div className="puppies__title">
                                    <h6>American Eskimo</h6>
                                </div>
                                <div className="puppies__city">
                                    <p>Plantation</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div className="puppies__card">
                            <a href="" className="puppies__action"  />
                            <div className="puppies__image">
                                <img src="https://picsum.photos/320/220?image=1062" alt="" />
                            </div>
                            <div className="puppies__content">
                                <div className="puppies__info">
                                    <ul>
                                        <li>Dog</li>
                                        <li>• Male</li>
                                        <li>• Ref id: 3703</li>
                                        <li>• 02/21/2018</li>
                                    </ul>
                                </div>
                                <div className="puppies__title">
                                    <h6>American Eskimo</h6>
                                </div>
                                <div className="puppies__city">
                                    <p>Plantation</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div className="col-xs-12 col-sm-12 col-md-12 col-lg-4">
                        <div className="puppies__card">
                            <a href="" className="puppies__action"  />
                            <div className="puppies__image">
                                <img src="https://picsum.photos/320/220?image=1062" alt="" />
                            </div>
                            <div className="puppies__content">
                                <div className="puppies__info">
                                    <ul>
                                        <li>Dog</li>
                                        <li>• Male</li>
                                        <li>• Ref id: 3703</li>
                                        <li>• 02/21/2018</li>
                                    </ul>
                                </div>
                                <div className="puppies__title">
                                    <h6>American Eskimo</h6>
                                </div>
                                <div className="puppies__city">
                                    <p>Plantation</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </section>
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

export default connect(mapStateToProps)(PuppiesAvailableByBreed);