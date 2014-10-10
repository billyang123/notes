<div class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
        <ul class="uk-subnav uk-subnav-pill">
            <li class=""><a href="/index.php/media">Album</a></li>
            <li class=""><a href="/index.php/media/photo">Photo</a></li>
            <li class="uk-active"><a href="/index.php/media/video">Video</a></li>
        </ul>
        <div class="uk-gird" data-uk-grid-margin="">
            <div class="uk-width-medium-2-3"> 
                <button class="uk-button" data-uk-modal="{target:'#upVideo'}"><i class="uk-icon-plus"></i>   add video</button>
                <div id="upVideo" class="uk-modal">
                    <div class="uk-modal-dialog">
                        <a class="uk-modal-close uk-close"></a>
                        <form id="upload_form" class="uk-form uk-form-horizontal" action="<?=$assets?>/index.php/media/addVideo" class="uk-form uk-clearfix uk-form-horizontal" data-remote="true" method="post" data-done="">
                            <p>Add a video address：</p>
                            <input value="" name="video_path" type="text">
                            <button class="uk-button uk-button-primary" type="submit">submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <div class="uk-grid" data-uk-grid-margin="">
            <?php foreach ($content as $item):?>
            <div class="uk-width-medium-1-4" style="height:210px;">
            	<embed src="<?=$item["path"]?>" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
            </div>
            <?php endforeach;?>
        </div>
    </div>
</div>