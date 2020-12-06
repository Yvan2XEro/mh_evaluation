import jwtDecode from 'jwt-decode';

const getToken = () => {
    const token = window.localStorage.getItem("AuthToken");
    if (token)
        return token;
}

const setToken = (token) => {
    window.localStorage.setItem("AuthToken", token)
}

const getUser = () => {
    if (getToken())
        return jwtDecode(getToken());
    return null;
}

const removeToken = () => {
    window.localStorage.removeItem("AuthToken");
}

export default {
    getUser,
    getToken,
    setToken,
    removeToken
}