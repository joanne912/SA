$('#exampleModal').on('shown.bs.modal', function() {
    $('#hide').click(function(event) {
        $('#exampleModal').modal('hide');
    });
})
$('#exampleModal').on('shown.bs.modal', function() {
    $('#cross').click(function(event) {
        $('#exampleModal').modal('hide');
    });
})
$('#exampleModal').on('shown.bs.modal', function() {
    $('#go').click(function(event) {
        $('#exampleModal').modal('hide');
    });
})
$(document).ready(function() {
    $('.btn1').click(function() {
        $('#go').prev().val($(this).data('facility'));
        $('#go').prev().prev().val($(this).data('booking'));
    })
})