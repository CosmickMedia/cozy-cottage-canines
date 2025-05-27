import {
    CHANGE_PET_BREED,
    CHANGE_PET_GENDER,
    CHANGE_PET_LOCATION,
    CHANGE_PET_TYPE,
    FETCH_AVAILABLE_BREEDS,
    FETCH_AVAILABLE_PUPPIES
} from '../actions/types';

import {getFromLocalStorage} from '../utils';

const initialState = {
    petlandOptions: wp_petland_reactjs,
    puppies: getFromLocalStorage('puppies') || [],
    breeds: getFromLocalStorage('breeds') || [],
    location: getFromLocalStorage('location') || {'all': true},
    petGender: getFromLocalStorage('petGender') || {'all': true},
    petBreed: getFromLocalStorage('petBreed') || {'all': true},
    petType: getFromLocalStorage('petType') || {'all' : true},
};

const availablePuppiesReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case FETCH_AVAILABLE_PUPPIES:
            return {...state, puppies: payload};
        case FETCH_AVAILABLE_BREEDS:
            return {...state, breeds: payload};
        case CHANGE_PET_TYPE:
            return {...state, petType: payload};
        case CHANGE_PET_BREED:
            return {...state, petBreed: payload};
        case CHANGE_PET_GENDER:
            return {...state, petGender: payload};
        case CHANGE_PET_LOCATION:
            return {...state, location: payload};
        default:
            return state;
    }
};

export default availablePuppiesReducer;