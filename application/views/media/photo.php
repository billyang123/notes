<link rel="stylesheet" type="text/css" href="<?=$assets?>/public/vendor/foxibox/foxibox.css">
<script type="text/javascript" src="<?=$assets?>/public/vendor/foxibox/jquery-foxibox-0.2.min.js"></script>
<div class="uk-width-1-1">
    <ul class="uk-subnav uk-subnav-pill">
        <li><a href="/index.php/media">Album</a></li>
        <li class="uk-active"><a href="/index.php/media/photo">Photo</a></li>
        <li class=""><a href="/index.php/media/video">Video</a></li>
    </ul>
            <div class="uk-grid" data-uk-grid-margin="" id="notesPics">
                <?php foreach ($content as $item):?>
                <div class="picitem">
                    <a class="uk-thumbnail notes-imgbox images-center" rel="[gall1]" href="<?=$item["path"]?>" title="<?=$item["description"]?>">
                        <img src="<?=$item["path"]?>?imageMogr2/thumbnail/160x" alt="" onerror="javascript:$(this).closest('.picitem').remove()">
                    </a>
                </div>
                <?php endforeach;?>
            </div>
</div>
<script type="text/javascript">
$(document).ready(function(){$('#notesPics a').foxibox({
    scale:true
});});
</script>