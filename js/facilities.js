$('#exampleModal').on('shown.bs.modal', function() {
    $('#hide').click(function(event) {
        $('#exampleModal').modal('hide');
    });
    $('#cross').click(function(event) {
        $('#exampleModal').modal('hide');
    });
    $('#go').click(function(event) {
        $('#exampleModal').modal('hide');
    });
})
$('.delete').click(function() {
    $('input:hidden').val($(this).data('id'));
})