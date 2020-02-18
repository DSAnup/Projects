
function selectText(containerid) {
    if (document.selection) {
        var range = document.body.createTextRange();
        range.moveToElementText(document.getElementById(containerid));
        range.select();
    } else if (window.getSelection) {
        var range = document.createRange();
        range.selectNode(document.getElementById(containerid));
        window.getSelection().addRange(range);
    }
}
function d_news()
{
   
    $.get('./admin/news/new_display/'+ $('#cat_id').val() + '/'+$('#nd').val())
    .success(function (data){
        $("#news").hide("slow");
        $('#news_list').html(data);
    });
}
