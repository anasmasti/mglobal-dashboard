
require('./bootstrap');

window.Vue = require('vue');
import Vue from 'vue'
import VueRouter from 'vue-router'
import axios from 'axios';  
import VueAxios from 'vue-axios'
import VueToastr from "vue-toastr";
import VuePaginate from 'vue-paginate'

Vue.use(VueRouter)
Vue.use(VueAxios, axios)
Vue.use(require('vue-moment'));
Vue.use(VueToastr);
Vue.use(VuePaginate)

var filter = function(text, length, clamp){
  clamp = clamp || '...';
  var node = document.createElement('div');
  node.innerHTML = text;
  var content = node.textContent;
  return content.length > length ? content.slice(0, length) + clamp : content;
};

Vue.filter('truncate', filter);

Vue.mixin({
  data: function() {
    return {
      get api_url() {
        return "http://192.168.1.13:2400/api";
      }
    }
  }
})

Vue.component('home-dashboard', require('./components/DashboardHome.vue').default);
Vue.component('domaine-theme', require('./components/macademy/DomaineTheme.vue').default);
Vue.component('formation', require('./components/macademy/Formation.vue').default);
Vue.component('participant', require('./components/macademy/Participant.vue').default);
Vue.component('message', require('./components/macademy/Message.vue').default);
Vue.component('mysys-domaine-theme', require('./components/mysys/MysysDomaineTheme.vue').default);
Vue.component('mysys-formation', require('./components/mysys/MysysFormation.vue').default);
Vue.component('mysys-participant', require('./components/mysys/MysysParticipant.vue').default);
Vue.component('mysys-message', require('./components/mysys/MysysMessage.vue').default);

let routes = [
  { path: '/', component: require('./components/DashboardHome.vue').default },
  { path: '/macademy/domaine-theme', component: require('./components/macademy/DomaineTheme.vue').default },
  { path: '/macademy/formation', component: require('./components/macademy/Formation.vue').default },
  { path: '/macademy/message', component: require('./components/macademy/Message.vue').default },
  { path: '/macademy/participant', component: require('./components/macademy/Participant.vue').default },
  { path: '/mysys/domaine-theme', component: require('./components/mysys/MysysDomaineTheme.vue').default },
  { path: '/mysys/formation', component: require('./components/mysys/MysysFormation.vue').default },
  { path: '/mysys/message', component: require('./components/mysys/MysysMessage.vue').default },
  { path: '/mysys/participant', component: require('./components/mysys/MysysParticipant.vue').default },
]

const router = new VueRouter({
    routes 
  })

const app = new Vue({
    mode: 'history',
    router,
    el: '#app',
});
