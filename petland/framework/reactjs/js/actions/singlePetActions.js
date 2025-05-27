import {saveInLocalStorage} from '../utils';
import {
    FETCH_PET_DETAILS,
    FETCH_PETKEY_BREED_DETAILS,
    REQUESTING_PET_INFORMATION,
    SET_PET_FORM_FEEDBACK} from './types';

export const fetchPetDetails = (petId, petLocation) => (dispatch) => {

    fetch(`${wp_petland_reactjs.rest_url}/pet/${petId}/${petLocation}`)
        .then(response => response.json())
        .then(petResponse => {

            saveInLocalStorage(`pet-${petId}`, petResponse);
            dispatch({
                type: FETCH_PET_DETAILS,
                payload: petResponse
            });

            fetch(`${wp_petland_reactjs.k9_api_url}/petkey-breed/${petResponse.BreedId}`)
                .then(breedResponse => breedResponse.json())
                .then(breedResponse => {

                    if (breedResponse.success) {
                        saveInLocalStorage(`petkey-breed-${petId}`, breedResponse.data.breed);

                        dispatch({
                            type: FETCH_PETKEY_BREED_DETAILS,
                            payload: breedResponse.data.breed
                        });
                    }

                });

        })

};

export const setPetFormFeedback = (message) => (dispatch) => {
    dispatch({
        type: SET_PET_FORM_FEEDBACK,
        payload: message
    });
};

export const requestPetInformation = (request) => (dispatch) => {

    dispatch({
        type: REQUESTING_PET_INFORMATION,
        payload: true
    });

    fetch(
        `${wp_petland_reactjs.rest_url}/request-pet-information`,
        {
            method: 'POST',
            headers: {
                "Content-Type": "application/json; charset=utf-8",
            },
            body: JSON.stringify(request)
        })
        .then(response => response.json())
        .then(response => {

            if (response.success) {
                dispatch({
                    type: SET_PET_FORM_FEEDBACK,
                    payload: 'Thank you for your request'
                });

                window.location.href = request.redirectTo;
            } else {

                dispatch({
                    type: REQUESTING_PET_INFORMATION,
                    payload: false
                });

                dispatch({
                    type: SET_PET_FORM_FEEDBACK,
                    payload: 'There was a error while processing your request'
                });
            }
        });
};
