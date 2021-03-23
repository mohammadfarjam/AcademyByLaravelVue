import Dashboard from "./components/Dashboard/Dashboard";
import UsersIndex from "./components/Admin/Users/Index";



export default {
    mode: 'history',
    base: '/adm/',
    routes: [
        //admin
        {
            path: '/dashboard', component: Dashboard,
        },
        {
            path: '/users-index', component: UsersIndex,
        },

    ]

}
