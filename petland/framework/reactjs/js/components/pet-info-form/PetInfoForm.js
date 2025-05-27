import React, {Component} from 'react';
import { connect } from 'react-redux';
import {Form, Control} from 'react-redux-form';
import {isEmail, isEmpty, isLength, isNumeric} from 'validator';

const required = str => !isEmpty(str);
const minLength = str => isLength(str, {min: 9});

import {requestPetInformation, setPetFormFeedback} from '../../actions/singlePetActions';

class PetInfoForm extends Component {

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
            <div className="row">
                <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div className="form__info">
                        <h2 className="form__title">
                            REQUEST
                            PUPPY INFORMATION.
                        </h2>
                        <p className="form__text">
                            Call us at <b>954-442-3106</b> or <b>fill out the form</b> and we'll get back to you shortly.
                        </p>
                    </div>
                </div>
                <div className="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <Form model="petInfo"
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

                                <label htmlFor="petInfo.firstName">First Name</label>
                                <Control.text className={this.getControlClass('firstName')}
                                              id="petInfo.firstName"
                                              model="petInfo.firstName"
                                              placeholder="name"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>

                            </div>

                            <div className="form-group col-md-6">
                                <label htmlFor="petInfo.lastName">Last Name</label>
                                <Control.text className={this.getControlClass('lastName')}
                                              id="petInfo.lastName"
                                              model="petInfo.lastName"
                                              placeholder="last name"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                            </div>

                        </div>

                        <div className="form-row">
                            <div className="form-group col-md-6">

                                <label htmlFor="petInfo.email">EmailName</label>
                                <Control.text className={this.getControlClass('email')}
                                              id="petInfo.email"
                                              model="petInfo.email"
                                              placeholder="e-mail"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>

                            </div>
                            <div className="form-group col-md-6">
                                <label htmlFor="petInfo.phone">Phone</label>
                                <Control.text className={this.getControlClass('phone')}
                                              id="petInfo.phone"
                                              model="petInfo.phone"
                                              placeholder="phone"
                                              disabled={requestingInfo} />
                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                            </div>
                        </div>

                        <div className="form-group">
                            <label htmlFor="petInfo.message">Phone</label>
                            <Control.textarea className={this.getControlClass('message')}
                                              id="petInfo.message"
                                              rows="20"
                                              model="petInfo.message"
                                              placeholder="message"
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
        );
    }

    getControlClass(controlName) {
        const {formValidity} = this.state;
        const isValid = formValidity[controlName];
        return isValid ? 'form-control':'is-invalid form-control';
    }

    handleSubmit(value) {
        const {requestPetInformation, pet, thank_you_page_url, setPetFormFeedback} = this.props;

        const request = {
            ...value,
            store: pet.OrgName.replace('Petland ', ''),
            petId: pet.ReferenceNumber,
            petUrl: window.location.href,
            breed: pet.BreedName,
            gender: pet.Gender,
            color: pet.Coloring,
            dob: pet.BirthDate,
            redirectTo: thank_you_page_url
        };

        setPetFormFeedback('Processing request');

        requestPetInformation(request);
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        thank_you_page_url: petlandOptions.thank_you_page_url,
        theme_url: petlandOptions.theme_url,
        pet_details: petlandOptions.pet_details,
        pet: state.singlePuppy.pet,
        requestingInfo: state.singlePuppy.requestingInfo,
        formFeedback: state.singlePuppy.formFeedback,
    };
};

export default connect(mapStateToProps, {requestPetInformation, setPetFormFeedback})(PetInfoForm);