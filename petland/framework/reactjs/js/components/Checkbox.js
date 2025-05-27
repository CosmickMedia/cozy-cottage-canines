import React from 'react';

const Checkbox = ({ name, onChange, id, type = 'checkbox', checked = false }) => (
    <input type={type}
           name={name}
           id={id}
           checked={checked}
           onChange={onChange} />
);

export default Checkbox;