import {createForms} from 'react-redux-form';
import { combineReducers } from 'redux';

import availablePuppiesReducer from './availablePuppiesReducer';
import singlePuppyReducer from './singlePetReducer';
import petlandOptionsReducer from './petlandOptionsReducer';
import breedsReducer from './breedsReducer';
import singleBreedReducer from './singleBreedReducer';
import financingReducer from './financingReducer';
import contactUsReducer from './contactUsReducer';

import petInfoFormReducer from './petInfoFormReducer';
import breedInfoFormReducer from './breedInfoFormReducer';
import contactFormReducer from './contactFormReducer';

export default combineReducers({
    availablePuppies: availablePuppiesReducer,
    singlePuppy: singlePuppyReducer,
    petlandOptions: petlandOptionsReducer,
    breedsReducer: breedsReducer,
    singleBreed: singleBreedReducer,
    financing: financingReducer,
    contactUs: contactUsReducer,
    ...createForms({
        petInfo: petInfoFormReducer,
        breedInfo: breedInfoFormReducer,
        contactInfo: contactFormReducer,
    }),
});
