import {SET_USER} from "./mutations.js";
import {INIT} from "./actions.js";
import authApi from '../../../api/auth.js'

let auth = {
    namespaced: true,
    state() {
        return {
            user: null,
            initialized: false
        }
    },
    getters: {
        getUserName(state) {
            return state.user?.name;
        },
        getUser(state) {
            return state.user;
        },
        isAuthenticated(state) {
            return state.user !== null;
        },
        isInitialized(state) {
            return state.initialized;
        }
    },
    mutations: {
        [SET_USER](state, user) {
            state.user = user;
        }
    },
    actions: {
        [INIT]({commit, state}) {
            return new Promise((resolve, reject) => {
                authApi.getCurrentUser().then(({errors, user}) => {
                    if (!errors) {
                        commit(SET_USER, user);
                        resolve(user);
                        state.initialized = true;
                    }
                }).catch(() => {
                    reject();
                })
            });

        }
    }
}

export {
    auth
}
