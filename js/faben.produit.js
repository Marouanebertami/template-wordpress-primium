jQuery(document).ready(function($){

	var mediaUploader;

	$( '#upload-img-button' ).on('click',function(e){
		e.preventDefault();
		if( mediaUploader ){
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a default product Picture',
			button:{
				text: 'Choose Picture'
			},
			multiple: false,
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#img-product').val(attachment.url);
			$('#produit-img').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();

	});

	$('#remove-product-img').on('click', function(e){
		e.preventDefault();
		var answer = confirm("Are you sure you want to remove the product image");
		if( answer == true ){
			$('#img-product').val('');
		}
		return;
	});


});