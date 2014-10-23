<!-- Codemirror and marked dependencies -->
<link rel="stylesheet" href="<?=$assets?>/public/vendor/codemirror/lib/codemirror.css">
<script src="<?=$assets?>/public/vendor/codemirror/lib/codemirror.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/markdown/markdown.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/addon/mode/overlay.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/gfm/gfm.js"></script>
<script src="<?=$assets?>/public/vendor/marked.js"></script>
<!-- Markdown Area JavaScript and CSS -->
<script src="<?=$assets?>/public/dist/markdownarea.js"></script>


<script type="text/javascript" src="<?=$assets?>/public/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$assets?>/public/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" media="screen">
<div class="uk-width-1-1">

    <div class="uk-panel uk-panel-box">
        <form action="<?=$assets?>/index.php/notes/update/<?=$content['id']?>/do" method="POST" data-remote="true" data-done="$.alert(res.content)" class="uk-form uk-form-horizontal _write-form">
            <input value="<?=$content['userName'] ?>" name="userName" type="hidden">
            <input value="<?=$content['userId'] ?>" name="userId" type="hidden">
         	<div class="uk-form-row _write-title">
                <input type="text" value="<?=$content['title']?>" name="title" placeholder="title" class="uk-width-1-1"/>
            </div>
          	<div class="uk-form-row">
                <p><i class="uk-icon-info-circle uk-icon-small"></i>      Notes written in Markdown syntax requirements, please refer to <a href="http://wowubuntu.com/markdown/">Markdown</a> syntax concrete syntax.</p>
                <textarea data-uk-markdownarea="{mode:'tab'}" name="content" style="width:100%;"><?=$content['content']?></textarea>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">分类</label>
                <div class="uk-form-controls">
                    <select name="type">
                        <?php foreach ($classify as $item):?>
                        <option value="<?=$item['id']?>" <?=($item['id']==$content['type'])?'selected':''?> ><?=$item['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">是否公开</label>
                <div class="uk-form-controls">
                    <label><input type="radio" value="1" name="scope" <?=$content['scope']=='1'?'checked':''?>> 是</label>
                    <label><input type="radio" value="0" name="scope" <?=$content['scope']=='0'?'checked':''?>> 否</label>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">标签</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-width-1-1 js-tags-complete" name="tagsStr" value="<?=$content['tags']?>">
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">附件</label>
                <div class="uk-form-controls">
                    <input type="hidden" value="<?=($content['attachments']?$content['attachments']:'')?>" name="attachments" id="fileId">
                    <a class="uk-button" href="javascript:void(0);" data-uk-modal="{target:'#uploadContainer'}"><i class="uk-icon-plus"></i>   select files</a>
                    <ul class="filebox uk-list"></ul>
                    <div class="uk-alert" data-uk-alert>
                        <a href="" class="uk-alert-close uk-close"></a>
                        <p>只支持图片（jpg,gif,png）和压缩包（zip）</p>
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <button type="submit" name="submit" class="uk-button uk-button-primary uk-align-center">update notes</button>
            </div> 
        </form>
    </div>
</div>
<div id="uploadContainer" class="uk-modal">
    <div class="uk-modal-dialog">
        <a class="uk-modal-close uk-close"></a>
        <form id="upload_form" class="uk-form uk-form-horizontal" method="POST" enctype="multipart/form-data">
            <div id="uploader">
                <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">
require("module/tags-complete");
</script>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    var fileIDs = {};
    if($("#fileId").val()!=''){
        fileIDs = $.parseJSON($("#fileId").val());
        $.each(fileIDs,function(index,item){
            $(".filebox").append([
                '<li data-id="',
                index,
                '"><i class="uk-icon-paperclip"></i><a href="',
                item[1],
                '">',
                item[0],
                '</a><a href="/index.php/upload/deletefile/',
                index,
                '" data-remote="true" class="uk-icon-times removefile"></a></li>'
            ]);
        })
    }
    var uploaderInit = function(){
        $("#uploader").pluploadQueue({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : "/index.php/upload/signfiles",
            
            chunk_size : '1mb',
            rename : true,
            dragdrop: true,
            multipart : true,
            //multipart_params : {'albumId': $('select[name="albumId"]').val()},
            filters : {
                // Maximum file size
                max_file_size : '50mb',
                // Specify what files to browse for
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"}
                ]
            },

            // Resize images on clientside if we can
            resize: {
                // width : 200, 
                // height : 200, 
                quality : 90,
                crop: true // crop to exact dimensions
            },


            // Flash settings
            flash_swf_url : '/js/Moxie.swf',
        
            // Silverlight settings
            silverlight_xap_url : '/js/Moxie.xap',
            init: {
                FileUploaded:function(up, files, object) {
                    var data = $.parseJSON(object.response);
                    var liStrArr = [
                        '<li data-id="',
                        data.content.key,
                        '"><i class="uk-icon-paperclip"></i><a href="',
                        data.content.baseUrl,
                        '">',
                        data.content.fileName,
                        '</a><a href="/index.php/upload/deletefile/',
                        data.content.key,
                        '" data-remote="true" class="uk-icon-times removefile"></a></li>'
                    ];
                    fileIDs[data.content.key] = [data.content.fileName,data.content.baseUrl];
                    //fileIDs.push(data.content.key);
                    $("#fileId").val(JSON.stringify(fileIDs));
                    $(".filebox").append(liStrArr.join(""));
                }
            }
        });
    }
    uploaderInit();
    $('#uploadContainer').on({
        'uk.modal.show': function(){
             //console.log("Modal is visible.");
        },

        'uk.modal.hide': function(){
            //console.log("Element is not visible.");
            uploaderInit()
        }
    });
    $(document).on("ajax:success",".removefile",function(evt, res){
        var self = $(evt.target);
        var paret = $(self).closest("li");
        var keyId = paret.attr("data-id");
        if(!res.success) return;
        delete fileIDs[keyId];
        //fileIDs.splice($.inArray(keyId,fileIDs),1);
        paret.remove();
    }) 
});
</script>