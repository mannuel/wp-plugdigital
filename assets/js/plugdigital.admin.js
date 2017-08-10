jQuery(document).ready( function($) {
	var mediaUploader;

	$('#upload-login-image-button').on('click',function(e){
		e.preventDefault();
		if (mediaUploader) {
			mediaUploader.open();
			return;
		}

		mediaUploader = wp.media.frames.file_frame = wp.media({
			title: 'Choose a image for login page',
			button: {
				text: 'Choose a picture'
			},
			multiple: false
		});

		mediaUploader.on('select', function(){
			attachment = mediaUploader.state().get('selection').first().toJSON();
			$('#pdmx-login-image').val(attachment.url);
			$('#login-image-current').css('background-image','url(' + attachment.url + ')');
		});

		mediaUploader.open();
	});
});