import './bootstrap';
import 'bootstrap/dist/css/bootstrap.min.css';
import 'bootstrap/dist/js/bootstrap.bundle.min.js';



import { createApp } from 'vue';  // Импортируем функцию createApp из библиотеки Vue для создания нового Vue-приложения
import Index from './template/index.vue';  // Импортируем компонент Index, который находится в файле index.vue

createApp(Index).mount('#app');  // Создаем приложение Vue на основе компонента Index и монтируем его на элемент с id="app"
