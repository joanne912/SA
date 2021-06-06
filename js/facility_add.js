$(document).ready(function() {
    $("#photofile2").hide();
    $("#photofile3").hide();
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
    let common = '<span>已新增器材：</span>';
    $('#equipAdd').click(function() {
        $(this).before(`<input type="hidden" name="equip[name][]" value="${$('#equipName').val()}">`);
        $(this).before(`<input type="hidden" name="equip[amount][]" value="${$('#equipAmount').val()}">`);
        $(this).before(`<input type="hidden" name="equip[unit][]" value="${$('#equipUnit').val()}">`);
        $(this).next().append(common);
        $(this).next().append(`<span>${$('#equipName').val()}</span>`);
        $('#equipName').val('');
        $('#equipAmount').val('');
        $('#equipUnit').val('');
        common = '<span>、</span>';
    })
})