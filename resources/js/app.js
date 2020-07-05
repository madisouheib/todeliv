import Vue from 'vue'


window.axios = require('axios');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



Vue.component('reception-table', require('./components/TableReception.vue').default);
Vue.component('users-table', require('./components/users/UsersTable.vue').default);
Vue.component('wilaya-table', require('./components/hub/wilaya/WilayaData.vue').default);
Vue.component('hub-table', require('./components/hub/HubData.vue').default);
Vue.component('profiles-table', require('./components/profiles/ProfilesTable.vue').default);
Vue.component('permission-table', require('./components/profiles/PermissionTable.vue').default);
Vue.component('addcom-table', require('./components/commandes/AddCommandes.vue').default);
Vue.component('colis-table', require('./components/colis/ListColis.vue').default);
Vue.component('coms-table', require('./components/commandes/ListComs.vue').default);
Vue.component('coms-archive', require('./components/commandes/ArchiveComs.vue').default);
Vue.component('manif-table', require('./components/reception/ListManif.vue').default);

Vue.component('manif-archive', require('./components/reception/ArchiveManif.vue').default);

Vue.component('pagination', require('laravel-vue-pagination'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

 const core = new Vue({
    el: '#core'
});
