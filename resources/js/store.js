// FOR VUE 2.x
import Vue from 'vue';
import Vuex from 'vuex';

Vue.use(Vuex);

export default new Vuex.Store({
    state: {
        items: []
    },
    mutations: {
        ADD_ITEM(state, item) {
            state.items.push(item);
        },
        REMOVE_ITEM(state, id) {
            state.items = state.items.filter(x => x.id !== id);
        },
        GET_ITEMS(state) {
            return state.items;
        }
    },
    getters: {
        totalLength: state => state.items.length
    }
});