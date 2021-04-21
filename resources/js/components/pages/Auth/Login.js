import React from "react";
import "./Login.css";
const Login = () => {
    return (
        <>
            <div>
                <form action="" className="form-signin">
                    <h1 className="h3 mb-3 font-weight-normal">
                        Please sign in
                    </h1>
                    <label for="inputEmail" className="sr-only">
                        Email address
                    </label>
                    <input
                        type="email"
                        id="inputEmail"
                        className="form-control"
                        placeholder="Email address"
                        required
                        autofocus
                    />
                    <label for="inputPassword" className="sr-only">
                        Password
                    </label>
                    <input
                        type="password"
                        id="inputPassword"
                        className="form-control"
                        placeholder="Password"
                        required
                    />
                </form>
            </div>
        </>
    );
};

export default Login;
