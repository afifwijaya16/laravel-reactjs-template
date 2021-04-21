import React from "react";
import { BrowserRouter as Router, Switch, Route } from "react-router-dom";
import { PUBLIC_URL } from "../constant";
// layout
import Header from "./layout/Header";
// pages
import Home from "./pages/Home";
import Login from "./pages/Auth/Login";

const Layout = ({ children }) => {
    return (
        <>
            <Header />
            {children}
        </>
    );
};

const App = () => {
    return (
        <>
            <Router>
                <Switch>
                    <Route
                        path={`${PUBLIC_URL}login`}
                        exact={true}
                        component={Login}
                    />

                    <Route path={`${PUBLIC_URL}`} exact={true}>
                        <Layout>
                            <Home />
                        </Layout>
                    </Route>
                </Switch>
            </Router>
        </>
    );
};

export default App;
