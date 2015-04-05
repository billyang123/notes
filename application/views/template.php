<!DOCTYPE html>
<html lang="en-gb" dir="ltr">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="my notes,我的个人笔记,创建自己的个人笔记，博客；markdown编写笔记，chrome插件收集图片，技术博客">
    <title><?=$title ?></title>
    <link rel="shortcut icon" href="/favicon.ico" type="image/x-icon">
    <link rel="stylesheet" type="text/css" href="<?=$assets ?>/public/app.css">
    <script type="text/javascript" src="<?=$assets ?>/public/app.js"></script>
    <script>require('main');</script>

</head>
<body class="uk-width-1-1 mubg<?php if($nav=="login"): ?> _login-body<?php endif ?>">
	<div class="uk-container uk-container-center uk-margin-top">
		<?php if($nav!="login" && $nav!="bookmarklet"): ?>
		<nav class="uk-navbar uk-margin-bottom notes-header" id="Top">
		    <a class="uk-navbar-brand uk-hidden-small" href="/"><i class="uk-icon-home uk-icon-small"></i>note</a>
		    <ul class="uk-navbar-nav uk-hidden-small">
		    	<?php foreach($nav_list  as $i => $nav_item): ?>
			    	<li class="<?= ($nav == $nav_item ? 'uk-active' : '')?>">
						<a href="<?=$assets ?>/index.php/<?=$nav_item ?>"><?=ucwords($nav_item) ?></a>
					</li>
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
								<li><a href="<?=$assets ?>/index.php/setting"><i class="uk-icon-trash-o"></i>   Settings</a></li>
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
			<div class="uk-navbar-flip">
				<div class="uk-navbar-content">
		        	<form class="uk-search" action="/index.php/notes/search" data-uk-search="{source:'/index.php/notes/search'}">
					    <input class="uk-search-field" name="key" type="search" placeholder="">
					    <button class="uk-search-close" type="reset"></button>
					</form>
		        </div>
		    </div>
		    <a href="#offcanvas" class="uk-navbar-toggle uk-visible-small" data-uk-offcanvas=""></a>
		    <div class="uk-navbar-brand uk-navbar-center uk-visible-small">notes</div>
		</nav>
		<?php endif ?>
	</div>
	<div class="uk-container uk-container-center uk-margin-large-bottom">
		<div class="uk-grid notes-main">
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
    <?php if($nav!="login" && $nav!="bookmarklet"): ?>
    <div class="uk-container-center uk-margin-large-top notes-footer">
		<footer>
			<div class="uk-container uk-container-center uk-text-center">
				<!-- <ul class="uk-subnav uk-subnav-line">
					<li><a href="https://github.com/billyang123/notes" target="_blank" rel="nofollow">GitHub</a></li>
                    <li><a href="https://github.com/billyang123/notes" target="_blank" rel="nofollow">GitHub</a></li>
                    <li><a href="https://github.com/billyang123/notes/issues" target="_blank" rel="nofollow">问题反馈</a></li>
                   	<li><a href="https://github.com/uikit/uikit/blob/master/CHANGELOG.md" target="_blank" rel="nofollow">更新日志</a></li>
                    <li><a href="http://weibo.com/u/2383340037" target="_blank" rel="nofollow">新浪微博</a></li>
                    <li>
                    	<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253123138'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253123138%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
						<a href="http://www.cnzz.com/stat/website.php?web_id=1253123138" target="_blank">网站统计</a>
					</li>
                </ul> -->
				<span>© 2014 - 2014 Bill Yang Coding with Pleasure</span>
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1253123138'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s95.cnzz.com/z_stat.php%3Fid%3D1253123138%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
			</div>
		</footer>
	</div>
	<?php endif ?>
	<a href="#Top" id="goToTop" class="uk-button" data-uk-smooth-scroll=""><i class="uk-icon-chevron-up"></i></a>
	<a href="#bottom" id="goToBottom" class="uk-button" data-uk-smooth-scroll=""><i class="uk-icon-chevron-down"></i></a>
	<span id="bottom"></span>
</body>   
</html>