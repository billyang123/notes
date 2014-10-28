<div class="uk-width-medium-1-1">
    <div class="uk-panel uk-panel-box">
		<form class="uk-form uk-form-horizontal" data-remote="true" data-done="$.alert(res.content)" action="<?=$assets?>/index.php/account/updateInfo/<?=$userInfo['id'] ?>" method="post">
			<div class="uk-form-row">
				<label class="uk-form-label" for="form-username">userName</label>
				<div class="uk-form-controls">
		            <input type="text" id="form-username" placeholder="" value="<?=$userInfo['username']?$userInfo['username']:'' ?>" disabled>
		        </div>
			</div>
			<div class="uk-form-row">
				<label class="uk-form-label" for="form-avatar">Upload Avatar</label>
				<div class="uk-form-controls">
					<a href="#my-avatar-modal" class="uk-button uk-button-primary" data-uk-modal>选择</a>
					<div class="avatar-view" id="avatar-view" title="Change the avatar">
						<input value="<?=$userInfo['avatar']?$userInfo['avatar']:'' ?>" name="avatar" type="hidden">
				      	<img src="<?=$userInfo['avatar']?$userInfo['avatar']:('/identicon.php?uid='.$userInfo['username'].'&size=120') ?>">
				    </div>
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
		            <textarea type="text" id="form-intro" placeholder="" name="intro" class="uk-width-1-1"><?=$userInfo['intro']?$userInfo['intro']:'' ?></textarea>
		        </div>
			</div>
			<div class="uk-form-row">
				<button class="uk-button uk-button-primary" type="submit">setting</button>
			</div>
		</form>
	</div>
</div>
<link rel="stylesheet" type="text/css" href="/public/jquerypicturecut/cropper.min.css">
<link rel="stylesheet" type="text/css" href="/public/jquerypicturecut/crop-avatar.css">
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
	                  <div class="uk-width-medium-7-10">
	                    <div class="avatar-wrapper"></div>
	                  </div>
	                  <div class="uk-width-medium-3-10">
	                    <div class="avatar-preview preview-lg"></div>
	                    <div class="avatar-preview preview-md"></div>
	                    <div class="avatar-preview preview-sm"></div>
	                  </div>
	                </div>
	            </div>
	            <div class="uk-modal-footer uk-text-center uk-margin-top">
	              <button class="uk-button uk-button-default uk-modal-close">Close</button>
	              <button class="uk-button uk-button-primary avatar-save" type="submit">Save</button>
	            </div>
            </form>
	    </div>
	</div>
	<div class="loading"></div>
</div>
<script type="text/javascript" src="/public/jquerypicturecut/crop-avatar.js"></script>
<script type="text/javascript" src="/public/jquerypicturecut/cropper.min.js"></script>