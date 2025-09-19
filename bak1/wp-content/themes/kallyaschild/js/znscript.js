/*--------------------------------------------------------------------------------------------------

	File: znscript.js

	Description: This is the main javascript file for this theme
	Plesae be carefull when editing this file

--------------------------------------------------------------------------------------------------*/


;(function($){

	$(document).ready(function(e) {

		// LOGIN FORM
		jQuery(document).on('submit','.zn_form_login_demo , .zn_form_login',function(event){
			event.preventDefault();
			var form = $(this),
				warning = false,
				button = $('.zn_sub_button',this),
				values = form.serialize()+'&ajax_login=true';
			
			$('div.links', form).html('The LOGIN/REGISTRATION has been disabled for demo purposes');
			return;

		});
		
	});
	
	
})(jQuery);
