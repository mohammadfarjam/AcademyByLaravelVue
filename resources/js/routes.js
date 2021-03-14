import Home from './components/Home';
import About from './components/About';
import details from './components/Toturial_details';
import Add from "./components/Admin/Toturial/Add";


export default {
    mode: 'history',

    routes: [
        {
            path: '/', component: Home,
        },
        {
            path: '/about', component: About,
        },
        {
            path: '/details', component:details,
        },
        {
            path: '/add', component:Add,
        },

    ]

}
