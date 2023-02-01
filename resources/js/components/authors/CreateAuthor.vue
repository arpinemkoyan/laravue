<template>
    <div>
        <h1>Create An Author</h1>
        <form v-on:submit.prevent="addAuthor" method="post">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label>Author Nickname:</label>
                        <input type="text" class="form-control" v-model="author.name" name="name">
                        <label>Author First Name:</label>
                        <input type="text" class="form-control" v-model="author.first_name" name="first_name">
                        <label>Author Last Name:</label>
                        <input type="text" class="form-control" v-model="author.last_name" name="last_name">
                    </div>
                </div>
            </div>
            <br/>
            <div class="form-group">
                <button class="btn btn-primary">Add Author</button>
            </div>
        </form>
    </div>
</template>

<script>
import axios from "axios";

export default {
    data() {
        return {
            author: {
                name: '',
                first_name: '',
                last_name: ''
            }
        }
    },
    methods: {
        addAuthor() {
            axios.post('/api/authors', this.author).then((response) => {
                this.$router.push({name: 'Author'})
            })
        }
    }
}
</script>


