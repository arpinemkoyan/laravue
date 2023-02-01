<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Login</h1>
                        <hr/>
                        <form action="#" @submit.prevent="submit" class="row">
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-model="auth.password" name="password" id="password"
                                       class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Sign in
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Don't have an account?
                                    <router-link :to="{name:'Registration'}">Register Now!</router-link>
                                </label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import axios from 'axios'
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'SignIn',

    data() {
        return {
            auth: {
                email: '',
                password: '',
            }
        }
    },
    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user',
        })
    },

    methods: {
        ...mapActions({
            login: 'auth/login'
        }),

        async submit() {
            await this.login(this.auth)
            this.$router.replace({name: 'Index'})
        }
    }
}
</script>
