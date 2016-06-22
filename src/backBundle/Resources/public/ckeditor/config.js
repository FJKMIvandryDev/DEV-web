/**
 * @license Copyright (c) 2003-2015, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.md or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {

        config.extraPlugins = 'oembed';
        
	config.filebrowserBrowseUrl = '../../../../bundles/back/kcfinder/browse.php?opener=ckeditor&type=files';
	config.filebrowserImageBrowseUrl = '../../../../bundles/back/kcfinder/browse.php?opener=ckeditor&type=images';
	config.filebrowserFlashBrowseUrl = '../../../../bundles/back/kcfinder/browse.php?opener=ckeditor&type=flash';
	config.filebrowserUploadUrl = '../../../../bundles/back/kcfinder/upload.php?opener=ckeditor&type=files';
	config.filebrowserImageUploadUrl = '../../../../../bundles/back/kcfinder/upload.php?opener=ckeditor&type=images';
	config.filebrowserFlashUploadUrl = '../../../../bundles/back/kcfinder/upload.php?opener=ckeditor&type=flash';

	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
};
