import React from "react";
import { Link } from "react-router-dom";
import { PUBLIC_URL } from "../../constant";
const Header = () => {
    return (
        <nav className="navbar navbar-expand-lg sticky-top navbar-light bg-light">
            <div className="container">
                <Link to={`${PUBLIC_URL}`} className="navbar-brand"></Link>
                <div
                    className="collapse navbar-collapse"
                    id="navbarSupportedContent"
                >
                    <ul className="navbar-nav mr-auto">
                        <li className="nav-item active">
                            <Link to={`${PUBLIC_URL}`} className="nav-link">
                                Home
                            </Link>
                        </li>
                        <li className="nav-item active">
                            <Link to={`${PUBLIC_URL}`} className="nav-link">
                                Category
                            </Link>
                        </li>
                        <li className="nav-item">
                            <Link
                                to={`${PUBLIC_URL}login`}
                                className="nav-link"
                            >
                                Login
                            </Link>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    );
};

export default Header;
