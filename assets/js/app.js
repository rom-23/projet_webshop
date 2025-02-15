/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */
import Vue from "vue";
import Home from './components/Home.vue';
Vue.config.productionTip = false;
require('./jquery');

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.css');

new Vue({
    el: '#app',
    components: {Home}});
