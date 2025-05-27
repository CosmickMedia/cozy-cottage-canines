import React, {Component} from 'react';
import { connect } from 'react-redux';
import {Form, Control} from 'react-redux-form';
import {isEmail, isEmpty, isLength, isNumeric} from 'validator';

import {requestContactInformation, setContactFormFeedback} from '../../actions/contactFormActions';

const required = str => !isEmpty(str);
const minLength = str => isLength(str, {min: 9});

class ContactUsForm extends Component {

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
        const { theme_url, requestingInfo, formFeedback } = this.props;

        return (
            <div className={'row'}>
                <div className="col-xs-12 col-sm-12 col-md-4 col-lg-4">
                    <div className="form__info">
                        <h2 className="form__title">
                            Fill out the form below and we’ll get back to you as soon as possible.
                        </h2>
                    </div>
                </div>
                <div className="col-xs-12 col-sm-12 col-md-8 col-lg-8">
                    <Form model="contactInfo"
                          onSubmit={(val) => this.handleSubmit(val)}
                          onSubmitFailed={(val) => this.updateValidity(val)}
                          onUpdate={(val) => this.updateValidity(val)}
                          validators={{
                              firstName: {required},
                              lastName: {required},
                              phone: {required, minLength, isNumeric},
                              message: {required},
                              email: {required,isEmail},
                          }}>
                        <div className="form-row">

                            <div className="form-group col-md-6">
                                <label htmlFor="contactInfo.firstName">First Name</label>
                                <Control.text className={this.getControlClass('firstName')}
                                              id="contactInfo.firstName"
                                              model="contactInfo.firstName"
                                              placeholder="your name"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                            </div>

                            <div className="form-group col-md-6">

                                <label htmlFor="contactInfo.lastName">Last Name</label>
                                <Control.text className={this.getControlClass('lastName')}
                                              id="contactInfo.lastName"
                                              model="contactInfo.lastName"
                                              placeholder="your last name"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                                
                            </div>
                        </div>

                        <div className="form-row">
                            <div className="form-group col-md-6">
                                
                                <label htmlFor="contactInfo.email">EmailName</label>
                                <Control.text className={this.getControlClass('email')}
                                              id="contactInfo.email"
                                              model="contactInfo.email"
                                              placeholder="your e-mail"
                                              disabled={requestingInfo} />

                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                                
                            </div>
                            
                            <div className="form-group col-md-6">
                                
                                <label htmlFor="contactInfo.phone">Phone</label>
                                <Control.text className={this.getControlClass('phone')}
                                              id="contactInfo.phone"
                                              model="contactInfo.phone"
                                              placeholder="your phone"
                                              disabled={requestingInfo} />
                                <div className="invalid-feedback">
                                    <img src={`${theme_url}/styles/assets/images/shared/form-error.svg`} alt="" />
                                </div>
                                
                            </div>
                        </div>

                        <div className="form-group">
                            <label htmlFor="contactInfo.message">Phone</label>
                            <Control.textarea className={this.getControlClass('message')}
                                              id="contactInfo.message"
                                              rows="20"
                                              model="contactInfo.message"
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
        );
    }

    getControlClass(controlName) {
        const {formValidity} = this.state;
        const isValid = formValidity[controlName];
        return isValid ? 'form-control':'is-invalid form-control';
    }

    handleSubmit(value) {
        const {requestContactInformation, thank_you_page_url, setContactFormFeedback} = this.props;

        const request = {
            ...value,
            redirectTo: thank_you_page_url
        };

        setContactFormFeedback('Processing your request');

        requestContactInformation(request);
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        thank_you_page_url: petlandOptions.thank_you_page_url,
        theme_url: petlandOptions.theme_url,
        petland_options: petlandOptions,
        requestingInfo: state.contactUs.requestingInfo,
        formFeedback: state.contactUs.formFeedback,
    }
};

export default connect(mapStateToProps, {requestContactInformation, setContactFormFeedback})(ContactUsForm);