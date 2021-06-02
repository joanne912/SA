$(document).ready(function() {
    $('.edit').click(function() {
        $('#title').val(this.parentNode.parentNode.parentNode.children[2].children[0].children[1].children[0].innerHTML);
        $('#content').val(this.parentNode.parentNode.parentNode.children[2].children[1].children[0].innerHTML);
        $('#exampleModalLabel2').html('修改公告');
        $('#type').val(this.parentNode.parentNode.children[1].children[1].innerHTML);
        $('#submit').val($(this).data('id'));
        $('#submit').html('修改');
    });
    $('#new').click(function() {
        $('#title').val();
        $('#content').val();
        $('#exampleModalLabel2').html('新增公告');
        $('#type').val();
        $('#submit').val('new');
        $('#submit').html('確認');
    })
});