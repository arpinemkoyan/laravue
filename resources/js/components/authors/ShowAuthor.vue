<template>
    <div>
        <h1>Show Author</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'Author' }" class="btn btn-success">Return to Authors</router-link>
            </div>
        </div>

        <div>
            <div class="">
                <label>Author Nickname</label>
                <input type="text" class="form-control" v-model="author.name" readonly>
                <label>Author Fisrt Name</label>
                <input type="text" class="form-control" v-model="author.first_name" readonly>
                <label>Author Last Name</label>
                <input type="text" class="form-control" v-model="author.last_name" readonly>
                <label>Book/s Name</label>
                <input type="text" class="form-control" v-for="book in books" v-model="book.name" readonly>
            </div>
        </div>
    </div>
</template>

<script>

import axios from "axios";

export default {
    data() {
        return {
            author: {},
            books :[]
        }
    },

    mounted() {
        this.getData();
    },
    methods: {
        getData() {
            axios.get(`/api/authors/${this.$route.params.id}`)
                .then((response) => {
                    this.author = response.data.author;
                    this.books = response.data.books;
                });
        },

    }
}
</script>
