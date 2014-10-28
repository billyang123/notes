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
				      <img src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMjAwcHgiIGhlaWdodD0iMjAwcHgiIHZpZXdCb3g9IjAgMCAyMDAgMjAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAyMDAgMjAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSIyMDAiIGhlaWdodD0iMjAwIi8+DQo8Zz4NCgk8cGF0aCBmaWxsPSIjRDhEOEQ4IiBkPSJNMTgyLjI1NiwxNjUuNzk2Yy0wLjgzNi00LjY3Ny0xLjg5Ni05LjAwNy0zLjE3Mi0xMy4wMDFjLTEuMjc3LTMuOTk2LTIuOTk1LTcuODg4LTUuMTU0LTExLjY4Ng0KCQljLTIuMTU4LTMuNzkzLTQuNjMxLTcuMDI4LTcuNDI3LTkuNzA1Yy0yLjgwMS0yLjY3NC02LjIxMy00LjgxMi0xMC4yNDctNi40MDljLTQuMDM1LTEuNTk3LTguNDg4LTIuMzk2LTEzLjM1OS0yLjM5Ng0KCQljLTAuNzE5LDAtMi4zOTYsMC44NTgtNS4wMzIsMi41NzNjLTIuNjM2LDEuNzIyLTUuNjEyLDMuNjM4LTguOTI3LDUuNzVjLTMuMzE2LDIuMTE4LTcuNjMxLDQuMDM1LTEyLjk0LDUuNzUzDQoJCWMtNS4zMTIsMS43MTktMTAuNjQ2LDIuNTc2LTE1Ljk5NiwyLjU3NmMtNS4zNTIsMC0xMC42ODQtMC44NTctMTUuOTk2LTIuNTc2Yy01LjMxNC0xLjcxOC05LjYyOS0zLjYzNS0xMi45NC01Ljc1Mw0KCQljLTMuMzE5LTIuMTEyLTYuMjkxLTQuMDI4LTguOTI3LTUuNzVjLTIuNjM2LTEuNzE1LTQuMzEyLTIuNTczLTUuMDMzLTIuNTczYy00Ljg3NiwwLTkuMzI5LDAuNzk5LTEzLjM2MSwyLjM5Ng0KCQljLTQuMDMzLDEuNTk4LTcuNDUxLDMuNzM1LTEwLjI0Miw2LjQwOWMtMi44MDEsMi42NzctNS4yNzMsNS45MTItNy40Myw5LjcwNWMtMi4xNTcsMy43OTgtMy44NzcsNy42ODgtNS4xNTMsMTEuNjg2DQoJCWMtMS4yNzgsMy45OTQtMi4zMzcsOC4zMjQtMy4xNzcsMTMuMDAxYy0wLjgzNyw0LjY3MS0xLjM5OCw5LjAyNC0xLjY3NywxMy4wNmMtMC4yNzksNC4wMzMtMC40MTksOC4xNy0wLjQxOSwxMi4zOTkNCgkJYzAsMy4xNCwwLjM0NSw2LjA0LDAuOTY5LDguNzQ1aDE2Ni43NzFjMC42MjUtMi43MDUsMC45NzItNS42MDUsMC45NzItOC43NDVjMC00LjIyOS0wLjE0MS04LjM2Ni0wLjQyMi0xMi4zOTkNCgkJQzE4My42NTQsMTc0LjgyLDE4My4wOTYsMTcwLjQ2NywxODIuMjU2LDE2NS43OTZ6Ii8+DQoJPHBhdGggZmlsbD0iI0Q4RDhEOCIgZD0iTTEwMCwxMzAuMjY4YzEyLjcsMCwyMy41NDQtNC40OTQsMzIuNTMzLTEzLjQ3OWM4Ljk4NC04Ljk4OCwxMy40NzktMTkuODMsMTMuNDc5LTMyLjUzMg0KCQljMC0xMi43MDItNC40OTQtMjMuNTQzLTEzLjQ3OS0zMi41MzFDMTIzLjU0NCw0Mi43MzgsMTEyLjcsMzguMjQzLDEwMCwzOC4yNDNzLTIzLjU0Nyw0LjQ5NS0zMi41MzEsMTMuNDgxDQoJCWMtOC45ODksOC45ODgtMTMuNDgxLDE5LjgyOS0xMy40ODEsMzIuNTMxYzAsMTIuNzAyLDQuNDkyLDIzLjU0NCwxMy40ODEsMzIuNTMyQzc2LjQ1MywxMjUuNzczLDg3LjMsMTMwLjI2OCwxMDAsMTMwLjI2OHoiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="Avatar">
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
<script type="text/javascript" src="/public/jquerypicturecut/crop-avatar.js"></script>
<script type="text/javascript" src="/public/jquerypicturecut/cropper.min.js"></script>