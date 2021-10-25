<template>
    <nav class="navbar">
        <div class="logo">
            <router-link to="/vue">
                <h1>{{ title }}</h1>
            </router-link>
        </div>
        <div class="nav-link">
            <div class="nav-item">
                <a id="showNav">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-chevron-double-right"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M3.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L9.293 8 3.646 2.354a.5.5 0 0 1 0-.708z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M7.646 1.646a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 0 .708l-6 6a.5.5 0 0 1-.708-.708L13.293 8 7.646 2.354a.5.5 0 0 1 0-.708z"
                        />
                    </svg>
                </a>
                <router-link to="/vue/about">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-exclamation-circle"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"
                        />
                        <path
                            d="M7.002 11a1 1 0 1 1 2 0 1 1 0 0 1-2 0zM7.1 4.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 4.995z"
                        />
                    </svg>
                    About
                </router-link>
                <a href="/login" class="i">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-box-arrow-in-right"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M6 3.5a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v9a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-2a.5.5 0 0 0-1 0v2A1.5 1.5 0 0 0 6.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-9A1.5 1.5 0 0 0 14.5 2h-8A1.5 1.5 0 0 0 5 3.5v2a.5.5 0 0 0 1 0v-2z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M11.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 1 0-.708.708L10.293 7.5H1.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"
                        />
                    </svg>
                    Login
                </a>
                <a href="/register">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-person-plus"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M6 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6zm2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0zm4 8c0 1-1 1-1 1H1s-1 0-1-1 1-4 6-4 6 3 6 4zm-1-.004c-.001-.246-.154-.986-.832-1.664C9.516 10.68 8.289 10 6 10c-2.29 0-3.516.68-4.168 1.332-.678.678-.83 1.418-.832 1.664h10z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M13.5 5a.5.5 0 0 1 .5.5V7h1.5a.5.5 0 0 1 0 1H14v1.5a.5.5 0 0 1-1 0V8h-1.5a.5.5 0 0 1 0-1H13V5.5a.5.5 0 0 1 .5-.5z"
                        />
                    </svg>
                    register
                </a>
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    props: {
        title: {
            type: String,
            default: "Baharudin Zaelani"
        }
    },
    mounted() {
        const nav = document.getElementById("showNav");
        const item = document.getElementsByClassName("nav-item")[0];
        nav.addEventListener("click", function() {
            item.classList.toggle("show");
        });
    }
};
</script>
<style scoped>
.i {
    border-left: 2px solid grey;
    padding-left: 12px;
}
svg {
    opacity: 0;
    position: absolute;
}
.navbar {
    padding: 5px 33px;
    box-shadow: 0 0 5px 0 rgba(0, 0, 0, 0.39);
    margin-bottom: 14px;
    display: grid;
    grid-template-columns: 1fr auto;
}
nav .logo h1 {
    font-size: 1.3rem;
    text-transform: uppercase;
}
.nav-link .nav-item {
    height: 100%;
}
.nav-item a {
    position: relative;
    text-transform: uppercase;
    line-height: 60px;
    margin-left: 12px;
}
.nav-item a:hover {
    color: rgba(243, 61, 61, 0.945);
}
.show {
    right: -0vw !important;
}
@media only screen and (max-width: 600px) {
    .i {
        padding-left: 0;
        border-left: none !important;
    }
    .navbar {
        display: block;
    }
    .nav-link {
        width: 100vw;
        overflow: auto;
        white-space: nowrap;
    }
    .nav-link .nav-item {
        z-index: 99;
        right: -87vw;
        width: 100vw;
    }
    .nav-item {
        position: fixed;
        right: 0;
        height: auto !important;
        padding: 6px;
        background-color: white;
        box-shadow: 0 0 6px #5858586e;
    }
    .nav-item a {
        margin-left: 42px;
    }
    svg {
        opacity: 1;
        position: absolute;
        left: 0;
        top: 2.5px;
        margin-left: -22px;
    }
}
</style>
