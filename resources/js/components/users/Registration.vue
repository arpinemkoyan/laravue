<!--<template>-->
<!--    <main class="signup-form">-->
<!--        <div class="cotainer">-->
<!--            <div class="row justify-content-center">-->
<!--                <div class="col-md-4">-->
<!--                    <div class="card">-->
<!--                        <h3 class="card-header text-center">Register User</h3>-->
<!--                        <div class="card-body">-->
<!--                            <form v-on:submit.prevent="register" method="get">-->
<!--                                &lt;!&ndash;                                @csrf&ndash;&gt;-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="text" placeholder="username" id="name" class="form-control" name="name"-->
<!--                                           required autofocus v-model="form.name">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="text" placeholder="First name" id="fist_name" class="form-control"-->
<!--                                           name="first_name"-->
<!--                                           required autofocus v-model="form.first_name">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="text" placeholder="Last name" id="last_name" class="form-control"-->
<!--                                           name="last_name"-->
<!--                                           required autofocus v-model="form.last_name">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="text" placeholder="Email" id="email_address" class="form-control"-->
<!--                                           name="email" required autofocus v-model="form.email">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="password" placeholder="Password" id="password" class="form-control"-->
<!--                                           name="password" required v-model="form.password">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <input type="password" placeholder="Password"-->
<!--                                           id="password-confirmation" class="form-control"-->
<!--                                           name="password_confirmation" required v-model="form.password_confirmation">-->
<!--                                </div>-->
<!--                                <div class="form-group mb-3">-->
<!--                                    <div class="select">-->
<!--                                        <select name="role" v-model="form.role">-->
<!--                                            <option value="0">Author</option>-->
<!--                                            <option value="1">Cutomer</option>-->
<!--                                        </select>-->
<!--                                    </div>-->
<!--                                </div>-->
<!--                                <div class="d-grid mx-auto">-->
<!--                                    <button type="submit" class="btn btn-dark btn-block">Sign up</button>-->
<!--                                </div>-->
<!--                            </form>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--            </div>-->
<!--        </div>-->
<!--    </main>-->
<!--</template>-->

<!--<script>-->
<!--import axios from "axios";-->

<!--export default {-->
<!--    name: "Registration",-->
<!--    data() {-->
<!--        return {-->
<!--            form: {-->
<!--                name: null,-->
<!--                first_name: null,-->
<!--                last_name: null,-->
<!--                email: null,-->
<!--                role: null,-->
<!--                password: null,-->
<!--                password_confirmation: null-->
<!--            }-->
<!--        }-->
<!--    },-->
<!--    methods: {-->
<!--        register() {-->
<!--            axios.get('/sanctum/csrf-cookie')-->
<!--                .then(res => {-->
<!--                    axios.post('/register', this.form)-->
<!--                }).then(res => {-->
<!--                // console.log(this.role == 0)-->
<!--                this.$router.push({name: 'Login'})-->
<!--                // this.role == 0 ? this.$router.push({name: 'Author'}) : this.$router.push({name: '/Index'})-->
<!--            }).catch(rej => {-->
<!--                console.log(this.role ==0)-->
<!--                }-->
<!--            )-->
<!--        }-->

<!--    }-->
<!--}-->
<!--</script>-->

<!--<style scoped>-->

<!--</style>-->


<template>
    <div class="container h-100">
        <div class="row h-100 align-items-center">
            <div class="col-12 col-md-6 offset-md-3">
                <div class="card shadow sm">
                    <div class="card-body">
                        <h1 class="text-center">Register</h1>
                        <hr/>
                        <form action="javascript:void(0)" @submit="register" class="row" method="post">
                            <div class="form-group col-12">
                                <label for="name" class="font-weight-bold">Name</label>
                                <input type="text" name="name" v-model="user.name" id="name" placeholder="Enter name" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="first_name" class="font-weight-bold">FName</label>
                                <input type="text" name="first_name" v-model="user.first_name" id="first_name" placeholder="Enter  Fname" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="last_name" class="font-weight-bold">LName</label>
                                <input type="text" name="last_name" v-model="user.last_name" id="last_name" placeholder="Enter Lname" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="email" class="font-weight-bold">Email</label>
                                <input type="text" name="email" v-model="user.email" id="email" placeholder="Enter Email" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password" class="font-weight-bold">Password</label>
                                <input type="password" name="password" v-model="user.password" id="password" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="form-group col-12">
                                <label for="password_confirmation" class="font-weight-bold">Confirm Password</label>
                                <input type="password_confirmation" name="password_confirmation" v-model="user.password_confirmation" id="password_confirmation" placeholder="Enter Password" class="form-control">
                            </div>
                            <div class="col-12 mb-2">
                                <button type="submit" :disabled="processing" class="btn btn-primary btn-block">
                                    {{ processing ? "Please wait" : "Register" }}
                                </button>
                            </div>
                            <div class="col-12 text-center">
                                <label>Already have an account? <router-link :to="{name:'login'}">Login Now!</router-link></label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapActions } from 'vuex'
export default {
    name:'register',
    data(){
        return {
            user:{
                name:"",
                first_name: "",
                last_name: "",
                email:"",
                password:"",
                password_confirmation:""
            },
            processing:false
        }
    },
    methods:{
        ...mapActions({
            signIn:'auth/login'
        }),
        async register(){
            this.processing = true
            await axios.post('/register',this.user).then(response=>{
                this.signIn()
            }).catch(({response:{data}})=>{
                alert(data.message)
            }).finally(()=>{
                this.processing = false
            })
        }
    }
}
</script>
