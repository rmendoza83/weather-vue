import "./bootstrap";

import { createApp } from "vue";

import BootstrapVue3 from 'bootstrap-vue-3'

import Multiselect from 'vue-multiselect';
import WeatherComponent from './components/WeatherComponent.vue';

const app = createApp({});

app.component('Multiselect', Multiselect);
app.use(BootstrapVue3);

app.component('WeatherComponent', WeatherComponent);

app.mount('#app');
