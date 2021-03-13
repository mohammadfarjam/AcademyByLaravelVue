import Home from './components/Home';
import About from './components/About';
import Navbar from './components/Navbar';


export default {
    mode: 'history',

    routes: [
        {
            path: '/', component: Home,
        },
        {
            path: '/about', component: About,
        },

    ]

}
