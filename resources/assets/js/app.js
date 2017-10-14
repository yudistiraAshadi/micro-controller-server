
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
window.BaiduMap = require('vue-baidu-map');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('location-input', require('./components/map/LocationInput.vue'));
Vue.component('baidu-map-wrapper', require('./components/map/BaiduMapWrapper.vue'));
Vue.component('device-switch', require('./components/map/DeviceSwitch.vue'));
Vue.component('device-location-admin', require('./components/map/DeviceLocationAdmin.vue'));

Vue.use(BaiduMap.default, {
    ak: 'jVcNItiSs2FTaO7To7CGrDURQEzTGhQm'
})

const app = new Vue({
    el: '#app'
});