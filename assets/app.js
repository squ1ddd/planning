/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you import will output into a single css file (app.css in this case)
import { createApp } from 'vue';
import timetable from './js/Timetable.vue';
import './styles/app.css';

createApp(timetable).mount('#timetable-vue');