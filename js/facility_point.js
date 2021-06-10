$(document).ready(function() {
    let totalPoint = 1500;
    $('.point').each(function() {
        totalPoint -= parseInt($(this).html());
    })
    $('.pp').html(totalPoint);
})