/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
    // Define changes to default configuration here. For example:
    // config.language = 'fr';
    // config.uiColor = '#AADC6E';
        
  /*      
    config.toolbar = 'ppm';

    config.toolbar_ppm = [
    {
        name: 'basicstyles', 
        items : [ 'Bold', 'Italic','Underline', '-','RemoveFormat']
    },
{
        name: 'clipboard', 
        items : [ 'Cut','Copy','Paste','PasteText','PasteFromWord','-','Undo','Redo' ]
    },
{
        name: 'paragraph', 
        items : [ 'NumberedList','BulletedList','-','JustifyLeft','JustifyCenter','JustifyRight' ]
    },
    //{ name: 'styles', items : [ 'Styles','Format','Font','FontSize','TextColor' ] },
    '/',
    {
        name: 'insert', 
        items : [ 'Image','Flash','Link','Unlink','Anchor','-','Iframe' ]
    },
{
        name: 'links', 
        items : [ 'Link','Unlink','Anchor' ]
    },
{
        name: 'tools', 
        items : [ 'SpellChecker', 'Smiley' ]
    },
{
        name: 'document', 
        items : ['Source']
    }        
    ];*/
        
        
   config.filebrowserBrowseUrl = 'kcfinder-master/browse.php?opener=ckeditor&type=files';
   config.filebrowserImageBrowseUrl = 'kcfinder-master/browse.php?opener=ckeditor&type=images';
   config.filebrowserFlashBrowseUrl = 'kcfinder-master/browse.php?opener=ckeditor&type=flash';
   config.filebrowserUploadUrl = 'kcfinder-master/upload.php?opener=ckeditor&type=files';
   config.filebrowserImageUploadUrl = 'kcfinder-master/upload.php?opener=ckeditor&type=images';
   config.filebrowserFlashUploadUrl = 'kcfinder-master/upload.php?opener=ckeditor&type=flash';
	
};

