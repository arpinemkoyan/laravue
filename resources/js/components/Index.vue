<template>
    <div class="col-md-6" v-if="authenticated">
        <router-link :to="{name:'Author'}"> Authors</router-link>
        <router-link v-if="user.user.role == 1" :to="{name:'Book'}">Books</router-link>
    </div>

</template>

<script>

import {mapGetters} from "vuex";

export default {
    name: 'Index',

    computed: {
        ...mapGetters({
            authenticated: 'auth/authenticated',
            user: 'auth/user',
        })
    },

}
</script>
