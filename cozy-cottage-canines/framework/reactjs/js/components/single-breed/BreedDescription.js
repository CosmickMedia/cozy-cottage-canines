import React, {Component} from 'react';
import { connect } from 'react-redux';

class BreedDescription extends Component {

    render() {
        const {breed} = this.props;

        return (
            <div>
                <h6>Description:</h6>

                <p>{breed.description}</p>

                <h6>History</h6>

                <p>{breed.origin}</p>

                <h6>Color</h6>

                <p>{breed.colorDescription}</p>
            </div>
        );
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url,
        breed: state.singleBreed.k9_breed
    };
};

export default connect(mapStateToProps)(BreedDescription);