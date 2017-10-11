
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
Vue.component('bing-map', require('./components/BingMap.vue'));
Vue.component('location-input', require('./components/LocationInput.vue'));
Vue.component('baidu-map-wrapper', require('./components/BaiduMapWrapper.vue'));
Vue.component('device-switch', require('./components/DeviceSwitch.vue'));

Vue.use(BaiduMap.default, {
    ak: 'jVcNItiSs2FTaO7To7CGrDURQEzTGhQm'
})

const app = new Vue({
    el: '#app',
    data () {
        return {
            deviceId: 1,
            bingMapApiKey: 'AutpW7XvvMYgzgHiBr1bkKSdcj40UTxf4cAYiy5H8-sHADHVHgypR_GJnGDZoo5N'
        }
    },
    methods: {
        switchDevice (data) {
            this.deviceId = data.newDeviceId;
        }
    }
});