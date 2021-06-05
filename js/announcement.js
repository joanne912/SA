$(document).ready(function() {
    flag = 0
    $('.edit').click(function() {
        $('#title').val(this.parentNode.parentNode.parentNode.children[2].children[0].children[1].children[0].innerHTML);
        $('#content').val(this.parentNode.parentNode.parentNode.children[2].children[1].children[0].innerHTML);
        $('#exampleModalLabel2').html('修改公告');
        $('#type').val(this.parentNode.parentNode.children[1].children[1].innerHTML);
        $('#announcement').val($(this).data('id'));
        if (flag == 0) {
            $('#file').before('<p>檔案需要更新才需要重新上傳</p>');
            flag = 1;
        }
        $('#submit').val('modify');
        $('#submit').html('修改');
    });
    $('.delete').click(function() {
        $('#go').siblings('input').val($(this).data('id'));
        $('#go').val('delete');
    });
    $('#new').click(function() {
        $('#title').val();
        $('#content').val();
        $('#exampleModalLabel2').html('新增公告');
        $('#type').val();
        if (flag == 1) {
            $('#file').prev().remove();
            flag = 0;
        }
        $('#submit').val('new');
        $('#submit').html('確認');
    })
});