import {REQUESTING_CONTACT_INFORMATION, SET_CONTACT_FORM_FEEDBACK} from './types';

export const setContactFormFeedback = (message) => (dispatch) => {
    dispatch({
        type: SET_CONTACT_FORM_FEEDBACK,
        payload: message
    });
};

export const requestContactInformation = (request) => (dispatch) => {

    dispatch({
        type: REQUESTING_CONTACT_INFORMATION,
        payload: true
    });

    fetch(
        `${wp_petland_reactjs.rest_url}/request-contact-information`,
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
                    type: SET_CONTACT_FORM_FEEDBACK,
                    payload: 'Thank you for your request'
                });

                window.location.href = request.redirectTo;
            } else {

                dispatch({
                    type: REQUESTING_CONTACT_INFORMATION,
                    payload: false
                });

                dispatch({
                    type: SET_CONTACT_FORM_FEEDBACK,
                    payload: 'There was a error while processing your request'
                });
            }
        });
};