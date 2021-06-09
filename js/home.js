$(document).ready(function() {
    $('.changeCommunity').click(function() {
        $('input:hidden[name="changeCommunity"]').val($(this).data('key'));
        $('#changeCommunity').submit();
    })
})

function toggle2() {
    $("#menu-wrap").animate({
        'width': 'toggle'
    });
    $("#menu-wrap").css({
        'display': 'flex'
    })
    $('#myModal').modal('show')
}