<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Register</h1>
                        <hr/>
                        <form action="#" @submit.prevent="submit" class="row">
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" v-model="auth.name" id="name" placeholder="Enter name"
                                       class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="first_name" class="font-weight-bold">Fist Name</label>
                                <input type="text" name="first_name" v-model="auth.first_name" id="first_name"
                                       placeholder="Enter  Fname" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="last_name" class="font-weight-bold">Last Name</label>
                                <input type="text" name="last_name" v-model="auth.last_name" id="last_name"
                                       placeholder="Enter Lname" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" v-model="auth.email" name="email" id="email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" v-model="auth.password" name="password" id="password"
                                       class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <div class="select">
                                    <select name="role" v-model="auth.role">
                                        <option value="0">Author</option>
                                        <option value="1">Customer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" class="btn btn-primary btn-block">
                                    Sign up
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Don't have an account?
                                    <router-link :to="{name:'Login'}">Login Now!</router-link>
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
import {mapActions, mapGetters} from 'vuex'

export default {
    name: 'Registration',
    data() {
        return {
            auth: {
                name: '',
                first_name: '',
                last_name: '',
                email: '',
                password: '',
                role: ''
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
            signup: 'auth/signup'
        }),

        async submit() {
            await this.signup(this.auth)
            this.$router.replace({name: 'Index'})
        }
    }
}

</script>
