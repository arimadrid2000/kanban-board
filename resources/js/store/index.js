import Vue from 'vue';
import Vuex from 'vuex';

import AuthStore from './modules/auth'
import PanelStore from './modules/panels'

Vue.use(Vuex);

const store = new Vuex.Store({
    modules: {
        auth: AuthStore,
        panel: PanelStore
    }
});

Vue.prototype.$store = store;

export default store;