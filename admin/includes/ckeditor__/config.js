/*
Copyright (c) 2003-2011, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
	enterMode : CKEDITOR.ENTER_BR,
	extraPlugins : 'uicolor',
		toolbar : [ [ '-','OrderedList','UnorderedList','-','Link','Unlink','-' ,'About' ], [ 'UIColor' ] ]
};
