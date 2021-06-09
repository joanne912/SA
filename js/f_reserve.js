$(document).ready(function() {
    $('.see_information').click(function() {
        $('#startTime').html($('.getStartTime').val() + ":00");
        $('#endTime').html($('.getEndTime').val() + ":00");
        $('#date').html($('.getDate').val().replace('-', '/').replace('-', '/'));
        $('#amount').html($('.getAmount').val() + " 人");
        console.log($('#yes')[0].checked)
        if ($('#yes')[0].checked == true) {
            $('#equipment').show();
            $('#equipment').children().last().html($('.equipmentName').val() + $('input[name="equipmentAmount"]').html());
        } else {
            $('#equipment').hide();
        }
        $('#information').show();

    });
    $('#yes').click(function() {
        $('.tab').show();
    });
    $('#no').click(function() {
        $('.tab').hide();
        $('.tabcontent').hide();
    });
});

function tools(evt, toolName) {
    var i, tabcontent, tablinks;
    tabcontent = document.getElementsByClassName("tabcontent");
    for (i = 0; i < tabcontent.length; i++) {
        tabcontent[i].style.display = "none";
    }

    tablinks = document.getElementsByClassName("tablinks");
    for (i = 0; i < tablinks.length; i++) {
        tablinks[i].className = tablinks[i].className.replace(" active", "");
    }
    document.getElementById(toolName).style.display = "block";
    evt.currentTarget.className += " active";
}