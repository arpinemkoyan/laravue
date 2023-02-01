<template>
<!--    <Layout/>-->
    <div>
        <h1>Books</h1>

        <div class="row">
            <div class="col-md-10"></div>
            <div class="col-md-2">
                <router-link :to="{ name: 'CreateBook' }" class="btn btn-primary">Create Book</router-link>
            </div>
        </div>

        <input type="text" v-model="search" placeholder="Search book..."/>

        <br/>

        <table class="table table-hover">
            <thead>
            <tr>
                <th @click="sort('id')">ID</th>
                <th @click="sort('name')">Book Name</th>
                <th>Actions</th>
            </tr>
            </thead>

            <tbody>
            <tr v-for="book in sortedBooks">
                <td>{{ book.id }}</td>
                <td>{{ book.name }}</td>
                <td>
                    <router-link :to="{name: 'EditBook', params: { id: book.id}}" class="btn btn-primary">Edit
                    </router-link>
                </td>
                <td>
                    <router-link :to="{name: 'ShowBook', params: { id: book.id}}" class="btn btn-primary">Show
                    </router-link>
                </td>
                <td>
                    <button class="btn btn-danger" v-on:click="deleteBook(book.id)">Delete</button>
                </td>
            </tr>
            </tbody>
        </table>
        <p>
            <button @click="prevPage">Previous</button>
            <button @click="nextPage">Next</button>
        </p>
    </div>
</template>


<script>
import axios from 'axios';
import Layout from "../Layout";

export default {
    components: {Layout},
    data() {
        return {
            books: [],
            currentSort: 'name',
            currentSortDir: 'asc',
            pageSize: 3,
            currentPage: 1,
            search: ''
        }
    },

    mounted() {
        this.loadBooks();
    },

    methods: {
        loadBooks() {
            axios.get('api/books')
                .then(response => {
                    this.books = response.data;
                })
        },

        deleteBook(id) {
            axios.delete(`api/books/${id}`)
                .then(res => {
                    this.books = res.data;
                })
        },

        sort: function (s) {
            //if s == current sort, reverse
            if (s === this.currentSort) {
                this.currentSortDir = this.currentSortDir === 'asc' ? 'desc' : 'asc';
            }
            this.currentSort = s;
        },

        nextPage: function () {
            if ((this.currentPage * this.pageSize) < this.books.length) this.currentPage++;
        },

        prevPage: function () {
            if (this.currentPage > 1) this.currentPage--;
        }
    },
    computed: {
        sortedBooks() {
            return this.books
                .sort((a, b) => {
                    let modifier = 1;
                    if (this.currentSortDir === 'desc') modifier = -1;
                    if (a[this.currentSort] < b[this.currentSort]) return -1 * modifier;
                    if (a[this.currentSort] > b[this.currentSort]) return 1 * modifier;
                    return 0;
                }).filter((row, index) => {
                    let start = (this.currentPage - 1) * this.pageSize;
                    let end = this.currentPage * this.pageSize;
                    if (index >= start && index < end) return true;
                }).filter((book) => {
                    return book.name.toLowerCase().includes(this.search.toLowerCase())
                });
        }
    }

}

</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");

* {
    padding: 0;
    margin: 0;
    box-sizing: border-box;
    font-family: "Montserrat", sans-serif;
}

body {
    padding: 20px;
    min-height: 100vh;
    background-color: rgb(234, 242, 255);
}

input {
    display: block;
    width: 350px;
    margin: 20px auto;
    padding: 10px 45px;
    /*background: white url("assets/search-icon.svg") no-repeat 15px center;*/
    background-size: 15px 15px;
    font-size: 16px;
    border: none;
    border-radius: 5px;
    box-shadow: rgba(50, 50, 93, 0.25) 0px 2px 5px -1px,
    rgba(0, 0, 0, 0.3) 0px 1px 3px -1px;
}

.item {
    width: 350px;
    margin: 0 auto 10px auto;
    padding: 10px 20px;
    color: white;
    border-radius: 5px;
    box-shadow: rgba(0, 0, 0, 0.1) 0px 1px 3px 0px,
    rgba(0, 0, 0, 0.06) 0px 1px 2px 0px;
}

.fruit {
    background-color: rgb(97, 62, 252);
    cursor: pointer;
}

.error {
    background-color: tomato;
}
</style>
