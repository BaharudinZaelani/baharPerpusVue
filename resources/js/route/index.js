import Home from "../views/Home";
import About from "../views/About";
import Detail from "../views/Detail";

// dashboard
import Dashboard from "../views/Dashboard";
export default {
    mode: "history",
    routes: [
        {
            path: "/vue",
            name: "home",
            component: Home
        },
        {
            path: "/vue/detail/:param",
            name: "detail",
            component: Detail
        },
        {
            path: "/vue/about",
            name: "About",
            component: About
        },

        // dashboard path
        {
            path: "/vue/dashboard",
            name: "Dashboard",
            component: Dashboard
        }
    ]
};
