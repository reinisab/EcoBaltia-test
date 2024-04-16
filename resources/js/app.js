import './bootstrap';
import 'bootstrap';
import '@popperjs/core';

import router from "./router";
import { createApp } from "vue";

import App from "./App.vue";


createApp(App).use(router).mount("#app");