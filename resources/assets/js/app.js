

require('./bootstrap');

window.Vue = require('vue');

window.Slug = require('slug');
Slug.defaults.mode = 'rfc3986';

import Buefy from 'buefy';

Vue.use(Buefy);

require('./manage.js');
Vue.component('slugWidget', require('./components/slugWidget.vue'));