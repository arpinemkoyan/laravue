<template>
<!--    <Layout/>-->
    <div>
        <h1>Update Book</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'Book' }" class="btn btn-success">Return to Books</router-link>
            </div>
        </div>

        <form v-on:submit.prevent="updateBook">
            <div class="form-group">
                <label>Book Name</label>
                <input type="text" class="form-control" v-model="book.name" value="book.name">
            </div>
            <div class="form-group">
                <button class="btn btn-primary">Update</button>
            </div>
        </form>
    </div>
</template>

<script>

import axios from "axios";
import Layout from "../Layout";

export default {
    components: {Layout},
    data() {
        return {
            book: {}
        }
    },

    created: function () {
        this.getBook();
    },

    mounted() {
        this.getBook();
    },
    methods: {
        getBook() {
            axios.get(`/api/books/${this.$route.params.id}/edit`)
                .then((response) => {
                    this.book = response.data;
                });
        },

        updateBook() {
            axios.put(`/books/${this.$route.params.id}`,this.book)
                .then((res) => {
                    // console.log(response);
                    // console.log(this.book.id)

                    this.$router.push({name: 'Book'});
                });
        }
    }
}
</script>
