<template>
<!--    <Layout/>-->
    <div>
        <h1>Update Author</h1>
        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'Author' }" class="btn btn-success">Return to Authors</router-link>
            </div>
        </div>

        <form v-on:submit.prevent="updateAuthor">
            <div class="form-group">
                <label>Author Nickname</label>
                <input type="text" class="form-control" v-model="author.name" value="author.name">
                <label>Author First Name</label>
                <input type="text" class="form-control" v-model="author.first_name" value="author.first_name">
                <label>Author Last Name</label>
                <input type="text" class="form-control" v-model="author.last_name" value="author.last_name">
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
            author: {}
        }
    },

    created: function () {
        this.getAuthor();
    },

    mounted() {
        this.getAuthor();
    },
    methods: {
        getAuthor() {
            axios.get(`/api/authors/${this.$route.params.id}/edit`)
                .then((response) => {
                    this.author = response.data;
                });
        },

        updateAuthor() {
            axios.put(`/api/authors/${this.$route.params.id}`,this.author)
                .then((res) => {
                    this.$router.push({name: 'Author'});
                });
        }
    }
}
</script>
