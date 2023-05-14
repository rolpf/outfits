import './bootstrap';

import Alpine from 'alpinejs';
import focus from '@alpinejs/focus';
import intersect from '@alpinejs/intersect';
import Select2 from "./components/Select2.js";
window.Alpine = Alpine;

Alpine.plugin(focus);
Alpine.plugin(intersect);
Alpine.data("Select2", Select2)

Alpine.start();
