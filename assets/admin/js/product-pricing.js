jQuery(document).ready(function($) {

	var pricingType = $('#pricing_type').val();
	
	$('.all_pricing').fadeOut(100,function(){
		$('#'+pricingType).fadeIn(100);
	});

	$('#pricing_type').on('change',function(e){
		e.preventDefault();
		pricingType = $(this).val();
		$('.all_pricing').fadeOut(100 , () => {
			$('#'+pricingType).fadeIn(100);
		});
	});
});