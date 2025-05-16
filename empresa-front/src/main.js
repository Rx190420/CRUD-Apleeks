import './assets/main.css'

import { createApp } from 'vue'
import { createPinia } from 'pinia'

import App from './App.vue'
import router from './router'

import 'bootstrap/dist/css/bootstrap.css'
import '@fortawesome/fontawesome-free/css/all.min.css';


import 'bootstrap/dist/js/bootstrap'
const app = createApp(App)

app.use(createPinia())
app.use(router)

app.mount('#app')
