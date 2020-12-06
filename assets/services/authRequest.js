import axios from 'axios';
import jwtDecode from 'jwt-decode';
import authData from './authData';
import server from './server';

function mh_login(credentials) {
    return axios.post(server.domain() + "/login_check", credentials)
        .then(response => {
            console.log(response);
            response.data.token
        })
        .then(token => {
            authData.setToken(token);
            setAxiosToken(token)
            // console.log("Login success");
            return true;
        }).catch(error => {
            authData.removeToken();
            console.log("Login failled!");
            return false;
        });
}

function mh_isAuthenticated() {
    const token = authData.getToken();
    if (token) {
        const { exp } = jwtDecode(token)
        if (exp * 1000 > new Date().getTime())
            return true;
        return false;
    }
}

function mh_logout() {
    authData.removeToken();
    delete axios.defaults.headers["Authorization"];
}

function setAxiosToken(token) {
    axios.defaults.headers["Authorization"] = "Bearer " + token;
}

function mh_setup() {
    const token = authData.getToken();
    if (token) {
        const { exp } = jwtDecode(token)
        if (exp * 1000 > new Date().getTime())
            setAxiosToken(token)
    }
}

export default {
    mh_login,
    mh_logout,
    mh_setup,
    mh_isAuthenticated
}