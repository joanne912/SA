$(document).ready(function() {
	$('.top a').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$('html').animate({
			scrollTop:0
		},700);
	});
});