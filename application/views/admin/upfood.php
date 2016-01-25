<?php if ($type=="editor"):?>
	<div class="uk-width-medium-1-1">
	    <div class="uk-panel uk-panel-box">
			<form class="uk-form uk-form-horizontal" data-remote="true" action="/index.php/admin/footUp" method="post" id="addFootForm">
			    <fieldset data-uk-margin>
			        <legend>食物搭配禁忌</legend>
			        <div class="uk-form-row">
			        	<input type="hidden" name="id" value="<?=$id?>">
			        	<label class="uk-form-label" for="form-h-name">食品名</label>
			        	<div class="uk-form-controls">
	                        <input type="text" id="form-h-name" name="name" value="<?=$name?>" placeholder="请输入食品名称">
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<label class="uk-form-label" for="form-h-formatname">禁配忌搭</label>
			        	<div class="uk-form-controls">
	                        <input type="text" id="form-h-formatname" name="formtname" value="<?=$matchName?>" placeholder="请输入禁配忌搭">
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<label class="uk-form-label" for="form-h-result">后果</label>
			        	<div class="uk-form-controls">
			        		<textarea id="form-h-t" cols="60" rows="5" name="description" placeholder="请输入禁配忌搭后果"><?=$effect?></textarea>
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<div class="uk-text-center">
			        		<button class="uk-button" type="submit">保存</button>
			        	</div>
			        </div>
			    </fieldset>
			</form>
		</div>
	</div>
<?php else:?>
	<div class="uk-width-medium-1-1">
	    <div class="uk-panel uk-panel-box">
			<form class="uk-form uk-form-horizontal" data-remote="true" action="/index.php/admin/footUp" method="post" id="addFootForm">
			    <fieldset data-uk-margin>
			        <legend>食物搭配禁忌</legend>
			        <div class="uk-form-row">
			        	<label class="uk-form-label" for="form-h-name">食品名</label>
			        	<div class="uk-form-controls">
	                        <input type="text" id="form-h-name" name="name" value="" placeholder="请输入食品名称">
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<label class="uk-form-label" for="form-h-formatname">禁配忌搭</label>
			        	<div class="uk-form-controls">
	                        <input type="text" id="form-h-formatname" name="formtname" placeholder="请输入禁配忌搭">
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<label class="uk-form-label" for="form-h-result">后果</label>
			        	<div class="uk-form-controls">
			        		<textarea id="form-h-t" cols="60" rows="5" name="description" placeholder="请输入禁配忌搭后果"></textarea>
	                    </div>
			        </div>
			        <div class="uk-form-row">
			        	<div class="uk-text-center">
			        		<button class="uk-button" type="submit">保存</button>
			        	</div>
			        </div>
			    </fieldset>
			</form>
		</div>
	</div>
<?php endif;?>
<script>
	(function($){
		var tm;
		$("#addFootForm").on("ajax:success",function(e,res){
			if(res.success){
				$.alert("保存成功");
				tm && clearTimeout(tm);
				tm = setTimeout(function(){
					window.location.href = '/index.php/extra/food';
				},4000)
			}
		})
	})(jQuery)
</script>