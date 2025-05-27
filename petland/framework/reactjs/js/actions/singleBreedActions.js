import {saveInLocalStorage} from '../utils';
import {
    FETCH_BREED_DETAILS,
    REQUESTING_BREED_INFORMATION,
    SET_BREED_FORM_FEEDBACK
} from './types';

export const fetchBreedDetails = (breedId) => (dispatch) => {

    fetch(`${wp_petland_reactjs.k9_api_url}/breed/${breedId}`)
        .then(response => response.json())
        .then(response => {
            const {breed} = response.data;

            saveInLocalStorage(`breed-${breedId}`, breed);

            dispatch({
                type: FETCH_BREED_DETAILS,
                payload: breed
            });
        })

};

export const setBreedFormFeedback = (message) => (dispatch) => {
    dispatch({
        type: SET_BREED_FORM_FEEDBACK,
        payload: message
    })
};

export const requestBreedInformation = (request) => (dispatch) => {
    dispatch({
        type: REQUESTING_BREED_INFORMATION,
        payload: true
    });

    fetch(
        `${wp_petland_reactjs.rest_url}/request-breed-information`,
        {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json; charset=utf-8',
            },
            body: JSON.stringify(request)
        })
        .then(response => response.json())
        .then(response => {

            if (response.success) {
                dispatch({
                    type: SET_BREED_FORM_FEEDBACK,
                    payload: 'Thank you for your request'
                });

                window.location.href = request.redirectTo;
            } else {

                dispatch({
                    type: REQUESTING_BREED_INFORMATION,
                    payload: false
                });

                dispatch({
                    type: SET_BREED_FORM_FEEDBACK,
                    payload: 'There was a error while processing your request'
                });
            }

        });
};