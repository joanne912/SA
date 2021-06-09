$(document).ready(function() {
    $('.photoUpload').hide();
    $('.edit').click(function() {
        $("#photofile1").change(function() {
            var readFile = new FileReader();
            var mfile = $("#photofile1")[0].files[0]; //$("#photofile1")[0]等價於document.getElementById('photofile1')
            readFile.readAsDataURL(mfile);
            readFile.onload = function() {
                var img1 = $("#photo1");
                img1.attr("src", this.result);
            }
            $("#photofile2").show();
        })
        $("#photofile2").change(function() {
            var readFile = new FileReader();
            var mfile = $("#photofile2")[0].files[0]; //$("#photofile2")[0]等價於document.getElementById('photofile2')
            readFile.readAsDataURL(mfile);
            readFile.onload = function() {
                var img1 = $("#photo2");
                img1.attr("src", this.result);
            }
            $("#photofile3").show();
        })
        $("#photofile3").change(function() {
            var readFile = new FileReader();
            var mfile = $("#photofile3")[0].files[0]; //$("#photofile2")[0]等價於document.getElementById('photofile3')
            readFile.readAsDataURL(mfile);
            readFile.onload = function() {
                var img1 = $("#photo3");
                img1.attr("src", this.result);
            }
        })
        let title = $(this).prev().children().last().html();
        $(this).prev().children().last().remove();
        $(this).prev().append(`<input name="title" type="text" value="${title}" class="trans_input">`);

        let startTime = $('#time').children().first().html();
        let endTime = $('#time').children().last().html();
        $('#time').children().first().remove();
        $('#time').children().last().remove();
        $('#time').prepend(`<input name="startTime" type="text" value="${startTime}" class="trans_input">`);
        $('#time').append(`<input name="endTime" type="text" value="${endTime}" class="trans_input">`);

        let intro = $('#intro').children().html();
        $('#intro').empty();
        $('#intro').append(`<textarea rows="5" cols="40" name="introduction" class="trans_input trans_textarea">${intro}</textarea>`);

        let limit = $('#data').children().eq(0).children().eq(1).html();
        $('#data').children().eq(0).children().eq(1).remove();
        $('#data').children().eq(0).children().first().after(`<input name="limit" type="text" value="${limit}" class="trans_input  trans">`)

        let point = $('#data').children().eq(2).children().eq(1).html();
        $('#data').children().eq(2).children().eq(1).remove();
        $('#data').children().eq(2).children().first().after(`<input name="point" type="text" value="${point}" class="trans_input  trans">`)

        let description = $('#data').children().eq(3).children().eq(1).html();
        $('#data').children().eq(3).children().eq(1).remove();
        $('#data').children().eq(3).append(`<textarea rows="5" cols="40" name="introduction" class="trans_input trans_textarea">${description}</textarea>`)

        $('form').append('<input type="submit" name="submit" value="確認修改公設資訊" class="trans_sub"> ');
        $('.photoUpload').show();
    });
});