import React from 'react';

const Field = ({ name, label, value, className = "", onChange, type = "text", error = "", required = false }) => {
    let block = false;
    className += className.includes("d-block") && (block = true) ? " d-block " : "d-inline";
    if (type == "textarea")
        return (
            <div className={"form-group " + className.includes("d-inline") ? "d-inline" : ""}>
                <label className={" " + className} htmlFor="exampleTextarea">{label}</label>
                <textarea className="form-control " id={label} placeholder={label} rows="3"></textarea>
            </div>
        );
    else
        return (
            <div className={"" + block ? "form-group mb-2 d-block " : "form-group mb-2 d-inline"}>
                <label className={"" + block ? "d-block " : " "} htmlFor={name}>{label}</label>
                <input className={" " + className} type={type} value={value} onChange={onChange} name={name} id={name} placeholder={(label != "") && (label + "...")} required={required} />
                {(error != "") && <p className="invalid-feedback">{error}</p>}
            </div>
        )
};

export default Field;