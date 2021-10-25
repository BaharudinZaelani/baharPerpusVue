<template>
    <div class="wrp">
        <!-- website Settings -->
        <div class="conainer">
            <h3>Custom Website</h3>
        </div>
        <!-- api -->
        <div class="container">
            <h3>API -----</h3>
            <div class="col-4">
                <router-link
                    to="/about"
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
        const urlBukuApi = "http://127.0.0.1:8000/api/book?token=";
        const token =
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlRoZVphd3ciLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjI2fQ.5ijP1iEFW2B6mNIrnu_RWER6NoSOSmeHVaBN-AiTV5o";
        // const bukuApi = [];
        axios
            .get(urlBukuApi + token)
            .then(res => {
                this.book = res.data.data;
                console.log(res.data.data);
            })
            .catch(function(e) {
                alert(e);
            });
    }
};
</script>
<style scoped>
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
