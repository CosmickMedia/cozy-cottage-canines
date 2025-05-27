import {saveInLocalStorage} from '../utils';
import {FETCH_FINANCING_CONTENT} from './types';

export const fetchFinancingContent = () => (dispatch) => {
    fetch(`${wp_petland_reactjs.rest_url}/financing-content`)
        .then(response => response.json())
        .then(content => {

            const financingBlock = $(content.html).find('.finance__content');

            saveInLocalStorage('financing_content', {
                html: financingBlock.html()
            });

            dispatch({
                type: FETCH_FINANCING_CONTENT,
                payload: {
                    html: financingBlock.html()
                }
            });
        })
};
