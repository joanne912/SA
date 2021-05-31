$(document).ready(function() {
	$('.see_information').click(function() {
		$('#information').show('active');
	});
});
$(document).ready(function() {
	$('#no').click(function() {
		$('.tab').hide();
	});
});
$(document).ready(function() {
	$('#yes').click(function() {
		$('.tab').show();
	});
});
