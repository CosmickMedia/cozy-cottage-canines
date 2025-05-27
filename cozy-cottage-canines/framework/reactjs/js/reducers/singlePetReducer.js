import {
    FETCH_PET_DETAILS,
    FETCH_PETKEY_BREED_DETAILS,
    REQUESTING_PET_INFORMATION,
    SET_PET_FORM_FEEDBACK
} from '../actions/types';
import {getFromLocalStorage} from '../utils';

const initialState = {
    pet: wp_petland_reactjs.pet_details ? getFromLocalStorage(`pet-${wp_petland_reactjs.pet_details.pet_id}`) || null : null,
    breed: wp_petland_reactjs.pet_details ? getFromLocalStorage(`petkey-breed-${wp_petland_reactjs.pet_details.pet_id}`) || null : null,
    requestingInfo: false,
    formFeedback: '',
};

const singlePetReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case FETCH_PET_DETAILS:
            return {...state, pet: payload};
        case FETCH_PETKEY_BREED_DETAILS:
            return {...state, breed: payload};
        case REQUESTING_PET_INFORMATION:
            return {...state, requestingInfo: payload};
        case SET_PET_FORM_FEEDBACK:
            return {...state, formFeedback: payload};
        default:
            return state;
    }
};

export default singlePetReducer;