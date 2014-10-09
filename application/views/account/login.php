
<div class="uk-vertical-align uk-text-center uk-height-1-1 uk-width-1-1" >
    <div class="uk-vertical-align-middle" style="width: 250px;">
        <img class="uk-margin-bottom" width="140" height="120" src="http://ybbcdn.qiniudn.com/20140805_1407219645_14571958.png" alt="">
        <?php echo validation_errors(); ?>
        <form class="uk-panel uk-panel-box uk-form" action="<?=$assets ?>/index.php/login" method="post">
        	<input value="<?=$redirect ?>" type="hidden" name="redirect">
            <div class="uk-form-row">
                <input class="uk-width-1-1 uk-form-large" type="text" name="username" placeholder="Username">
            </div>
            <div class="uk-form-row">
                <input class="uk-width-1-1 uk-form-large" type="password" name="password" placeholder="Password">
            </div>
            <div class="uk-form-row">
            	<button class="uk-width-1-1 uk-button uk-button-primary uk-button-large" type="submit">Login</button>
            </div>
            <div class="uk-form-row">
                <a href="/index.php/register" class="uk-float-left uk-link uk-link-muted">Register</a>
                <a class="uk-float-right uk-link uk-link-muted" href="/index.php">Go Home</a>
            </div>
            <!-- <div class="uk-form-row uk-text-small">
                <label class="uk-float-left"><input type="checkbox"> Remember Me</label>
                <a class="uk-float-right uk-link uk-link-muted" href="#">Forgot Password?</a>
            </div> -->
        </form>

    </div>
</div>
