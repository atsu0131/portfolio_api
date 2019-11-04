// node_moduleのimport  
import Vue from 'vue';                                                                                                                                       

import VueRouter from 'vue-router';
// vue-routerの使用宣言  
Vue.use(VueRouter);

import axios from 'axios'
import VueAxios from 'vue-axios'
 
Vue.use(VueAxios, axios)



import App from './App.vue'
import Hello from './components/Hello.vue'
import Home from './components/Home.vue'      
// import UsersIndex from './users/UsersIndex.vue'                                                                                               
// require('./bootstrap');                                                                                                                                              
// Window.Vue = require('vue');                                                                                                                                         
                                                                                                                                            
// ルーティングしない場合のコンポーネントの宣言  
Vue.component('example-component', require('./components/ExampleComponent.vue').default);   
// ルーティングするコンポーネントの宣言  
const router = new VueRouter({
  mode: 'history',
  routes: [
      {
          path: '/',
          name: 'home',
          component: Home
      },
      {
          path: '/hello',
          name: 'hello',
          component: Hello,
      }
  ],
});                                                                                                                                                      
// vue-routerインスタンス  
// const router = new VueRouter({  
//   routes,                                                                                                                                                          
//   mode: 'history'                                                                                                                                                  
// });                                                                                                                                                                  
// rootのVueインスタンス  
// const app = new Vue({  
//   el: '#app',                                                                                                                                                      
//   router                                                                                                                                                           
// });        

// const app = new Vue({
//   el: '#app',
//   components: { App },
//   router,
// });

new Vue(Vue.util.extend({
  router
}, App)).$mount('#app');

/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

// require('./bootstrap');

// window.Vue = require('vue');

// /**
//  * The following block of code may be used to automatically register your
//  * Vue components. It will recursively scan this directory for the Vue
//  * components and automatically register them with their "basename".
//  *
//  * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
//  */

// // const files = require.context('./', true, /\.vue$/i);
// // files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

// /**
//  * Next, we will create a fresh Vue application instance and attach it to
//  * the page. Then, you may begin adding components to this application
//  * or customize the JavaScript scaffolding to fit your unique needs.
//  */

// const app = new Vue({
//     el: '#app',
// });
