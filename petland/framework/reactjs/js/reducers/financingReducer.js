import {getFromLocalStorage} from '../utils';
import {FETCH_FINANCING_CONTENT} from '../actions/types';

const initialState = {
    financing_content: getFromLocalStorage('financing_content') || ''
};

const financingReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        case FETCH_FINANCING_CONTENT:
            return {...state, financing_content: payload};
        default:
            return state;
    }
};

export default financingReducer;