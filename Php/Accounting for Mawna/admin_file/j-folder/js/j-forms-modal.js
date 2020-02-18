$(document).ready(function(){

	/***************************************/
	/* Modal form */
	/***************************************/
	// Demo modal forms
	$('.modal-open').on('click', function() {
		$($(this).attr('href')).addClass('modal-visible');
		$('body').addClass('modal-scroll');
		return false;
	});

	// Close button
	$('.modal-close').on('click', function() {
		$('.modal-form').removeClass('modal-visible');
		$('body').removeClass('modal-scroll');
		return false;
	});
	/***************************************/
	/* end modal form */
	/***************************************/

});