$(document).ready(function() {
    $('.top a').click(function() {
        $('html').animate({
            scrollTop: 0
        }, 700);
    });
    $('#forgetPassword').click(function() {
        $('#spinner').show();
        console.log($('#community').val());
        console.log($('#household').val());
        console.log($('#email').val());
        $.post("reset_password.php", {
                community: $('#community').val(),
                household: $('#household').val(),
                email: $('#email').val()
            },
            function(data, status) {
                if (data == 'true') {
                    console.log("true");
                    $('#exampleModalCenter3').modal('hide');
                    $('#exampleModalCenter4').modal('show');
                    $('#spinner').hide();
                } else {
                    console.log(data);
                    $('p.num_error').show();
                    $('#spinner').hide();
                }
            }
        );
    });
    $('#check_new_password').change(function() {
        if ($('#check_new_password').val() == $('#new_password').val()) {
            $('#submit').removeAttr('disabled');
            console.log('able');
        } else {
            $('#submit').attr('disabled', 'disabled');
            console.log('disable');
        }
    })
    $('#submit').attr('disabled', 'disabled');
    $('#spinner').hide();
    $('p.num_error').hide();
});