<template>
    <div class="col-md-6" v-if="authenticated">
        <a href="/authors">Authors</a>
        <a v-if="user.user.role == 1" href="/books">Books</a>
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
