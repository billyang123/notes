<!-- Codemirror and marked dependencies -->
<link rel="stylesheet" href="<?=$assets?>/public/vendor/codemirror/lib/codemirror.css">
<script src="<?=$assets?>/public/vendor/codemirror/lib/codemirror.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/markdown/markdown.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/addon/mode/overlay.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/xml/xml.js"></script>
<script src="<?=$assets?>/public/vendor/codemirror/mode/gfm/gfm.js"></script>
<script src="<?=$assets?>/public/vendor/marked.js"></script>
<!-- Markdown Area JavaScript and CSS -->
<script src="<?=$assets?>/public/dist/markdownarea.js"></script>
<form action="<?=$assets?>/index.php/notes/update/<?=$content['id']?>/do" method="POST" data-remote="true" data-done="$.alert(res.content)" class="uk-form uk-form-horizontal _write-form">
    <input value="<?=$content['userName'] ?>" name="userName" type="hidden">
    <input value="<?=$content['userId'] ?>" name="userId" type="hidden">
 	<div class="uk-form-row _write-title">
        <input type="input" value="<?=$content['title']?>" name="title" placeholder="title" class="uk-width-1-1"/>
    </div>
  	<div class="uk-form-row">
        <p><i class="uk-icon-info-circle uk-icon-small"></i>      Notes written in Markdown syntax requirements, please refer to <a href="http://wowubuntu.com/markdown/">Markdown</a> syntax concrete syntax.</p>
        <textarea data-uk-markdownarea="{mode:'tab'}" name="content" style="width:100%;"><?=$content['content']?></textarea>
    </div>
    <div class="uk-form-row">
        <span>分类:</span>
        <select name="type">
        	<?php foreach ($classify as $item):?>
            <option value="<?=$item['id']?>" <?=($item['id']==$content['type'])?'selected':''?> ><?=$item['name']?></option>
            <?php endforeach;?>
        </select>
        <span class="uk-margin-left">是否公开：</span>
        <label><input type="radio" value="1" name="scope" <?=$content['scope']=='1'?'checked':''?>> 是</label>
        <label><input type="radio" value="0" name="scope" <?=$content['scope']=='0'?'checked':''?>> 否</label>
    </div>
    <div class="uk-form-row">
        <input type="submit" name="submit" class="uk-button" value="update notes" />
    </div> 
</form>