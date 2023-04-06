import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import Select2 from "./components/Select2.js";
window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.data("Select2", Select2)

Alpine.start();
