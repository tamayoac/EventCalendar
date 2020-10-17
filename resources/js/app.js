require('./bootstrap');

import $ from  'jquery';
window.$ = window.jQuery = $;

import 'jquery-ui/ui/widgets/datepicker.js';

window.moment = require('moment');
window.toastr = require('toastr');
