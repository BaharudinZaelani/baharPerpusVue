<template>
    <div class="container">
        <!-- nav -->
        <nav>
            <div class="nav-item">
                <ul>
                    <li class="red">
                        <a href="/logoutVue">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-compact-right"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"
                                />
                            </svg>
                            <span>Logout</span>
                        </a>
                    </li>

                    <li class="blue">
                        <a href="@">
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                width="16"
                                height="16"
                                fill="currentColor"
                                class="bi bi-chevron-compact-right"
                                viewBox="0 0 16 16"
                            >
                                <path
                                    fill-rule="evenodd"
                                    d="M6.776 1.553a.5.5 0 0 1 .671.223l3 6a.5.5 0 0 1 0 .448l-3 6a.5.5 0 1 1-.894-.448L9.44 8 6.553 2.224a.5.5 0 0 1 .223-.671z"
                                />
                            </svg>
                            <span>Profile Edit</span>
                        </a>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</template>
<style scoped>
.primary {
    background-color: rgb(76, 76, 243);
}
.nav-item {
    /* background-color: rgba(31, 26, 12, 0.486); */
    height: auto;
}
.nav-item ul {
    list-style-type: none;
    display: inline;
}
svg {
    display: inline;
}
.red {
    color: rgb(255, 255, 255);
    background-color: rgb(250, 93, 93) !important;
}
li {
    /* width: 82px; */
    overflow: hidden;
    margin-left: 3px;
    float: left;
    padding: 8px;
    background: rgb(144, 245, 144);
    white-space: nowrap;
}
li svg {
}
li:hover svg {
    transform: rotate(180deg);
    /* transform: scale(1) !important; */
    margin-right: 69px;
}
</style>
