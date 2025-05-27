import React from 'react';
import ReactDOM from 'react-dom';
import { Provider } from 'react-redux';

import { BrowserRouter, Route } from 'react-router-dom';

import AvailablePuppies from './components/available-puppies/AvailablePuppies';
import Blog from './components/blog/Blog';
import Breeds from './components/breeds/Breeds';
import CareersForm from './components/careers-form/CareersForm';
import ContactUsForm from './components/contact-us-form/ContactUsForm';
import FinancingContent from './components/financing-content/FinancingContent';
import Loader from './components/Loader';
import PetInfoForm from './components/pet-info-form/PetInfoForm';
import SingleBreed from './components/single-breed/SingleBreed';
import SinglePetBreedDetails from './components/single-pet/SinglePetBreedDetails';
import SinglePetDetails from './components/single-pet/SinglePetDetails';
import SinglePetSimilarPuppies from './components/single-pet/SinglePetSimilarPuppies';

import store from './store';

const componentContainersById = [
    'reactAvailablePuppies',
    'reactBlogList',
    'reactBreeds',
    'reactBreedDetails',
    'reactCareersForm',
    'reactContactUsForm',
    'reactFinancingContent',
    'reactLoader',
    'reactPetBreedDetails',
    'reactPetDetails',
    'reactPetInfoForm',
    'reactPetSimilar',
];

componentContainersById.forEach((container) => {
    const htmlContainer = document.getElementById(container);

    if (htmlContainer) {
        switch (container) {
            case 'reactAvailablePuppies':
                renderAvailablePuppies(htmlContainer);
                break;
            case 'reactBlogList':
                renderBlogList(htmlContainer);
                break;
            case 'reactPetDetails':
                renderPetDetails(htmlContainer);
                break;
            case 'reactBreeds':
                renderBreeds(htmlContainer);
                break;
            case 'reactBreedDetails':
                renderBreedDetails(htmlContainer);
                break;
            case 'reactFinancingContent':
                renderFinancingContent(htmlContainer);
                break;
            case 'reactContactUsForm':
                renderContactUsForm(htmlContainer);
                break;
            case 'reactCareersForm':
                renderCareersForm(htmlContainer);
                break;
            case 'reactPetInfoForm':
                renderPetInfoForm(htmlContainer);
                break;
            case 'reactPetBreedDetails':
                renderPetBreedInfo(htmlContainer);
                break;
            case 'reactPetSimilar':
                renderPetSimilarPuppies(htmlContainer);
                break;
            case 'reactLoader':
                renderMainLoader(htmlContainer);
                break;
        }
    }
});

const componentByClass = ['employment_form'];

componentByClass.forEach((className) => {
    const htmlContainers = document.getElementsByClassName(className);

    wp_petland_reactjs.careersFormsLength = htmlContainers.length;

    Array.apply(null, { length: htmlContainers.length }).forEach((value, index) => {
        switch (className) {
            case 'employment_form':
                renderCareersForm(htmlContainers.item(index));
                break;
        }
    });
});

function renderAvailablePuppies(htmlElement) {
    const availablePuppies = (
        <Provider store={store}>
            <BrowserRouter>
                <Route
                    path={[
                        '',
                        '/(:location)',
                        '/(:location)/(:pet_type)',
                        '/(:location)/(:pet_type)/(:pet_breed)',
                        '/(:location)/(:pet_type)/(:pet_breed)/(:pet_gender)',
                    ]}
                    component={AvailablePuppies}
                />
            </BrowserRouter>
        </Provider>
    );
    ReactDOM.render(availablePuppies, htmlElement);
}

function renderBlogList(htmlElement) {
    console.log('blog list');
    const blogList = (
        <Provider store={store}>
            <Blog />
        </Provider>
    );

    ReactDOM.render(blogList, htmlElement);
}

function renderPetDetails(htmlElement) {
    const petDetails = (
        <Provider store={store}>
            <SinglePetDetails />
        </Provider>
    );
    ReactDOM.render(petDetails, htmlElement);
}

function renderBreeds(htmlElement) {
    const breeds = (
        <Provider store={store}>
            <Breeds />
        </Provider>
    );
    ReactDOM.render(breeds, htmlElement);
}

function renderBreedDetails(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <SingleBreed />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderFinancingContent(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <FinancingContent />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderPetSimilarPuppies(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <SinglePetSimilarPuppies />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderContactUsForm(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <ContactUsForm />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderCareersForm(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <CareersForm position={htmlElement.dataset.position} />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderPetInfoForm(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <PetInfoForm />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderPetBreedInfo(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <SinglePetBreedDetails />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}

function renderMainLoader(htmlElement) {
    const breedDetails = (
        <Provider store={store}>
            <Loader />
        </Provider>
    );
    ReactDOM.render(breedDetails, htmlElement);
}
