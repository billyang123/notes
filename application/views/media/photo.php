<link rel="stylesheet" type="text/css" href="<?=$assets?>/public/vendor/foxibox/foxibox.css">
<script type="text/javascript" src="<?=$assets?>/public/vendor/foxibox/jquery-foxibox-0.2.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$assets?>/public/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" media="screen">
<div class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
        <ul class="uk-subnav uk-subnav-pill">
            <li><a href="/index.php/media">Album</a></li>
            <li class="uk-active"><a href="/index.php/media/photo">Photo</a></li>
            <li class=""><a href="/index.php/media/video">Video</a></li>
        </ul>
        <div class="uk-grid" data-uk-grid-margin="">
            <div class="uk-width-medium-2-3">  
                <button class="uk-button" data-uk-modal="{target:'#uploadContainer'}"><i class="uk-icon-plus"></i>   upload images</button>
                <div id="uploadContainer" class="uk-modal">
                    <div class="uk-modal-dialog">
                        <a class="uk-modal-close uk-close"></a>
                        <form id="upload_form" class="uk-form uk-form-horizontal" method="POST" enctype="multipart/form-data">
                            <div class="albumContent uk-form-row">
                                <span>Uploaded to</span>
                                <select name="albumId">
                                    <?php foreach ($album as $item):?>
                                    <option value="<?=$item["id"]?>" <?php if($albumId){
                                        echo $albumId == $item["id"] ? 'selected':'';
                                    }  ?>><?=$item["name"]?></option>
                                    <?php endforeach;?>
                                </select>
                            </div>
                            
                            <div id="uploader">
                                <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <a href="https://github.com/billyang123/image-collect/tree/daily/1.0.1" target="_blank"><i class="uk-icon-github"></i>   chrome picture collection plugin</a>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin="" id="notesPics">
            <?php if (count($content)==0):?>
            <div class="uk-width-medium-1-1">
                <div class="uk-alert" data-uk-alert>
                    <a href="" class="uk-alert-close uk-close"></a>
                    <p>Now there is no picture, please update you picture...</p>
                </div>
            </div>
            <?php endif; ?>
            <?php foreach ($content as $item):?>
            <div class="picitem media-relative">
                <div class="media-abs">
                    <a class="uk-button uk-button-mini" data-remote="true" href="/index.php/upload/delete/<?=$item['id']?>" data-done="$(this).closest('.picitem').remove();">X</a>
                </div>
                <div>
                    <a class="uk-thumbnail notes-imgbox images-center" rel="[gall1]" href="<?=$item["path"]?>" title="<?=$item["description"]?>">
                        <img src="<?=$item["path"]?>?imageMogr2/thumbnail/160x" alt="<?=$item["description"]?>">
                    </a>
                </div>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>
<script type="text/javascript">
$(document).ready(function(){$('#notesPics .uk-thumbnail').foxibox({
    scale:true
});});
</script>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    var uploader = $("#uploader").pluploadQueue({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "/index.php/upload",
        
        chunk_size : '1mb',
        rename : true,
        dragdrop: true,
        multipart : true,
        multipart_params : {'albumId': $('select[name="albumId"]').val()},
        filters : {
            // Maximum file size
            max_file_size : '10mb',
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
    });
    // //var uploader = $('#uploader').pluploadQueue();
    // uploader.bind('UploadComplete', function(up) {
    //     console.log(up);
    //   //up.settings.multipart_params.albumId = $('select[name="albumId"]').val();
    // });  
});
</script>