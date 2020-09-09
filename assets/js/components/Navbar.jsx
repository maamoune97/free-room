import React from 'react';
import { Link } from 'react-router-dom';

const Navbar = (props) => {
    return (<nav className="navbar navbar-expand-lg navbar-light bg-light">
        <a className="navbar-brand" href="#">Free Room</a>
        <button className="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarColor03" aria-controls="navbarColor03" aria-expanded="false" aria-label="Toggle navigation">
            <span className="navbar-toggler-icon"></span>
        </button>

        <div className="collapse navbar-collapse" id="navbarColor03">
            <ul className="navbar-nav mr-auto">
                <li className="nav-item active">
                    <Link to="/" className="nav-link" >Acceuil</Link>
                </li>
                <li className="nav-item">
                    <Link to="/rooms" className="nav-link">Chambres</Link>
                </li>
                <li className="nav-item">
                    <a className="nav-link" href="#">Propritaires</a>
                </li>
            </ul>
            <ul className="navbar-nav mm-auto">
                <li className="nav-item">
                    <a className="nav-link" href="#">Inscription</a>
                </li>
                <li className="nav-item">
                    <a className="btn btn-success" href="#">Connecion</a>
                </li>
                {/* <li className="nav-item">
                    <a className="btn btn-danger" href="#">Déconexion</a>
                </li> */}
            </ul>
            
        </div>
    </nav>);
}

export default Navbar;