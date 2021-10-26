<template>
    <div class="wrp">
        <!-- website Settings -->
        <!-- <div class="conainer">
            <h3>Custom Website</h3>
        </div> -->
        <!-- api -->
        <!-- {{ tempBook }} -->
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

        <!-- add book modal -->
        <div class="fixed">
            <div class="card-modal">
                <div class="modal-title">
                    <h4>Tambah Buku</h4>
                </div>
                <div class="form-group">
                    <div class="form-control">
                        <input
                            v-model="tempBook[0].judul"
                            type="text"
                            class="input-style"
                            placeholder="Judul Buku"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-control">
                        <input
                            v-model="tempBook[0].penulis"
                            type="text"
                            class="input-style"
                            placeholder="Penulis"
                        />
                    </div>
                </div>

                <div class="form-group">
                    <div class="form-control">
                        <input
                            v-model="tempBook[0].penerbit"
                            type="text"
                            class="input-style"
                            placeholder="penerbit"
                        />
                    </div>
                </div>

                <div class="form-group py-3 m-right" @click="submitBook()">
                    <div class="btn">
                        <div class="out"></div>

                        SUBMIT BUKU
                    </div>
                </div>

                <div class="close">
                    <svg
                        xmlns="http://www.w3.org/2000/svg"
                        width="16"
                        height="16"
                        fill="currentColor"
                        class="bi bi-x-lg"
                        viewBox="0 0 16 16"
                    >
                        <path
                            fill-rule="evenodd"
                            d="M13.854 2.146a.5.5 0 0 1 0 .708l-11 11a.5.5 0 0 1-.708-.708l11-11a.5.5 0 0 1 .708 0Z"
                        />
                        <path
                            fill-rule="evenodd"
                            d="M2.146 2.146a.5.5 0 0 0 0 .708l11 11a.5.5 0 0 0 .708-.708l-11-11a.5.5 0 0 0-.708 0Z"
                        />
                    </svg>
                    <div>CLOSE</div>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
const token =
    "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlRoZVphd3ciLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjI3fQ.dM-Oo3uyg4U7oWgOiVLghOVtA1pw5bQQOBnFQP6C6Uk";
const urlBukuApi = "http://127.0.0.1:8000/api/book?token=";
export default {
    name: "home",
    data() {
        return {
            book: {},
            tempBook: [
                {
                    judul: "",
                    penulis: "",
                    penerbit: ""
                }
            ]
        };
    },
    mounted() {
        axios
            .get(urlBukuApi + token)
            .then(res => {
                // console.log(res);
                this.book = res.data.data;
            })
            .catch(function(e) {
                alert(e);
            });
        // modal close
        const fixedModal = document.getElementsByClassName("fixed")[0];
        const close = document.getElementsByClassName("close")[0];
        close.addEventListener("click", function() {
            fixedModal.classList.toggle("modalShow");
            document.getElementsByTagName("body")[0].style.overflow = "";
        });
    },
    methods: {
        addBook() {
            document.getElementsByTagName("body")[0].style.overflow = "hidden";
            const fixedModal = document.getElementsByClassName("fixed")[0];
            fixedModal.classList.toggle("modalShow");
        },
        submitBook() {
            axios
                .post(urlBukuApi + token, {
                    judul: this.tempBook[0].judul,
                    penerbit: this.tempBook[0].penerbit,
                    penulis: this.tempBook[0].penulis
                })
                .then(response => {
                    const fixedModal = document.getElementsByClassName(
                        "fixed"
                    )[0];
                    document.getElementsByTagName("body")[0].style.overflow =
                        "";
                    fixedModal.classList.toggle("modalShow");

                    axios.get(urlBukuApi + token).then(res => {
                        // console.log(res);
                        this.book = res.data.data;
                    });
                })
                .catch(function(e) {
                    alert(e);
                });
        }
    }
};
</script>
<style scoped>
.m-right {
    float: right;
}
/* modal css */
.modalShow {
    height: 100vh !important;
    margin-top: -0vh !important;
}
.fixed {
    background-color: rgba(0, 0, 0, 0.267);
    /* opacity: 0.2; */
    height: 0;
    width: 100vw;
    position: fixed;
    top: 0;
    right: 0;
    left: 0;
    bottom: 0;
    z-index: 99;
    display: grid;
    margin-top: -60vh;
    justify-content: center;
}
.close {
    padding: 5px 12px;
    border-radius: 10px;
    position: absolute;
    right: 14px;
    top: 14px;
    cursor: pointer;
    text-align: center;
}
.close svg {
    display: inline;
    margin-bottom: 2px;
}
.close:hover svg {
    transform: rotate(180deg);
}
.close:hover div {
    /* transform: rotate(180deg); */
    color: rgb(252, 47, 47);
}
.card-modal {
    z-index: 88;
    position: relative;
    border-radius: 8px;
    box-shadow: 0 0 16px rgba(0, 0, 0, 0.247);
    margin: auto;
    height: auto;
    /* transform: scaleX(0); */
    width: 50vw;
    background-color: white;
    padding: 53px 32px;
}
.form-group {
    margin-top: 13px;
}
.form-control input {
    border: 2px solid #00000059;
    padding: 8px;
    width: 50%;
}
.card-modal input {
    width: 70%;
}
input:focus {
    outline: none;
    width: 100%;
}
.modal-title {
    padding: 5px 12px;
    position: absolute;
    left: 19px;
    top: 24px;
}
.modal-title h4 {
    margin: 0 !important;
    padding-left: 0px !important;
}

/* home */
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
    justify-content: space-around;
}
h3 {
    display: inline;
}
.card {
    margin-top: 12px;
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
    .card-modal {
        width: 80vw !important;
    }
    .fixed {
        background-color: #00000059;
    }
}
</style>
