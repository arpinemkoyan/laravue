<template>
    <div>
        <nav class="main-header navbar navbar-expand navbar-white navbar-light" style="margin-left: 0px">
            <!-- Left navbar link -->
            <!--            <router-link to="/">Home</router-link>-->
            <!-- Right navbar links -->
            <ul class="navbar-nav ml-auto">
                <li class="nav-item d-none d-sm-inline-block" v-if="!authenticated">
                    <router-link to="/login">Sign in</router-link>
                </li>
                <li class="nav-item d-none d-sm-inline-block" v-else>
                    <router-link to="#">user.name</router-link>
                    <a href="#" @click.prevent="logout">Sign out</a>
                </li>
            </ul>
        </nav>

        <router-view></router-view>
    </div>

</template>

<script>
import { mapGetters, mapActions } from 'vuex'

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

        async logout () {
            await this.logoutAction()

            this.$router.replace({ name: 'Login' })
        }
    }
}
</script>
