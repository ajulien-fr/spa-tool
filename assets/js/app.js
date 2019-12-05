/*
 * Welcome to your app's main JavaScript file!
 *
 * We recommend including the built version of this JavaScript file
 * (and its CSS file) in your base layout (base.html.twig).
 */

// any CSS you require will output into a single css file (app.css in this case)
require('../css/app.scss');
require('@fortawesome/fontawesome-free/css/all.min.css');

// Need jQuery? Install it with "yarn add jquery", then uncomment to require it.
const $ = require('jquery');
global.$ = global.jQuery = $;

require('bootstrap');
require('bootstrap-table');
require('bootstrap-table-locale-all');
require('bootstrap-table-filter-control');
require('tableexport.jquery.plugin');
require('bootstrap-table-export');
require('bootstrap-table-sticky-header');
require('jquery-resizable-columns');
require('bootstrap-table-resizable');

$(document).ready(function() {
	$('#animal-table').bootstrapTable('refreshOptions', {
		exportOptions: { ignoreColumn: [7] },
	});

	$('#action-table').bootstrapTable('refreshOptions', {
		exportOptions: { ignoreColumn: [8] },
	});

	$('#contributeur-table').bootstrapTable('refreshOptions', {
		exportOptions: { ignoreColumn: [9] },
	});
});

$(document).ready(function() {
	var c = false;
	var a = false;

	$('#new-contributeur').click(function() {
		c = !c;

		$('#edit-contributeur').toggleClass('d-none');
		$('#edit-contributeur').find('label').not('.not-required').toggleClass('required');
		$('#edit-contributeur').find('input').not('.not-required').prop('required', c);
	});

	$('#new-animal').click(function() {
		a = !a;

		$('#edit-animal').toggleClass('d-none');
		$('#edit-animal').find('label').not('.not-required').toggleClass('required');
		$('#edit-animal').find('input').not('.not-required').prop('required', a);
		$('#edit-animal').find('select').not('.not-required').prop('required', a);
	});
});