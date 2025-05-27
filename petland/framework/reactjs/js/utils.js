export const getFromLocalStorage = (key) => {

    return localStorage.getItem(key) !== 'undefined' ? JSON.parse(localStorage.getItem(key)) : null;
};

export const saveInLocalStorage = (key,data) => {
    localStorage.setItem(key, JSON.stringify(data));
};