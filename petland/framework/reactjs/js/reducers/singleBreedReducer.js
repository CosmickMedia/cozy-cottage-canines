import {getFromLocalStorage} from '../utils';
import {
    FETCH_BREED_DETAILS,
    REQUESTING_BREED_INFORMATION,
    SET_BREED_FORM_FEEDBACK,
} from '../actions/types';

const initialState = {
    k9_breed: wp_petland_reactjs.breed_details ? getFromLocalStorage(`breed-${wp_petland_reactjs.breed_details.breed_id}`) || null : null,
    requestingInfo: false,
    formFeedback: '',
};

const singleBreedReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case FETCH_BREED_DETAILS:
            return {...state, k9_breed: payload};
        case REQUESTING_BREED_INFORMATION:
            return {...state, requestingInfo: payload};
        case SET_BREED_FORM_FEEDBACK:
            return {...state, formFeedback: payload};
        default:
            return state;
    }
};

export default singleBreedReducer;