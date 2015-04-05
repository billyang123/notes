<link rel="stylesheet" type="text/css" href="<?=$assets?>/public/libs/jqueryui/1.11.2/jquery-ui.min.css">
<link rel="stylesheet" type="text/css" href="<?=$assets?>/public/plupload/js/jquery.ui.plupload/css/jquery.ui.plupload.css">
<script type="text/javascript" src="<?=$assets?>/public/libs/jqueryui/1.11.2/jquery-ui.min.js" charset="UTF-8"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/jQuery.ui.plupload/jQuery.ui.plupload.min.js"></script>
<div class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
		<div id="uploader">
		    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
		</div>
	</div>
</div>
 
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    $("#uploader").plupload({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "/index.php/upload/signfiles",
 
        // Maximum file size
        max_file_size : '2mb',
 
        chunk_size: '1mb',
 
        // Resize images on clientside if we can
        resize : {
            width : 200,
            height : 200,
            quality : 90,
            crop: true // crop to exact dimensions
        },
 
        // Specify what files to browse for
        filters : [
            {title : "Image files", extensions : "jpg,gif,png"},
            {title : "Zip files", extensions : "zip,avi"}
        ],
 
        // Rename files by clicking on their titles
        rename: true,
         
        // Sort files
        sortable: true,
 
        // Enable ability to drag'n'drop files onto the widget (currently only HTML5 supports that)
        dragdrop: true,
 
        // Views to activate
        views: {
            list: true,
            thumbs: true, // Show thumbs
            active: 'thumbs'
        },
 
        // Flash settings
        flash_swf_url : '/js/Moxie.swf',
     
        // Silverlight settings
        silverlight_xap_url : '/js/Moxie.xap'
    });
});
</script>