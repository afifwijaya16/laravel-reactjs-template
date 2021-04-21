import React from "react";
import { Container, Navbar } from "react-bootstrap";
const Footer = () => {
    return (
        <Navbar bg="light" fixed="bottom">
            <Container className="d-flex justify-content-center">
                <p className="text-center">
                    Copyright &copy;
                    <script>
                        document.write(new Date().getFullYear());
                    </script>{" "}
                    All rights reserved | This template is made with
                    <i className="fa fa-heart-o" aria-hidden="true"></i> by Afif
                    Wijaya
                </p>
            </Container>
        </Navbar>
    );
};

export default Footer;
