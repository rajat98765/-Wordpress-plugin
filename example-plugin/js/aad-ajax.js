jQuery(document).ready(function($){
	$('#aad-form').submit(function(){


		data = {
			action:'aad_get_results'
		};

		$.post(ajaxurl,data, function(response){
			$('#aad_results').html(response);
		});


	return false;
	});
});