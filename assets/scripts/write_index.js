require("module/tags-complete");
require("module/upload");
$("#markdownarea").markdownarea({
    mode:'tab',
    toolbar:[ "bold", "italic", "strike", "link", "picture", "imageUpload", "blockquote", "listUl", "listOl"]
})
// Setup html5 version
var fileIDs = {};
$('.j_upload_files[data-upload]').each(function(){
    var spy = $(this);
    spy.on("upload.success",function(evt,data){
        var liStrArr = [
            '<li data-id="',
            data.content.key,
            '"><i class="uk-icon-paperclip"></i><a href="',
            data.content.baseUrl,
            '" target="_blank">',
            data.content.fileName,
            '</a><a href="/index.php/upload/deletefile/',
            data.content.key,
            '" data-remote="true" class="uk-icon-times removefile"></a></li>'
        ];
        fileIDs[data.content.key] = [data.content.fileName,data.content.baseUrl];
        $("#fileId").val(JSON.stringify(fileIDs));
        $(".filebox").append(liStrArr.join(""));
    })
})

$(document).on("ajax:success",".removefile",function(evt, res){
    var self = $(evt.target);
    var paret = $(self).closest("li");
    var keyId = paret.attr("data-id");
    if(!res.success) return;
    delete fileIDs[keyId];
    paret.remove();
}) 