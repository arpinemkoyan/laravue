<template>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px">
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block" v-if="!authenticated">
                    <router-link to="/login">Sign in</router-link>
                </li>
                <li class="nav-item d-none d-sm-inline-block" v-else>
                    <span>{{ user.user.name }}</span>
                    <a href="#" @click.prevent="logout">Sign out</a>
                </li>
            </ul>
        </nav>

        <router-view></router-view>
    </div>

</template>

<script>
import {mapGetters, mapActions} from 'vuex'

export default {
    name: "Layout",

    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user',
        })
    },

    methods: {
        ...mapActions({
            logoutAction: 'auth/logout'
        }),

        async logout() {
            await this.logoutAction()
            this.$router.replace({name: 'Login'})
        }
    }
}
</script>

<style scoped>
@import url("https://fonts.googleapis.com/css2?family=Montserrat&display=swap");
a{
    margin: 40px;
}
</style>
