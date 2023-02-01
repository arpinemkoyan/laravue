import Vue from "vue";
import vueRouter from "vue-router";

Vue.use(vueRouter);

import Index from "./components/Index";
import Book from "./components/books/Book";
import CreateBook from "./components/books/CreateBook";
import EditBook from "./components/books/EditBook";
import ShowBook from "./components/books/ShowBook"
import Author from "./components/authors/Author";
import CreateAuthor from "./components/authors/CreateAuthor";
import EditAuthor from "./components/authors/EditAuthor";
import ShowAuthor from "./components/authors/ShowAuthor";
import Login from "./components/users/Login";
import Registration from "./components/users/Registration";

const routes = [
    {
        path: '/',
        component: Index,
        name: 'Index'
    },
    {
        path: '/login',
        component: Login,
        name: 'Login'
    },
    {
        path: '/books',
        component: Book,
        name: 'Book'
    },
    {
        path: '/books/create',
        component: CreateBook,
        name: 'CreateBook'
    },
    {
        path: '/books/:id/edit',
        component: EditBook,
        name: 'EditBook'
    },
    {
        path: '/books/:id',
        component: ShowBook,
        name: 'ShowBook'
    },
    {
        path: '/authors',
        component: Author,
        name: 'Author'
    },
    {
        path: '/authors/create',
        component: CreateAuthor,
        name: 'CreateAuthor'
    },
    {
        path: '/authors/:id/edit',
        component: EditAuthor,
        name: 'EditAuthor'
    },
    {
        path: '/authors/:id',
        component: ShowAuthor,
        name: 'ShowAuthor'
    },
    {
        path: '/signup',
        component: Registration,
        name: 'Registration'
    }

]

export default new vueRouter({
    mode: "history",
    routes
})
