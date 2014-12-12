require("module/tags-complete");
$(function() {
    $("#markdownarea").markdownarea({
        mode:'tab',
        toolbar:[ "bold", "italic", "strike", "link", "picture", "blockquote", "listUl", "listOl"]
    })
    // Setup html5 version
    var fileIDs = {};
    var uploaderInit = function(){
        $("#uploader").pluploadQueue({
            // General settings
            runtimes : 'html5,flash,silverlight,html4',
            url : "/index.php/upload/signfiles",
            
            chunk_size : '10mb',
            rename : true,
            dragdrop: true,
            multipart : true,
            //multipart_params : {'albumId': $('select[name="albumId"]').val()},
            filters : {
                // Maximum file size
                max_file_size : '10mb',
                // Specify what files to browse for
                mime_types: [
                    {title : "Image files", extensions : "jpg,gif,png"},
                    {title : "Zip files", extensions : "zip"},
                    {title : "Rar files", extensions : "rar"}
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
                        '" target="_blank">',
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