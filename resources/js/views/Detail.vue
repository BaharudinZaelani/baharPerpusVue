<template>
    <div class="col-2">
        <div class="content">
            <h1>{{ data[0].judul_buku }}</h1>
            <div class="img">
                <img :src="data[0].img_url" alt="" />
            </div>
            <div class="detail" v-if="found">
                <hr />
                <span>
                    <p>
                        Welcome To My API Website : this post showing and how i
                        get data from data base only need vue, maybe its no
                        recomended for you, but i'll still show :3. Sorry for my
                        english is so bad ):,,, oke so. dont talk to much.. i'll
                        show how i get this data from API emot batu
                    </p>
                    <p>
                        <b>first:</b> i coded in <i>api.php</i> file, for wich i
                        code from books api,with method name index, for all data
                        showing.
                    </p>
                    <p>
                        <b>url :</b> http://127.0.0.1:8000/api/book?token= | if
                        you want it , its URI path and<a href="/register">
                            register</a
                        >
                        if you need token
                    </p>
                </span>
                <ul>
                    <li>penulis : {{ data[0].penulis }}</li>
                    <li>penerbit : {{ data[0].penerbit }}</li>
                </ul>
            </div>
            <div v-else>
                <p>Not gound</p>
            </div>
        </div>
        <div class="sidebar"></div>
    </div>
</template>
<script>
export default {
    name: "detail",
    data() {
        return {
            data: [],
            found: true
        };
    },
    created() {
        const token =
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlRoZVphd3ciLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjI3fQ.dM-Oo3uyg4U7oWgOiVLghOVtA1pw5bQQOBnFQP6C6Uk";

        const urlBukuApi =
            "http://127.0.0.1:8000/api/book?token=" + token + "&lower=";
        axios
            .get(urlBukuApi + this.$route.params.param)
            .then(res => {
                const datas = res.data;
                this.data = datas;
                if (this.data.length == undefined) {
                    this.found = false;
                }
            })
            .catch(function(e) {
                alert(e);
            });
    }
};
</script>
<style scoped>
.col-2 {
    display: grid;
    grid-gap: 12px;
    grid-template-columns: 3fr 1fr;
}
.img img {
    width: 100%;
}
.img {
    height: 30vh;
    display: grid;
    grid-template-columns: 1fr;
}
.detail {
    /* margin: -12px; */
    border-top-right-radius: 13px;
    height: 30vh;
    position: relative;
    z-index: 28;
    background-color: white !important;
}
@media screen and (max-width: 680px) {
    .img img {
        width: 100%;
        margin-top: -0vh !important;
    }
    .img {
        height: 20vh !important;
    }

    .col-2 {
        display: grid;
        grid-gap: 12px;
        grid-template-columns: 1fr;
    }
}
</style>
