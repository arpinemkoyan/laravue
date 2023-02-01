<template>
<!--    <Layout/>-->
    <div>
        <h1>Show Book</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'Book' }" class="btn btn-success">Return to Book</router-link>
            </div>
        </div>

        <div>
            <div >
                <label>Book Name</label>
                <input type="text" class="form-control" v-model="book.name" readonly>
                <label>Author/s name</label>
                <input v-for="author in authors" type="text" :value="author.name" class="form-control" readonly/>
            </div>

        </div>
    </div>
</template>

<script>

import axios from "axios";
import Index from "../Index";
import Layout from "../Layout";

export default {
    components: {Layout, Index},
    data() {
        return {
            book: {},
            authors:[]
        }
    },

    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get(`/api/books/${this.$route.params.id}`)
                .then((response) => {
                    this.book = response.data.book;
                    this.authors=response.data.authors
                    console.log(response.data)
                });
        },

    }
}
</script>
