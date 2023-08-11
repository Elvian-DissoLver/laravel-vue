require('./bootstrap');
// import Vue from 'vue';
import Vue, {createApp} from 'vue'
// import * as Vue from 'vue'
import Example from './components/Example.vue';
import axios from 'axios';

// new Vue({
//     el: '#app',
//     components: {
//         ExampleComponent,
//     },
// });
// axios.defaults.baseURL = 'http://localhost:8080';
// axios.create({
//     headers: {
//         // Authorization: localStorage.getItem('token') != 'null' ? 'Bearer ' + localStorage.getItem('token'):'',
//         'Content-Type': 'application/json'
//     }
// });

createApp({
    components: {
        Example
    }
}).mount('#app')
