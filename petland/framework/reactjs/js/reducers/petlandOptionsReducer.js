const initialState = {
    petlandOptions: wp_petland_reactjs,
};

const petlandOptionsReducer = (state = initialState, action) => {
    const {type, payload} = action;

    switch (type) {
        default:
            return state;
    }
};

export default petlandOptionsReducer;