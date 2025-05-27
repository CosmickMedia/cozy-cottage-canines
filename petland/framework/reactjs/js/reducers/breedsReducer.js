import {getFromLocalStorage} from '../utils';
import {CHANGE_BREED, FETCH_BREEDS} from '../actions/types';

const initialState = {
    k9_breeds: getFromLocalStorage('k9_breeds') || [],
    selectedBreeds: getFromLocalStorage('selected_breeds') || {'all': true},
};

const breedsReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case FETCH_BREEDS:
            return {...state, k9_breeds: payload};
        case CHANGE_BREED:
            return {...state, selectedBreeds: payload};
        default:
            return state;
    }
};

export default breedsReducer;