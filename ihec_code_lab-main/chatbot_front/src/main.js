import Vue from 'vue'
import './plugins/axios'
import App from './App.vue'
import router from './router'
import store from './store/StoreView'
import "bootstrap/dist/css/bootstrap.min.css";
import 'aos/dist/aos.css';
import vuetify from './plugins/vuetify'
import { createPinia, PiniaVuePlugin } from 'pinia'
Vue.use(PiniaVuePlugin)

import Echo from "laravel-echo";
window.Pusher = require("pusher-js");
window.Echo = new Echo({
  broadcaster: "pusher",
  key:"local",
  wsHost:"127.0.0.1",
  wsPort: 6001,
  cluster: "mt1",
  forceTLS: false,
  disableStats: true,
});

Vue.config.productionTip = false
const pinia = createPinia()
new Vue({
  router,
  store,
  vuetify,
  pinia,
  render: h => h(App)
}).$mount('#app')
