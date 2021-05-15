import Vue from 'vue';


window.axios = require('axios');
import moment from 'moment';
require('moment/locale/fr');
/*
window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest'; 
window.axios.defaults.baseURL = 'http://todeliver.co/mydemo/';
Vue.http.options.root = 'http://todeliver.co/mydemo/';

*/

import VueQrcodeReader from "vue-qrcode-reader";

Vue.use(VueQrcodeReader);
moment.locale('fr');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))
import VueBarcodeScanner from 'vue-barcode-scanner';

// inject barcode scanner with option (add sound effect)
// sound will trigger when it's already scanned
let options = {
    sound: true, // default is false
    //soundSrc: '/static/sound.wav', // default is blank
    //sensitivity: 300, // default is 100

    //callbackAfterTimeout: true // default is false
  }
  
  Vue.use(VueBarcodeScanner, options)


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


Vue.component('inhouse-table', require('./components/inhouse/ListInHouse.vue').default);

Vue.component('manif-archive', require('./components/reception/ArchiveManif.vue').default);
Vue.component('manif-detail', require('./components/reception/AddRecp.vue').default);

Vue.component('froute-list', require('./components/froute/FicheList.vue').default);
Vue.component('froute-colis', require('./components/froute/ListColisFiche.vue').default);
Vue.component('delivery-list', require('./components/delivery/Delevery.vue').default);

Vue.component('delivred-liste', require('./components/delivred/DelivredList.vue').default);
                                                               
Vue.component('delivery-colislist', require('./components/delivery/DetailDelevery.vue').default);

Vue.component('undelivred-list', require('./components/undelivred/ListUndelivred.vue').default);
Vue.component('tracking-detail', require('./components/tracking/Tracking.vue').default);
Vue.component('tracking-search', require('./components/tracking/TrackingSearch.vue').default);
Vue.component('tracking-client', require('./components/tracking/TrackingClient.vue').default);


Vue.component('transit-send', require('./components/transit/TransitSend.vue').default);
Vue.component('transit-receive', require('./components/transit/TransitReceive.vue').default);

Vue.component('transdetail-send', require('./components/transit/TransitDetailSend.vue').default);
Vue.component('transdetail-receive', require('./components/transit/TransitDetailReceive.vue').default);



//clients space : 


Vue.component('client-recp', require('./components/client/RecpUser.vue').default);
Vue.component('client-enliv', require('./components/client/EnLivraisonUser.vue').default);
Vue.component('client-livre', require('./components/client/LivreUser.vue').default);
Vue.component('client-retour', require('./components/client/RetourUser.vue').default);
Vue.component('client-failed', require('./components/client/FailedUser.vue').default);


Vue.component('compta-accounting', require('./components/accounting/TabAccountig.vue').default);
Vue.component('compta-facturation', require('./components/accounting/TabFacturation.vue').default);
Vue.component('compta-facturation-detail', require('./components/accounting/TabFacturationDetail.vue').default);


Vue.component('nav-admin', require('./components/AdminNavbar.vue').default);
Vue.component('nav-client', require('./components/UserNavbar.vue').default);
Vue.component('nav-cord', require('./components/CordinateurNav.vue').default);
Vue.component('nav-livreur', require('./components/DeliverNav.vue').default);


Vue.component('stats-client', require('./components/stats/StatsUserHome.vue').default);
Vue.component('stats-admin', require('./components/stats/StatsAdminHome.vue').default);

Vue.component('retour', require('./components/retour/ListRetour.vue').default);



//livreaur list 
Vue.component('livreur-colis', require('./components/deliver/DetailDelevery.vue').default);





Vue.component('pagination', require('laravel-vue-pagination'));



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const core = new Vue({
    el: '#core'
});

const nav = new Vue({
    el: '#nav'
});
