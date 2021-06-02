$(document).ready(function() {
    $('.edit').click(function() {
        let title = $(this).prev().children().last().html();
        $(this).prev().children().last().remove();
        $(this).prev().append(`<input name="title" type="text" value="${title}" >`);



        console.log(typeof(title));
    });
});