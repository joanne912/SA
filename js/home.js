function toggle2() {
    $("#menu-wrap").animate({
        'width': 'toggle'
    });
    $("#menu-wrap").css({
        'display': 'flex'
    })
    // $('.toast').toast('show');
    $('#myModal').modal('show')
}