import {
    CHANGE_PET_BREED,
    CHANGE_PET_GENDER,
    CHANGE_PET_LOCATION,
    CHANGE_PET_TYPE,
    FETCH_AVAILABLE_BREEDS,
    FETCH_AVAILABLE_PUPPIES
} from './types';
import {saveInLocalStorage} from '../utils';


export const fetchAvailablePuppies = () => (dispatch) => {
    fetch(`${wp_petland_reactjs.rest_url}/available-puppies`)
        .then(response => response.json())
        .then(response => {

            const puppies = response.puppies
                .sort((a, b) => {
                    return a.BreedName !== b.BreedName
                        ? a.BreedName > b.BreedName ? 1 : -1
                        : 0;
                });

            const breeds = Object.keys(response.breeds)
                .map(key => {
                    const breed = response.breeds[key];
                    return {
                        name: breed.BreedName,
                        value: breed.BreedId,
                        petType: breed.PetType,
                    };
                })
                .sort((a, b) => {
                    return a.name !== b.name
                        ? a.name > b.name ? 1 : -1
                        : 0;
                });

            saveInLocalStorage('puppies', puppies);
            saveInLocalStorage('breeds', breeds);

            dispatch({
                type: FETCH_AVAILABLE_PUPPIES,
                payload: puppies
            });

            dispatch({
                type: FETCH_AVAILABLE_BREEDS,
                payload: breeds
            });

        });

};

export const changeLocation = (location) => (dispatch) => {
    saveInLocalStorage('location', location);
    dispatch({
        type: CHANGE_PET_LOCATION,
        payload: location
    });
};

export const changePetType = (petType) => (dispatch) => {
    saveInLocalStorage('petType', petType);
    dispatch({
        type: CHANGE_PET_TYPE,
        payload: petType
    });
};

export const changePetBreed = (petBreed) => (dispatch) => {
    saveInLocalStorage('petBreed', petBreed);
    dispatch({
        type: CHANGE_PET_BREED,
        payload: petBreed
    });
};

export const changePetGender = (petGender) => (dispatch) => {
    saveInLocalStorage('petGender', petGender);
    dispatch({
        type: CHANGE_PET_GENDER,
        payload: petGender
    });
};