import Dashboard from "./components/Dashboard/Dashboard";
import UsersIndex from "./components/Admin/Users/Index";
import Add from "./components/Admin/Tutorial/Add";
import Index from "./components/Admin/Tutorial/Index";
import Edit from "./components/Admin/Tutorial/Edit";



export default {
    mode: 'history',
    base: '/adm/',
    routes: [
        {
            path: '/dashboard', component: Dashboard,
        },
        {
            path: '/users-index', component: UsersIndex,
        },
        {
            path: '/add_tutorial', component: Add,
        },
        {
            path: '/index_tutorial', component: Index,name:'index_tutorial'
        },
        {
            path: '/edit_tutorial', component: Edit,name:'edit_tutorial',props:true
        },

    ]

}
