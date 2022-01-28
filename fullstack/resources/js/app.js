require('./bootstrap');

import { createApp } from 'vue'
import mainapp from  './components/mainapp'

createApp({
    components:{
        mainapp,
    }
}).mount('#app');

// windows.Vue = require('vue')

// Vue.component('mainapp',require('./components/mainapp.vue').default)

// const app = new Vue({
//     el: "#app"
// });