import Vue from "vue";
import vueRouter from "vue-router";
import store from './store';

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
        name: 'Index',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/login',
        component: Login,
        name: 'Login',
        meta: {
            middleware: "guest"
        },
    },
    {
        path: '/books',
        component: Book,
        name: 'Book',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/books/create',
        component: CreateBook,
        name: 'CreateBook',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/books/:id/edit',
        component: EditBook,
        name: 'EditBook',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/books/:id',
        component: ShowBook,
        name: 'ShowBook',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/authors',
        component: Author,
        name: 'Author',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/authors/create',
        component: CreateAuthor,
        name: 'CreateAuthor',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/authors/:id/edit',
        component: EditAuthor,
        name: 'EditAuthor',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/authors/:id',
        component: ShowAuthor,
        name: 'ShowAuthor',
        meta: {
            middleware: "auth"
        },
    },
    {
        path: '/signup',
        component: Registration,
        name: 'Registration',
        meta: {
            middleware: "guest"
        },
    }

]

const router = new vueRouter({
    mode: "history",
    routes,
})

router.beforeEach((to, from, next) => {
    document.title = to.meta.title
    if (to.meta.middleware == "guest") {
        if (store.state.auth.authenticated) {
            next({name: "Index"})
        }
        next()
    } else {
        if (store.state.auth.authenticated) {
            next()
        } else {
            next({name: "Login"})
        }
    }
})

export default router
