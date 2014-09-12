<?php foreach ($content as $item):?>
<article class="uk-article _index-article uk-panel-box">
    <h1 class="uk-article-title">
        <a href="<?=$assets?>/index.php/notes/<?=$item["id"] ?>"><?=$item["title"] ?></a>
    </h1>
    <p class="uk-article-meta"><span><i class="uk-icon-user uk-icon-small"></i>  <?=$item['userName'] ?></span>   <span><i class="uk-icon-clock-o uk-icon-small"></i>  <?=date("Y-m-d H:i:s",$item["create_date"]) ?></span></p>
    <div class="notes-content">
    	<?=parse_markdown($item["content"]) ?>
    </div>
    <p><a href="<?=$assets?>/index.php/comment?noteId=<?=$item['id'] ?>" data-remote-once="true" class="uk-button uk-button-primary" data-remote="true" data-done="$('.js-comment-<?=$item['id'] ?>').html(res).parent().show()">comment</a></p>
    <div class="_comment-content" style="display:none;">
        <ul class="uk-comment-list js-comment-<?=$item['id'] ?>"></ul>
        <form class="uk-form uk-clearfix" data-remote="true" action="<?=$assets?>/index.php/comment/add/<?=$item['id'] ?>" method="post" data-done="$('.js-comment-<?=$item['id'] ?>').append(res);">
            <input value="<?=$item['userId'] ?>" type="hidden" name="com_user_id">
            <input value="<?=$item['userName'] ?>" type="hidden" name="com_user_name">
            <input value="false" type="hidden" name="issub">
            <div class="uk-form-row uk-form-controls">
                <textarea rows="5" class="_comment-controls" name="content"></textarea>
            </div>
            <div class="uk-form-row uk-align-right">
                <button class="uk-button" type="submit">submit</button>
            </div>
            
        </form>           
    </div> 
</article>
<?php endforeach;?>