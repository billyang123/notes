
<div class="uk-width-1-1">
	<div class="uk-panel uk-panel-box">
		<div class="uk-panel-title">采集图片</div>
		<form class="uk-form" action="/index.php/upload/sign" method="post" data-remote="true" data-done="$.alert('保存成功！！')" enctype="multipart/form-data">
		<div class="bookmarklet-box uk-grid">
			<div class="uk-width-1-3 preview">
				<div class="images-center" style="width:100%;height:200px;">
					<img src="<?=$media ?>" alt="<?=$title ?>" width="<?=$w?>">
					<input type="hidden" name="imgUrl" value="<?=$media ?>">
					<input type="hidden" name="media_type" value="<?=$media_type?>">
				</div>
			</div>
			<div class="uk-width-2-3">
				<div class="chosen-box uk-form-row">
					<select data-placeholder="请选择(搜索)转交人..." tabindex="3" class="uk-width-1-1 chosen-select" name="albumId">
			            <?php foreach ($album as $item):?>
			            <option value="<?=$item['id']?>"><?=$item['name']?></option>
			            <?php endforeach;?>
			        </select>
				</div>
				<div class="uk-form-row">
	            	<textarea name="description" class="description uk-width-1-1" style="height:124px;" autocomplete="off"><?=$title ?></textarea>
	            </div>
	            <div class="uk-form-row">
	            	<button type="submit" class="uk-button uk-align-right">确定</button>
	            </div>
			</div>
		</div>
		</form>
	</div>
</div>