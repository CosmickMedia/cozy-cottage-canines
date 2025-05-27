import React, {Component} from 'react';
import { connect } from 'react-redux';
import {fetchFinancingContent} from '../../actions/financingContentActions';

class FinancingContent extends Component {


    componentWillMount() {
        this.props.fetchFinancingContent();
    }

    render() {
        const {content} = this.props;
        return (
            <div dangerouslySetInnerHTML={this.createMarkup(content.html)} />
        );
    }

    createMarkup(html) {
        return {__html: html};
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        petland_options: petlandOptions,
        content: state.financing.financing_content
    }
};

export default connect(mapStateToProps, {fetchFinancingContent})(FinancingContent);