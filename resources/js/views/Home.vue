<template>
    <div class="wrp">
        <!-- website Settings -->
        <!-- <div class="conainer">
            <h3>Custom Website</h3>
        </div> -->
        <!-- api -->
        <div class="container">
            <!-- <h3>API -----</h3> -->
            <div class="py-3">
                <div class="btn" @click="addBook()">
                    <div class="out"></div>
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-plus-square"
                        viewBox="0 0 16 16"
                    >
                        <path
                            d="M14 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H2a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1h12zM2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2z"
                        />
                        <path
                            d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"
                        />
                    </svg>
                    <span>ADD BUKU</span>
                </div>
            </div>
            <hr />
            <div class="col-4">
                <router-link
                    :to="'/vue/detail/' + item.lower"
                    class="card"
                    v-for="item in book"
                    :key="item.id"
                >
                    <div class="card-img">
                        <img
                            src="https://wallpaperaccess.com/full/1330900.jpg"
                            :alt="item.title"
                        />
                    </div>
                    <div class="card-body">
                        <h4>{{ item.judul_buku }}</h4>
                    </div>
                </router-link>
            </div>
        </div>
    </div>
</template>
<script>
export default {
    name: "home",
    data() {
        return {
            book: {}
        };
    },
    mounted() {
        const token =
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlRoZVphd3ciLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjI3fQ.dM-Oo3uyg4U7oWgOiVLghOVtA1pw5bQQOBnFQP6C6Uk";

        const urlBukuApi = "http://127.0.0.1:8000/api/book?token=";
        axios
            .get(urlBukuApi + token)
            .then(res => {
                console.log(res);
                this.book = res.data.data;
            })
            .catch(function(e) {
                alert(e);
            });
    },
    methods: {
        addBook() {
            alert("add");
        }
    }
};
</script>
<style scoped>
.btn {
    padding: 8px 19px;
    border-radius: 50px;
    border: 1px solid black;
    display: inline;
    cursor: pointer;
    position: relative;
}
.out {
    transition: 0.4s;
    position: absolute;
    /* padding: 5px; */
    background-color: blueviolet;
    top: 0;
    opacity: 0.4;
    height: 100%;
    width: 30%;
    border-radius: 50px;
    /* margin: auto; */
}
.btn:hover .out {
    width: 100%;
}
.btn:hover svg {
    transform: rotate(180deg);
}
.btn svg {
    display: inline;
    position: absolute;
    left: 10px;
    height: 100%;
    bottom: 0;
}
.btn span {
    margin-left: 14px;
}
.py-3 {
    padding: 1.3rem 0;
}
.col-4 {
    display: grid;
    grid-template-columns: repeat(auto-fill, 180px);
    grid-gap: 22px;
}
h3 {
    display: inline;
}
.card {
    position: relative;
    height: 290px;
    background-color: white;
    width: 100%;
    border: 1px solid rgba(19, 7, 7, 0.158);
    overflow: hidden;
}
.card:hover {
    box-shadow: 0 0 8px rgba(0, 0, 0, 0.267);
}
.card:hover .card-img {
    padding: 0px;
}
.card-img {
    height: 180px;
    padding: 12px;
}
.card-img img {
    width: 100%;
    height: auto;
}
.card-body {
    text-transform: uppercase;
    position: absolute;
    right: 0;
    left: 0;
    border: 2px solid rgba(0, 0, 0, 0.089);
    /* border-radius: 13px; */
    height: 40%;
    padding: 5px;
    bottom: 0;
    background: white;
    z-index: 1;
}
h4 {
    padding-left: 12px;
}
@media only screen and (max-width: 600px) {
    .col-4 {
        grid-template-columns: 1fr !important;
    }
}
</style>
