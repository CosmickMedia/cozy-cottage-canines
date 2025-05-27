import {REQUESTING_CONTACT_INFORMATION, SET_CONTACT_FORM_FEEDBACK} from '../actions/types';

const initialState = {
    requestingInfo: false,
    formFeedback: '',
};

const contactUsReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case REQUESTING_CONTACT_INFORMATION:
            return {...state, requestingInfo: payload};
        case SET_CONTACT_FORM_FEEDBACK:
            return {...state, formFeedback: payload};
        default:
            return state;
    }
}

export default contactUsReducer;