/*
Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
  	/*示例
	config.toolbar_Full =
	[
		['Source','-','Save','NewPage','Preview','-','Templates'],
		['Cut','Copy','Paste','PasteText','PasteFromWord','-','Print', 'SpellChecker', 'Scayt'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Form', 'Checkbox', 'Radio', 'TextField', 'Textarea', 'Select', 'Button', 'ImageButton', 'HiddenField'],
		'/',
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['NumberedList','BulletedList','-','Outdent','Indent','Blockquote'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink','Anchor'],
		['Image','Flash','Table','HorizontalRule','Smiley','SpecialChar','PageBreak'],
		'/',
		['Styles','Format','Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks','-','About']
	];
	*/
	
    config.toolbar_MyToolbar =  
    [  
        ['SelectAll', 'RemoveFormat','Image','Flash','-','Bold', 'Italic', 'Underline'],  
        ['JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock'],  
        ['Font', 'FontSize'],  
        ['TextColor', 'BGColor', 'Source']
    ]; 
	config.toolbar_MyContent =
	[
		['Source','Cut','Copy','Paste','PasteText','PasteFromWord'],
		['Undo','Redo','-','Find','Replace','-','SelectAll','RemoveFormat'],
		['Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Link','Unlink'],
		['Image','Flash','Table','HorizontalRule','SpecialChar','PageBreak'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks'],
		['Styles','Format','Font','FontSize']
	];
	config.toolbar_Summary =
	[
		['Source','Bold','Italic','Underline','Strike','-','Subscript','Superscript'],
		['JustifyLeft','JustifyCenter','JustifyRight','JustifyBlock'],
		['Image','Flash','Table','HorizontalRule'],
		['Font','FontSize'],
		['TextColor','BGColor'],
		['Maximize', 'ShowBlocks']
	];
	
	
};
