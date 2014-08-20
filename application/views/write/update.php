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
<form action="<?=$assets?>/index.php/notes/update/<?=$content['id']?>/do" method="post" class="uk-form uk-form-horizontal _write-form">
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
        	<?php
				switch ($content['type'])
				{
				case 1:
				  ?>
				  	<option value="1" selected="selected">javascript</option>
		            <option value="2">php</option>
		            <option value="3">html</option>
		            <option value="4">css</option>
		            <option value="5">其他</option>
				  <?php
				  break;
				case 2:
				   ?>
				  	<option value="1">javascript</option>
		            <option value="2" selected="selected">php</option>
		            <option value="3">html</option>
		            <option value="4">css</option>
		            <option value="5">其他</option>
				  <?php
				  break;
				case 3:
				  ?>
				  	<option value="1">javascript</option>
		            <option value="2">php</option>
		            <option value="3" selected="selected">html</option>
		            <option value="4">css</option>
		            <option value="5">其他</option>
				  <?php
				  break;
				case 4:
				  ?>
				  	<option value="1">javascript</option>
		            <option value="2">php</option>
		            <option value="3" >html</option>
		            <option value="4" selected="selected">css</option>
		            <option value="5">其他</option>
				  <?php
				  break;
				default:
				  ?>
				  	<option value="1">javascript</option>
		            <option value="2">php</option>
		            <option value="3" >html</option>
		            <option value="4">css</option>
		            <option value="5" selected="selected">其他</option>
				  <?php
				}
			?>
        	
        </select>
        <span class="uk-margin-left">是否公开：</span>
        <label><input type="radio" value="1" name="scope"> 是</label>
        <label><input type="radio" value="2" name="scope"> 否</label>
    </div>
    <div class="uk-form-row">
        <input type="submit" name="submit" class="uk-button" value="update notes" />
    </div> 
</form>