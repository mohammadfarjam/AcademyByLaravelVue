import Home from './components/Home';
import About from './components/About';
import details from './components/Toturial_details';
import Checkout from "./components/Checkout";



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
            path: '/details/:slug', component:details,name:'details',props:true
        },
        {
            path: '/checkout', component: Checkout,props:true
        },

    ]

}
