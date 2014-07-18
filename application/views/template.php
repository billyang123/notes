<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?=$title ?></title>
    <link rel="stylesheet" type="text/css" href="<?=$assets ?>/public/app.css">
    <script type="text/javascript" src="<?=$assets ?>/public/app.js"></script>
    <script>require('main');</script>
</head> 
<body class="uk-width-1-1 <?php if($nav=="login"): ?>_login-body<?php endif ?>">
	<div class="uk-container uk-container-center uk-margin-top uk-margin-large-bottom">
		<?php if($nav!="login"): ?>
		<nav class="uk-navbar uk-margin-large-bottom">
		    <a class="uk-navbar-brand uk-hidden-small" href="/">Personal notes</a>
		    <ul class="uk-navbar-nav uk-hidden-small">
		    	<?php foreach($nav_list  as $i => $nav_item): ?>
			    	<?php if($nav_item=="notes"): ?>
					<li class="<?= ($nav == $nav_item ? 'uk-active' : '')?>" data-uk-dropdown="{mode:'click'}">
						<a href="javascript:void(0)"><?=ucwords($nav_item) ?></a>
						<div class="uk-dropdown">
							<ul class="uk-nav uk-nav-dropdown">
								<li><a href="<?=$assets ?>/index.php/notes">All Notes</a></li>
								<li><a href="<?=$assets ?>/index.php/public">Public</a></li>
								<li><a href="<?=$assets ?>/index.php/personal">Personal</a></li>
							</ul>
						</div>
					</li>
					<?php else: ?>
					<li class="<?= ($nav == $nav_item ? 'uk-active' : '')?>">
						<a href="<?=$assets ?>/index.php/<?=$nav_item ?>"><?=ucwords($nav_item) ?></a>
					</li>
					<?php endif ?>
				<?php endforeach ?>
		    </ul>
		    <div class="uk-navbar-flip">
		        <ul class="uk-navbar-nav">
		        	<li data-uk-dropdown="{mode:'click'}">
		        
		        		<a href="javascript:void(0)" title="<?=($user['is_login']?$user['username']:"Account") ?>">
		        			<i class="uk-icon-user uk-icon-small"></i>
		        			<?php $account = $user['is_login']?$user['username']:"Account"; ?>
		        			<?=(count($account)>10 ? substr($account,0,10)."..." : $account) ?>
		        			<i class="uk-icon-caret-down"></i>
		        		</a>
		        		
			        	<div class="uk-dropdown">
							<ul class="uk-nav uk-nav-dropdown">
								<li><a href="<?=$assets ?>/index.php/register"><i class="uk-icon-plus-circle"></i>   Register</a></li>
								<li><a href="#"><i class="uk-icon-trash-o"></i>   Settings</a></li>
								<?php if($user['is_login']): ?>
					            <li><a href="<?=$assets ?>/index.php/logout"><i class="uk-icon-sign-out"></i>    Logout</a></li>
					        	<?php else: ?>
					        	<li><a href="<?=$assets ?>/index.php/login"><i class="uk-icon-sign-in"></i>   Login</a></li>
					            <?php endif ?>
							</ul>
						</div>
					</li>
		        </ul>
			</div>
		    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
		    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">notes</div>
		</nav>
		<?php endif ?>
		<div class="uk-grid">
		    <?=$content_for_template ?>
		</div>
	</div>
	<?php if($nav!="login"): ?>
	<div id="offcanvas" class="uk-offcanvas">
        <div class="uk-offcanvas-bar">
            <ul class="uk-nav uk-nav-offcanvas">
                <?php foreach($nav_list  as $i => $nav_item): ?>
				<li class="<?= ($nav == $nav_item ? 'uk-active' : '')?>">
					<a href="/<?=$nav_item ?>"><?=$nav_item ?></a>
				</li>
				<?php endforeach ?>
            </ul>
        </div>
    </div>
    <?php endif ?>
</body>   
</html>