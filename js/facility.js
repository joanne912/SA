$(document).ready(function() {
    $('.edit').click(function() {
        let title = $(this).prev().children().last().html();
        $(this).prev().children().last().remove();
        $(this).prev().append(`<input name="title" type="text" value="${title}" >`);

        let startTime = $('#time').children().first().html();
        let endTime = $('#time').children().last().html();
        $('#time').children().first().remove();
        $('#time').children().last().remove();
        $('#time').prepend(`<input name="startTime" type="text" value="${startTime}" >`);
        $('#time').append(`<input name="endTime" type="text" value="${endTime}" >`);

        let intro = $('#intro').children().html();
        $('#intro').empty();
        $('#intro').append(`<textarea rows="5" cols="40" name="introduction">${intro}</textarea>`);

        let limit = $('#data').children().eq(0).children().eq(1).html();
        $('#data').children().eq(0).children().eq(1).remove();
        $('#data').children().eq(0).children().first().after(`<input name="limit" type="text" value="${limit}" >`)

        let point = $('#data').children().eq(2).children().eq(1).html();
        $('#data').children().eq(2).children().eq(1).remove();
        $('#data').children().eq(2).children().first().after(`<input name="point" type="text" value="${point}" >`)

        let description = $('#data').children().eq(3).children().eq(1).html();
        $('#data').children().eq(3).children().eq(1).remove();
        $('#data').children().eq(3).append(`<textarea rows="5" cols="40" name="introduction">${description}</textarea>`)

        $('form').append('<input type="submit" name="submit" value="確認修改公設資訊">')
        $(this).hide();
    });
});