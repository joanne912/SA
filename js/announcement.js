document.write('<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>');
$(document).ready(function() {
    $('.edit').click(function() {
        $('#title').val(this.parentNode.parentNode.parentNode.children[2].children[0].children[1].children[0].innerHTML);
        $('#content').val(this.parentNode.parentNode.parentNode.children[2].children[1].children[0].innerHTML);
        $('#exampleModalLabel2').html('修改公告');
        $('#type').val(this.parentNode.parentNode.children[1].children[1].innerHTML);
        $('#submit').val('update');
        console.log(this.parentNode.parentNode.children[1].children[1].innerHTML)

    })
});