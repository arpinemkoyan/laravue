import axios from 'axios'

export default {
    namespaced: true,

    state: {
        authenticated: false,
        user: null
    },

    getters: {
        authenticated(state) {
            return state.authenticated
        },

        user(state) {
            return state.user
        },
    },

    mutations: {
        SET_AUTHENTICATED(state, value) {
            state.authenticated = value
        },

        SET_USER(state, value) {
            state.user = value
        }
    },

    actions: {
        async login({commit}, credentials) {
            await axios.get('/sanctum/csrf-cookie')
            return axios.post('/api/login', credentials).then((response) => {
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            }).catch(() => {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            })
        },

        async signup({commit}, credentials) {
            await axios.get('/sanctum/csrf-cookie')
            return axios.post('/api/signup', credentials).then((response) => {
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            }).catch(() => {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            })
        },

        async logout({commit}) {
            await axios.get('/sanctum/csrf-cookie')
            return axios.post('/api/logout').then((response) => {
                commit('SET_AUTHENTICATED', false)
                commit('SET_USER', null)
            }).catch(() => {
                commit('SET_AUTHENTICATED', true)
                commit('SET_USER', response.data)
            })
        }
    }
}

