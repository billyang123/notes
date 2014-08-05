<?php foreach ($content as $item):?>
<li class="uk-animation-fade">
    <article class="uk-comment">
        <header class="uk-comment-header">
            <img class="uk-comment-avatar" src="/identicon.php?uid=<?=$item['username']?>&size=50" alt="">
            <h4 class="uk-comment-title"><?=$item['username']?></h4>
            <div class="uk-comment-meta uk-clearfix">
                <span class="uk-align-left">Reply <?=$item['com_user_name']?> on <?=date("Y-m-d H:i:s",$item['create_date'])?></span>
                <button class="uk-button-link _comment-reply uk-align-right uk-button-mini" onclick="$(this).closest('li').find('form').fadeToggle();"><i class="uk-icon-reply" ></i>    reply</button>
            </div>
        </header>
        <div class="uk-comment-body">
            <p><?=$item['content']?></p>
        </div>
        <div class="uk-comment-footer">
            
            <form class="uk-form uk-clearfix" style="display:none;" data-remote="true" action="<?=$assets?>/index.php/comment/add/<?=$item['note_id'] ?>" method="post" data-done="$(this).closest('li').after(res)">
            	<input value="<?=$item['user_id'] ?>" type="hidden" name="com_user_id">
                <input value="<?=$item['username'] ?>" type="hidden" name="com_user_name">
                <input value="true" type="hidden" name="issub">
                <div class="uk-form-row uk-form-controls">
                    <textarea rows="2" class="_comment-controls" name="content"></textarea>
                </div>
                <div class="uk-form-row">
                    <button class="uk-button" type="submit">submit</button>
                </div>    
            </form>
        </div>
    </article>
    <!-- <ul>
        <li>
            <article class="uk-comment">...</article>
        </li>
    </ul> -->
</li>
<?php endforeach ?>