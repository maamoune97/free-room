import React from 'react';
import ReactDOM from 'react-dom'
import { HashRouter, Switch, Route } from 'react-router-dom'

import 'jquery'
import 'popper.js'
import 'bootstrap/dist/js/bootstrap.min.js'

// any CSS you import will output into a single css file (app.css in this case)
import '../css/bootstrap_litera.min.css';
import '../css/app.css';
import Navbar from './components/Navbar';
import HomePage from './pages/HomePage';
import RoomsPage from './pages/RoomsPage';
import ShowRoomPage from './pages/ShowRoomPage';

// Need jQuery? Install it with "yarn add jquery", then uncomment to import it.
// import $ from 'jquery';

const App = () => {
    return (<HashRouter>
        <Navbar />
        <main className="container mt-5">
            <Switch>
                <Route path="/room/:id" component={ShowRoomPage} />
                <Route path="/rooms" component={RoomsPage} />
                <Route path="/" component={HomePage} />
            </Switch>
        </main>
    </HashRouter>
    );
}

ReactDOM.render(<App />, document.getElementById('root'))
