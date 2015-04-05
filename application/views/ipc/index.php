<div class="uk-width-medium-1-1">
	<div class="uk-panel-box">
		<h3>数据：</h3>
		<form class="uk-form uk-form-horizontal" action="<?=$assets?>/index.php/ipc/update" method="POST" data-remote="true" data-done="$.alert(res.content)">
			<div class="uk-form-row">
				<textarea style="width: 100%;" name="value" rows="20" placeholder="输入json数据"></textarea>
			</div>	
		</form>
	</div>
</div>