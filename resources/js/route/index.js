import Home from "../views/Home";
import About from "../views/About";
export default {
    mode: "history",
    routes: [
        {
            path: "/vue",
            name: "home",
            component: Home
        },
        {
            path: "/vue/about",
            name: "About",
            component: About
        }
    ]
};
