import React, { useState } from 'react';
import ReactDOM from "react-dom";
import { HashRouter, Route, Switch, withRouter } from 'react-router-dom';
import { toast, ToastContainer } from 'react-toastify';
import './bootstrap';
import MHMenu from './Components/MHMenu';
import authContext from './contexts/authContext';
import MHEvals from './Pages/MHEvals';
import MHHome from './Pages/MHHome';
import MHLogin from './Pages/MHLogin';
import authRequest from './services/authRequest';
import './styles/app.css';
import MHRegister from './Pages/MHRegister';

const App = () => {
    const [isAuthenticated, setIsAuthenticated] = useState(authRequest.mh_isAuthenticated());

    const contextValue = {
        isAuthenticated,
        setIsAuthenticated
    }

    const MHMenuWithRouter = withRouter(MHMenu);
    return (
        <authContext.Provider value={contextValue}>
            <HashRouter>
                <MHMenuWithRouter />
                <main className="container pt-5">
                    <Switch>
                        <Route path="/evaluations" component={MHEvals} />
                        <Route path="/login" component={MHLogin} />
                        <Route path="/notes" component={MHLogin} />
                        <Route path="/students/new" component={MHRegister} />
                        <Route path="/" component={MHHome} />
                    </Switch>
                </main>
            </HashRouter>
            <ToastContainer position={toast.POSITION.BOTTOM_LEFT} />
        </authContext.Provider>

    );
}

const rootElement = document.querySelector("#app");
ReactDOM.render(<App />, rootElement);