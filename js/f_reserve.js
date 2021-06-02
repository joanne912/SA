$(document).ready(function() {
    $('.see_information').click(function() {
        $('#information').show();
    });
});
$(document).ready(function() {
    $('#yes').click(function() {
        $('.tab').show();
    });
});
$(document).ready(function() {
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