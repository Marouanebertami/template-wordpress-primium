jQuery(document).ready(function($){

	var mediaUploader;

	$( '#upload-header-button' ).on('click',function(e){
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Header Picture',
			button:{
				text: 'Choose Picture'
			},
			multiple: false,
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#header-picture').val(attachment.url);
			$('#header-logo').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});
});
jQuery(document).ready(function($){
	var mediaUploader;

	$( '#upload-header-img-button' ).on('click',function(e){
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a Header Picture',
			button:{
				text: 'Choose Picture'
			},
			multiple: false,
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#header-img-picture').val(attachment.url);
			$('#header_img').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

});