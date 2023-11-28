import {createStore} from "vuex";
import {auth} from "./modules/auth/index.js";

let store = createStore({
    modules: {
        auth,
    }
})

export {
    store
}
