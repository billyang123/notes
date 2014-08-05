<form class="uk-form uk-form-horizontal" data-remote="true" action="<?=$assets?>/index.php/account/updateInfo/<?=$userInfo['id'] ?>" method="post">
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-username">userName</label>
		<div class="uk-form-controls">
            <input type="text" id="form-username" placeholder="" value="<?=$userInfo['username']?$userInfo['username']:'' ?>" disabled>
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-emaill">emaill</label>
		<div class="uk-form-controls">
            <input type="text" id="form-emaill" placeholder="" value="<?=$userInfo['email']?$userInfo['email']:'' ?>" name="email">
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-intro">Introduction</label>
		<div class="uk-form-controls">
            <textarea type="text" id="form-intro" placeholder="" name="intro"><?=$userInfo['intro']?$userInfo['intro']:'' ?></textarea>
        </div>
	</div>
	<div class="uk-form-row">
		<button class="uk-button" type="submit">setting</button>
	</div>
</form>