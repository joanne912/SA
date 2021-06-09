$(document).ready(function() {
    $("#CheckAll").click(function() {
        if ($("#CheckAll").prop("checked")) { //如果全選按鈕有被選擇的話（被選擇是true）
            $("input[name='Checkbox[]']").each(function() {
                $(this).prop("checked", true); //把所有的核取方框的property都變成勾選
            })
        } else {
            $("input[name='Checkbox[]']").each(function() {
                $(this).prop("checked", false); //把所有的核方框的property都取消勾選
            })
        }
    })
})