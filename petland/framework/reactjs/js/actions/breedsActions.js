import {CHANGE_BREED, FETCH_BREEDS} from './types';
import {saveInLocalStorage} from '../utils';

export const fetchBreeds = () => (dispatch) => {
    fetch(`${wp_petland_reactjs.k9_api_url}/breeds`)
        .then(response => response.json())
        .then(response => {

            const { breeds } = response.data;

            const orderedBreeds = breeds
                .sort((a, b) => {
                    if (a.name > b.name) {
                        return 1;
                    }

                    if (a.name < b.name) {
                        return -1;
                    }

                    return 0;
                });

            saveInLocalStorage('k9_breeds', orderedBreeds);

            dispatch({
                type: FETCH_BREEDS,
                payload: orderedBreeds
            });
        });

};

export const changeBreed = (breed) => (dispatch) => {
    saveInLocalStorage('selected_breeds', breed);
    dispatch({
        type: CHANGE_BREED,
        payload: breed
    });
};
