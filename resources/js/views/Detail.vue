<template>
    <div>
        <div class="detail" v-if="found">
            <h1>{{ data[0].judul_buku }}</h1>
            <hr />
            <ul>
                <li>penulis : {{ data[0].penulis }}</li>
                <li>penerbit : {{ data[0].penerbit }}</li>
            </ul>
        </div>
        <div v-else>
            <p>Not gound</p>
        </div>
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
            "eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJ1c2VybmFtZSI6IlRoZVphd3ciLCJyb2xlIjoidXNlciIsImV4cGlyZWQiOjI2fQ.5ijP1iEFW2B6mNIrnu_RWER6NoSOSmeHVaBN-AiTV5o";
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
