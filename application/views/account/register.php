<div class="uk-width-medium-1-1">
    <div class="uk-panel uk-panel-box">
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
				<label class="uk-form-label" for="form-avatar">Upload Avatar</label>
				<div class="uk-form-controls">
					<a href="#my-avatar-modal" class="uk-button uk-button-primary" data-uk-modal>选择</a>
					<div class="avatar-view" id="avatar-view" title="Change the avatar">
						<input value="" name="avatar" type="hidden">
				      <img src="#" alt="Avatar">
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
		            <textarea type="text" id="form-intro" placeholder="" name="intro" class="uk-width-1-1"></textarea>
		        </div>
			</div>
			<div class="uk-form-row">
				<button class="uk-button uk-button-primary" type="submit">register</button>
			</div>
		</form>
		<?php echo (validation_errors()=='')?'':'<div class="uk-alert uk-alert-danger"><a href="" class="uk-alert-close uk-close"></a>'.validation_errors().'</div>'; ?>
	</div>
</div>
<div class="container" id="crop-avatar">

    <!-- Current avatar -->
    <!-- <div class="avatar-view" title="Change the avatar">
      <img src="#" alt="Avatar">
    </div> -->
    <div id="my-avatar-modal" class="uk-modal">
    	
	    <div class="uk-modal-dialog uk-modal-dialog-large">
	        <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
	        <form class="avatar-form" method="post" action="/index.php/account/cropavatar" enctype="multipart/form-data">
		        <div class="uk-modal-header">
	              <h3>change avatar</h3>
	            </div>
		        <div class="avatar-body">
	                <!-- Upload image and data -->
	                <div class="avatar-upload">
	                  <input class="avatar-src" name="avatar_src" type="hidden">
	                  <input class="avatar-data" name="avatar_data" type="hidden">
	                  <label for="avatarInput">Local upload</label>
	                  <input class="avatar-input" id="avatarInput" name="avatar_file" type="file">
	                </div>
	                <!-- Crop and preview -->
	                <div class="uk-grid">
	                  <div class="uk-width-7-10">
	                    <div class="avatar-wrapper"></div>
	                  </div>
	                  <div class="uk-width-3-10">
	                    <div class="avatar-preview preview-lg"></div>
	                    <div class="avatar-preview preview-md"></div>
	                    <div class="avatar-preview preview-sm"></div>
	                  </div>
	                </div>
	            </div>
	            <div class="uk-modal-footer uk-text-center">
	              <button class="uk-button uk-button-default uk-modal-close">Close</button>
	              <button class="uk-button uk-button-primary avatar-save" type="submit">Save</button>
	            </div>
            </form>
	    </div>
	</div>
	<div class="loading"></div>
</div>
<link rel="stylesheet" type="text/css" href="/public/jquerypicturecut/cropper.min.css">
<link rel="stylesheet" type="text/css" href="/public/jquerypicturecut/crop-avatar.css">
<script type="text/javascript" src="/public/jquerypicturecut/crop-avatar.js"></script>
<script type="text/javascript" src="/public/jquerypicturecut/cropper.min.js"></script>
<script type="text/javascript">
$(document).ready(function(){

    

})

</script>