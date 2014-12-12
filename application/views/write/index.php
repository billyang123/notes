<script type="text/javascript" src="<?=$assets?>/public/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$assets?>/public/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" media="screen">

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
                <p><i class="uk-icon-info-circle uk-icon-small"></i>      Notes written in Markdown syntax requirements, please refer to <a href="http://wowubuntu.com/markdown/" target="_blank">Markdown</a> syntax concrete syntax. </p>
                <textarea id="markdownarea" name="content" style="width:100%;">code highlighting please use following as &lt;pre&gt;&lt;code data-language="javascript"&gt;var i = 0&lt;/code&gt;&lt;/pre&gt;</textarea>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">分类</label>
                <div class="uk-form-controls">
                    <select name="type">
                        <?php foreach ($classify as $item):?>
                        <option value="<?=$item['id']?>"><?=$item['name']?></option>
                        <?php endforeach;?>
                    </select>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">是否公开</label>
                <div class="uk-form-controls">
                    <label><input type="radio" value="1" name="scope" checked> 是</label>
                    <label><input type="radio" value="0" name="scope"> 否</label>
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label" for="form-s-t">标签</label>
                <div class="uk-form-controls">
                    <input type="text" class="uk-width-1-1 js-tags-complete" name="tagsStr" value="">
                </div>
            </div>
            <div class="uk-form-row">
                <label class="uk-form-label">附件</label>
                <div class="uk-form-controls">
                    <textarea style="display: none" name="attachments" id="fileId"></textarea>
                    <a class="uk-button" href="javascript:void(0);" data-uk-modal="{target:'#uploadContainer'}"><i class="uk-icon-plus"></i>   select files</a>
                    <ul class="filebox uk-list"></ul>
                    <div class="uk-alert" data-uk-alert>
                        <a href="" class="uk-alert-close uk-close"></a>
                        <p>只支持图片（jpg,gif,png）和压缩包（zip,rar），不能超过10M</p>
                    </div>
                </div>
            </div>
            <div class="uk-form-row">
                <button type="submit" name="submit" class="uk-button uk-button-primary uk-align-center">Create news</button>
            </div> 
        </form>
    </div>
</div>
<div id="uploadContainer" class="uk-modal">
    <div class="uk-modal-dialog uk-modal-dialog-large">
        <a class="uk-modal-close uk-close"></a>
        <form id="upload_form" class="uk-form uk-form-horizontal" method="POST" enctype="multipart/form-data">
            <div id="uploader">
                <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
            </div>
        </form>
    </div>
</div>
<script type="text/javascript">require("write_index");</script>

