<div class="uk-width-1-1">
    <ul class="uk-subnav uk-subnav-pill">
        <li class=""><a href="/index.php/media">Album</a></li>
        <li class=""><a href="/index.php/media/photo">Photo</a></li>
        <li class="uk-active"><a href="/index.php/media/video">Video</a></li>
    </ul>
            <div class="uk-grid" data-uk-grid-margin="">
                <?php foreach ($content as $item):?>
                <div class="uk-width-medium-1-4" style="height:210px;">
                	<embed src="<?=$item["path"]?>" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
                </div>
                <?php endforeach;?>
            </div>
</div>