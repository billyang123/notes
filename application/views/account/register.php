<?php echo validation_errors(); ?>
<form class="uk-form uk-form-horizontal" action="<?=$assets?>/index.php/account/register" method="post">
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-username">userName</label>
		<div class="uk-form-controls">
            <input type="text" id="form-username" placeholder="" name="username">
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-password">passWord</label>
		<div class="uk-form-controls">
            <div class="uk-form-password">
		        <input type="password" id="form-password" placeholder="" name="password">
		        <a href="" class="uk-form-password-toggle" data-uk-form-password>show</a>
		    </div>
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-password">Password Confirm</label>
		<div class="uk-form-controls">
            <div class="uk-form-password">
		        <input type="password" id="form-password" placeholder="" name="passconf">
		        <a href="" class="uk-form-password-toggle" data-uk-form-password>show</a>
		    </div>
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-email">Email</label>
		<div class="uk-form-controls">
            <input type="text" id="form-email" placeholder="" name="email">
        </div>
	</div>
	<div class="uk-form-row">
		<label class="uk-form-label" for="form-intro">Introduction</label>
		<div class="uk-form-controls">
            <textarea type="text" id="form-intro" placeholder="" name="intro"></textarea>
        </div>
	</div>
	<div class="uk-form-row">
		<button class="uk-button" type="submit">register</button>
	</div>
</form>