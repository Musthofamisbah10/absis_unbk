/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	// Define changes to default configuration here.
	// For complete reference see:
	// http://docs.ckeditor.com/#!/api/CKEDITOR.config

	// The toolbar groups arrangement, optimized for two toolbar rows.
	config.toolbarGroups = [
		{ name: 'clipboard',   groups: [ 'clipboard', 'undo' ] },
		{ name: 'editing',     groups: [ 'find', 'selection', 'spellchecker' ] },
		{ name: 'links' },
		{ name: 'insert' },
		{ name: 'forms' },
		{ name: 'tools' },
		{ name: 'document',	   groups: [ 'mode', 'document', 'doctools' ] },
		{ name: 'others' },
		'/',
		{ name: 'basicstyles', groups: [ 'basicstyles', 'cleanup' ] },
		{ name: 'paragraph',   groups: [ 'list', 'indent', 'blocks', 'align', 'bidi' ] },
		{ name: 'styles' },
		{ name: 'colors' },
		{ name: 'about' },
		'/',
		{ name: 'font' },
		{ name: 'mathjax' },
	];

	// Remove some buttons provided by the standard plugins, which are
	// not needed in the Standard(s) toolbar.
	//config.removeButtons = 'Underline,Subscript,Superscript';

	// Set the most common block elements.
	config.format_tags = 'p;h1;h2;h3;pre';

	// Simplify the dialog windows.
	config.removeDialogTabs = 'image:advanced;link:advanced';

	config.filebrowserBrowseUrl = '/ckeditor/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '/ckeditor/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '/ckeditor/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '/ckeditor/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '/ckeditor/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '/ckeditor/kcfinder/upload.php?opener=ckeditor&type=flash';

	config.extraPlugins = 'richcombo';
	config.extraPlugins = 'font';
	config.extraPlugins = 'mathjax';
	config.mathJaxLib = 'http:\/\/dev.absis.co.id\/mathjax\/MathJax.js';

	config.specialChars = config.specialChars.concat( [ ['&quot;','Quote'], [ '&rsquo;', 'Double quote' ],['&larr;', 'Left Arrow Bar'], [ '&uarr;', 'Upper Arrow Bar' ],  [ '&darr;', 'Down Arrow Bar' ] ,['&lArr;','Left double Arrow' ],['&uArr;','Up double Arrow' ] ,['&dArr;','Down double Arrow' ],[ '&cong;', 'Congruent to' ],['&radic;','Square Root' ],['&alpha;','Alpha'],['&gamma;','Gamma'],['&delta;','Delta'],['&le;','less than or equal to'],['&ge;','greater than or equal to'] ] );



};
