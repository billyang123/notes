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