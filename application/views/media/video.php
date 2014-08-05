<div class="uk-width-1-1">
    <ul class="uk-subnav uk-subnav-pill">
        <li><a href="/index.php/media">相册</a></li>
        <li class=""><a href="/index.php/media/photo">照片</a></li>
        <li class="uk-active"><a href="/index.php/media/video">视频</a></li>
    </ul>
            <div class="uk-grid" data-uk-grid-margin="">
                <?php foreach ($content as $item):?>
                <div class="uk-width-medium-1-4" style="height:210px;">
                	<embed src="<?=$item["path"]?>" allowFullScreen="true" quality="high" width="100%" height="100%" align="middle" allowScriptAccess="always" type="application/x-shockwave-flash"></embed>
                </div>
                <?php endforeach;?>
            </div>
</div>