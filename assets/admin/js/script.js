jQuery(document).ready(function($) {
  $('.first_img_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'First Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.first_img').attr('src', attachment.url);
      $('.first_img_url').val(attachment.url);
    })
    .open();
  });  
  $('.second_img_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'Second Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.second_img').attr('src', attachment.url);
      $('.second_img_url').val(attachment.url);
    })
    .open();
  });  
  $('.third_img_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'Third Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.third_img').attr('src', attachment.url);
      $('.third_img_url').val(attachment.url);
    })
    .open();
  }); 

  $('.dawood_video_img_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'dawood video Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.dawood_video_img').attr('src', attachment.url);
      $('.dawood_video_img_url').val(attachment.url);
    })
    .open();
  });   
  
  $('.dawood_video_img_right_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'dawood video Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.dawood_video_img_right').attr('src', attachment.url);
      $('.dawood_video_img_right_url').val(attachment.url);
    })
    .open();
  });

$('.dawood_video_img_offer_upload').click(function(e) {
    e.preventDefault();
    var custom_uploader = wp.media({
      title: 'dawood video Image Choose',
      button: {
        text: 'Upload Image'
      },
      multiple: false  // Set this to true to allow multiple files to be  selected
    })
    .on('select', function() {
      var attachment = custom_uploader.state().get('selection').first().toJSON();
      $('.dawood_video_img_offer').attr('src', attachment.url);
      $('.dawood_video_img_offer_url').val(attachment.url);
    })
    .open();
  });
    $('#all_pricing').hide();
    var role_init = $('#pricing_type').val();
	$('.all_pricing').fadeOut(100,function(){
		$('#'+role_init).fadeIn(200);
	});
	$('#pricing_type').on('change', () => {
		var price = $('#pricing_type').val();
		$('.all_pricing').fadeOut(100,function(){
			$('#'+price).fadeIn(200);
		});
	});
});