import React, {Component} from 'react';
import { connect } from 'react-redux';
import {Form, Control} from 'react-redux-form';
import {isEmail, isEmpty, isLength, isNumeric} from 'validator';

import {requestBreedInformation, setBreedFormFeedback} from '../../actions/singleBreedActions';

const required = str => !isEmpty(str);
const minLength = str => isLength(str, {min: 9});

class BreedInterestForm extends Component{

    constructor(props) {
        super(props);
        this.state = {
            formValidity: {
                firstName: true,
                lastName: true,
                email: true,
                phone: true,
                message: true,
            }
        };
    }

    updateValidity(values) {

        const {formValidity} = this.state;

        const newValidity = Object.keys(formValidity)
            .reduce((acc, current) => {
                const newValue = values[current].valid || !values[current].touched;
                return {...acc, [current]: newValue};
            }, {});

        this.setState({
            formValidity: newValidity
        });

    }

    render() {
        const {theme_url, requestingInfo, formFeedback} = this.props;

        return (
            <div className={'detail__container'}>
                <section className="form">

                    <div className="row">
                        <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                            <div className="form__info">
                                <h2 className="form__title">
                                    INTERESTED
                                    IN THIS BREED?
                                    MORE INFO.
                                </h2>
                                <h4 className="form__subtitle">
                                    FILL OUT THIS FORM
                                </h4>
                                <p className="form__text">
                                    Call us at 954-442-3106 or fill in the form and we'll get back to you shortly
                                </p>
                            </div>
                        </div>
                        <div className="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                            <Form model="breedInfo"
                                  onSubmit={(val) => this.handleSubmit(val)}
                                  onSubmitFailed={(val) => this.updateValidity(val)}
                                  onUpdate={(val) => this.updateValidity(val)}
                                  validators={{
                                      firstName: {required},
                                      lastName: {required},
                                      phone: {required, minLength, isNumeric},
                                      message: {required},
                                      email: {required,isEmail},
                                  }}
                            >
                                <div className="form-row">
                                    <div className="form-group col-md-6">
                                        <label htmlFor="breedInfo.firstName">First Name</label>
                                        <Control.text className={this.getControlClass('firstName')}
                                                      id="breedInfo.firstName"
                                                      model="breedInfo.firstName"
                                                      placeholder="your name"
                                                      disabled={requestingInfo} />

                                        <div className="invalid-feedback">
                                            <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                        </div>

                                    </div>

                                    <div className="form-group col-md-6">
                                        <label htmlFor="breedInfo.lastName">Last Name</label>
                                        <Control.text className={this.getControlClass('lastName')}
                                                      id="breedInfo.lastName"
                                                      model="breedInfo.lastName"
                                                      placeholder="your last name"
                                                      disabled={requestingInfo} />

                                        <div className="invalid-feedback">
                                            <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                        </div>

                                    </div>

                                </div>

                                <div className="form-row">
                                    <div className="form-group col-md-6">
                                        <label htmlFor="breedInfo.email">EmailName</label>
                                        <Control.text className={this.getControlClass('email')}
                                                      id="breedInfo.email"
                                                      model="breedInfo.email"
                                                      placeholder="your e-mail"
                                                      disabled={requestingInfo} />

                                        <div className="invalid-feedback">
                                            <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                        </div>

                                    </div>

                                    <div className="form-group col-md-6">
                                        <label htmlFor="breedInfo.phone">Phone</label>
                                        <Control.text className={this.getControlClass('phone')}
                                                      id="breedInfo.phone"
                                                      model="breedInfo.phone"
                                                      placeholder="your phone"
                                                      disabled={requestingInfo} />
                                        <div className="invalid-feedback">
                                            <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                        </div>

                                    </div>
                                </div>

                                <div className="form-group">
                                    <label htmlFor="breedInfo.message">Phone</label>
                                    <Control.textarea className={this.getControlClass('message')}
                                                      id="breedInfo.message"
                                                      rows="20"
                                                      model="breedInfo.message"
                                                      placeholder="your message"
                                                      disabled={requestingInfo} />

                                    <div className="invalid-feedback">
                                        <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                    </div>

                                </div>
                                <div className="form-row">
                                    <div className="form-group col-md-6">{formFeedback}</div>

                                    <div className="form-group col-md-6 text-right">
                                        <button type="submit" className="btn btn-primary btn--icon" disabled={requestingInfo}>submit <i className="fa fa-angle-right" />
                                        </button>
                                    </div>
                                </div>

                            </Form>
                        </div>
                    </div>

                </section>
            </div>
        );
    }

    getControlClass(controlName) {
        const {formValidity} = this.state;
        const isValid = formValidity[controlName];
        return isValid ? 'form-control':'is-invalid form-control';
    }

    handleSubmit(value) {
        const {requestBreedInformation, breed, thank_you_page_url, setBreedFormFeedback} = this.props;

        const request = {
            ...value,
            breed: breed.name,
            breedUrl: window.location.href,
            redirectTo: thank_you_page_url
        };

        setBreedFormFeedback('Processing your request');

        requestBreedInformation(request);
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        thank_you_page_url: petlandOptions.thank_you_page_url,
        theme_url: petlandOptions.theme_url,
        breed: state.singleBreed.k9_breed,
        requestingInfo: state.singleBreed.requestingInfo,
        formFeedback: state.singleBreed.formFeedback,
    };
};

export default connect(mapStateToProps, {setBreedFormFeedback, requestBreedInformation})(BreedInterestForm);