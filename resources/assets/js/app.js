
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example', require('./components/Example.vue'));
Vue.component('bing-map', require('./components/BingMap.vue'));
Vue.component('coordinate-composer', require('./components/CoordinateComposer.vue'));

const app = new Vue({
    el: '#app',
    data: function() {
        return {
            bingMapApiKey: 'AutpW7XvvMYgzgHiBr1bkKSdcj40UTxf4cAYiy5H8-sHADHVHgypR_GJnGDZoo5N',
            deviceId: "1"
        }
    }
});
