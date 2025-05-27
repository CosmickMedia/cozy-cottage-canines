import React, { Component } from 'react';
import { connect } from 'react-redux';

import Checkbox from '../Checkbox';

class BreedFilter extends Component {

    constructor(props) {
        super(props);
        this.filterButton = React.createRef();
    }

    render() {
        const { name, theme_url, id, multi, pluralName } = this.props;

        const selectedOptionName = this.isChecked('all') ? pluralName : this.getMainNameFromSelectedOptions();

        return (
            <div className={'filters__actions'}>
                <label htmlFor={`filter_${id}_btn`}>{name}</label>
                <button id={`filter_${id}_btn`}
                        className={'btn btn--dropdown'}
                        type={'button'}
                        data-target={`#filter_${id}`}
                        aria-expanded="false"
                        aria-controls="filters"
                        ref={this.filterButton}
                        data-toggle="collapse">{selectedOptionName}<i className="fa fa-angle-down"></i>
                </button>

                <div id={`filter_${id}`}
                     className={'collapse collapse--dropdown filters'}
                     data-parent="#filter_bar">
                    <div className="filters__box">
                        <div className="filters__list">
                            {
                                multi ? this.allOption() : null
                            }
                            {this.optionsList()}
                        </div>
                    </div>
                    <div className={'filters__apply'}>
                        <button className={'btn btn-primary btn-block'} onClick={() => this.triggerFilterClick()}>
                            <img src={`${theme_url}/styles/assets/images/shared/next-arrow.svg`} />apply filters
                        </button>
                    </div>

                </div>
            </div>
        );
    }

    triggerFilterClick() {
        this.filterButton.current.click();
    }

    getMainNameFromSelectedOptions() {
        const { options, value, id } = this.props;
        const selectedValues = Object.keys(value).filter(valueKey => value[valueKey]);

        return options
            .filter(option => selectedValues.indexOf(`${option.value}`) !== -1)
            .map(option => option.name)
            .reduce((acc, current) => `${current} ${acc}`, '')
            .substr(0, 10);
    }

    allOption() {
        const {id, pluralName} = this.props;

        return <div className={'filters__item custom-checkbox'} key={`${id}-option-all`}>
            <Checkbox name={`${id}-option-all`}
                      checked={this.isChecked('all')}
                      id={`${id}-option-all`}
                      onChange={(event) =>  this.handleChange(event, 'all')}/>
            <label htmlFor={`${id}-option-all`}>{pluralName}</label>
        </div>
    }

    optionsList() {
        const {options, id} = this.props;
        return options
            .map(option => (
                <div className={'filters__item custom-checkbox'} key={`${id}-option-${option.value}`}>
                    <Checkbox name={`${id}-option-${option.value}`}
                              checked={this.isChecked(option.value)}
                              onChange={(event) => this.handleChange(event, option.value)}
                              id={`${id}-option-${option.value}`}
                    />
                    <label htmlFor={`${id}-option-${option.value}`}>{option.name}</label>
                </div>
            ))
    }

    handleChange(event, optionValue) {
        const {id, value, onChange, multi} = this.props;

        if (multi) {
            if (optionValue !== 'all') {
                const tempValue = {...value, [optionValue]: event.target.checked};
                let newValue;
                if (this.checkIfOtherThanAllIsChecked(tempValue)) {
                    newValue = {...tempValue, ['all']: false};
                } else {
                    newValue = {...tempValue, ['all']: true};
                }

                onChange(newValue);
            } else {
                onChange({['all']: true});
            }
        } else {
            onChange({[optionValue]: true});
        }
    }

    checkIfOtherThanAllIsChecked(value) {
        const {id} = this.props;

        return Object.keys(value)
            .filter(key => key !== `${id}-all`)
            .some(key => value[key]);
    }

    isChecked(optionValue) {
        const {value} = this.props;
        return value[optionValue] ? value[optionValue] : false;
    }

}

const mapStateToProps = state => {
    const { petlandOptions } = state.petlandOptions;

    return {
        theme_url: petlandOptions.theme_url
    };
};

export default connect(mapStateToProps)(BreedFilter);