import React, { useContext, useState } from 'react';
//import logo from '../logo.png';
import { NavLink, Link } from 'react-router-dom';
import authContext from '../contexts/authContext';
import authRequest from '../services/authRequest';
import { toast } from 'react-toastify';


const MHLogin = ({ history }) => {


    const [credentials, setCredentials] = useState({
        username: "",
        password: ""
    })

    const [loginStatus, setLoginStatus] = useState();
    const { setIsAuthenticated, isAuthenticated } = useContext(authContext);

    if (isAuthenticated) {
        toast.success("You are already loged!!");
        history.push("/patients")
    }
    const [error, setError] = useState("")

    const handleChange = ({ currentTarget }) => {
        const { name, value } = currentTarget;
        setCredentials({ ...credentials, [name]: value });
    }

    const handleSubmit = async (event) => {
        event.preventDefault();
        authRequest.mh_login(credentials).then(response => setLoginStatus(response));
        if (loginStatus == true) {
            setIsAuthenticated(true);
            setError("");
            console.log("Loginsuccess");
            toast.success("You are loged in now!");
            history.push("/patients");
        }
        else {
            setIsAuthenticated(false);
            toast.error("Login failed, please check your credentials!!");
            credentials.password = "";
            setError("Invalid credentials!");
        }
    }

    return (
        <form className="form-signin" onSubmit={handleSubmit}>

            {/* <img className="mb-4 col-sm center" src={logo} alt="IMG" width="72" height="72"/> */}
            <h1 className="h3 mb-3 font-weight-normal">Connectez-vous svp !</h1>
            <label htmlFor="inputEmail" className="sr-only">Address Email</label>
            <input type="email" id="inputEmail" className="form-control" onChange={handleChange} placeholder="Email address" required autoFocus />
            <br />
            <label htmlFor="inputPassword" className="sr-only">Mot de passe </label>
            <input type="password" id="inputPassword" className="form-control" onChange={handleChange} placeholder="Entrez Votre mo de passe " required />
            <div className="checkbox mb-3">
                <label>
                    <NavLink to="/password">Mot de Passe oublié?</NavLink>
                </label>
                <label>
                    <input type="checkbox" value="remember-me" /> Se souvenir de moi
                </label>
            </div>
            <button className="btn btn-lg btn-primary btn-block" type="submit">Se Connecter</button>
            <p>Vous n'avez pas de compte ? <a href="/register">S'enregistrer</a></p>
        </form>
    )
}

export default MHLogin;
