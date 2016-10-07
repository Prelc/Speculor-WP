// config
require.config( {
	paths: {
		jquery:     'assets/js/fix.jquery',
		util:       'bower_components/bootstrap/js/umd/util',
		alert:      'bower_components/bootstrap/js/umd/alert',
		button:     'bower_components/bootstrap/js/umd/button',
		carousel:   'bower_components/bootstrap/js/umd/carousel',
		collapse:   'bower_components/bootstrap/js/umd/collapse',
		dropdown:   'bower_components/bootstrap/js/umd/dropdown',
		modal:      'bower_components/bootstrap/js/umd/modal',
		scrollspy:  'bower_components/bootstrap/js/umd/scrollspy',
		tab:        'bower_components/bootstrap/js/umd/tab',
		tooltip:    'bower_components/bootstrap/js/umd/tooltip',
		popover:    'bower_components/bootstrap/js/umd/popover',
	},
} );

require.config( {
	baseUrl: SpeculorVars.pathToTheme
} );

require( [
	'jquery',
	'util',
	'collapse',
	'dropdown',
], function ( $, _ ) {
	'use strict';

} );
