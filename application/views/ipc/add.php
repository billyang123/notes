<div class="uk-width-medium-1-1">
	<div class="uk-panel-box">
		<h3>数据：</h3>
		<form class="uk-form uk-form-horizontal" action="<?=$assets?>/index.php/ipc/<?=$uptype ?>" method="POST" data-remote="true" data-done="$.alert(res.content)">
			<div class="uk-form-row">
				<input type="hidden" value="<?=$user['userId']?>" name="userId">
				<textarea style="width: 100%;" name="value" rows="20" placeholder="输入json数据"></textarea>
			</div>	
			<div class="uk-form-row uk-text-center">
				<button type="submit" class="uk-button uk-button-large uk-button-primary" type="button">保存数据</button>
			</div>	
		</form>
	</div>
</div>