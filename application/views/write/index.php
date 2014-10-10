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
<div class="uk-width-1-1">
    <div class="uk-panel uk-panel-box">
        <form action="<?=$assets?>/index.php/notes/create" method="POST" data-remote="true" data-done="$.alert(res.content)" class="uk-form uk-form-horizontal _write-form">
            <input value="<?=$user['username'] ?>" name="userName" type="hidden">
            <input value="<?=$user['userId'] ?>" name="userId" type="hidden">
         	<div class="uk-form-row _write-title">
                <input type="text" name="title" placeholder="Title" class="uk-width-1-1"/>
            </div>
          	<div class="uk-form-row">
                <p><i class="uk-icon-info-circle uk-icon-small"></i>      Notes written in Markdown syntax requirements, please refer to <a href="http://wowubuntu.com/markdown/">Markdown</a> syntax concrete syntax.</p>
                <textarea data-uk-markdownarea="{mode:'tab'}" name="content" style="width:100%;"></textarea>
            </div>
            <div class="uk-form-row">
                <span>分类:</span>
                <select name="type">
                    <?php foreach ($classify as $item):?>
                    <option value="<?=$item['id']?>"><?=$item['name']?></option>
                    <?php endforeach;?>
                </select>
                <span class="uk-margin-left">是否公开：</span>
                <label><input type="radio" value="1" name="scope" checked> 是</label>
                <label><input type="radio" value="2" name="scope"> 否</label>
            </div>
            <div class="uk-form-row">
                <button type="submit" name="submit" class="uk-button uk-button-primary uk-align-center">Create news</button>
            </div> 
        </form>
    </div>
</div>