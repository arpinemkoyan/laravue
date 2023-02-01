<template>
    <div>
        <h1>Create A Book</h1>
        <form v-on:submit.prevent="addBook" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Book Name:</label>
                        <input type="text" class="form-control" v-model="form.name" name="name">
                    </div>
                    <div class="form-group">
                        <label class="typo__label" name="authors">Simple select / dropdown</label>
                        <multiselect
                            name="authors"
                            v-model="form.authors"
                            placeholder="Author name?"
                            label="name" track-by="name"
                            :options="authors"
                            :multiple="true"
                            :taggable="true"
                        ></multiselect>
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary">Add Book</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";
import Multiselect from 'vue-multiselect';

export default {
    components: {
        Multiselect
    },
    data() {
        return {
            form: {
                name: '',
                authors: []
            },
            authors: [],
        }
    },
    mounted() {
        this.loadAuthors()
    },
    methods: {
        addBook() {
            axios.post('/api/books', this.form).then((response) => {
                this.$router.push({name: 'Book'})
            })
        },
        loadAuthors() {
            axios.get('/api/authors')
                .then(response => {
                    this.authors = response.data;
                })
        }
    }
}
</script>

<style src="vue-multiselect/dist/vue-multiselect.min.css"></style>


