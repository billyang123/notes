
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class="navbar">
  <div class="navbar-inner">
    <div class="left"><a href="#" class="back link"> <i class="icon icon-back"></i><span>返回</span></a></div>
    <div class="center sliding">笔记</div>
    <div class="right">
      <a href="#"  data-panel="right" class="link icon-only open-panel"> <i class="icon icon-form-name"></i></a>
    </div>
  </div>
</div>
<div class="pages">	
  <!-- Page, data-page contains page name-->
  	<div data-page="note" class="page">
		<div class="page-content">
			<div class="card facebook-card">
				<div class="card-header no-border"><?=$content["title"] ?></div>
			  <div class="card-header no-border">
			    <div class="facebook-avatar">
			    	<?php if($com_user['avatar']): ?>
			        <img src="<?=$com_user['avatar'] ?>" width="34" height="34">
			        <?php else: ?>
					<img src="/identicon.php?uid=<?=$com_user['userName'] ?>&size=34" width="34" height="34">
			        <?php endif; ?>
			    </div>
			    <div class="facebook-name"><?=$com_user['userName'] ?></div>
			    <div class="facebook-date"><?=date("Y-m-d H:i:s",$content["create_date"]) ?></div>
			  </div>
			  <div class="card-content">
			  	<div class="card-content-inner">
			  		<?=parse_markdown($content["content"]) ?>
		            <?php if ($content["attachments"]):?>
		            <textarea style="display:none;" class="js-files-string"><?=$content["attachments"] ?></textarea>
		            <?php endif; ?>
		        </div>
			  </div>
			  <div class="card-footer no-border">
			    <a href="#" class="link">Like</a>
			    <a href="#" class="link">Comment</a>
			    <a href="#" class="link">Share</a>
			  </div>
			</div>
		</div>
		<script id="userInfoComent" type="text/html">
			<?php if($com_user['avatar']): ?>
	        <img class="border-circle" src="<?=$com_user['avatar'] ?>" width="220">
	        <?php else: ?>
	        <img class="border-circle" src="/identicon.php?uid=<?=$com_user['userName'] ?>&size=220">
	        <?php endif; ?>
	        <div class="list-block">
		        <p class="list-block-label">作者:<br><?=$com_user['userName'] ?></p>
		        <p class="list-block-label">E-mail:<br><?=$com_user['email'] ?></p>
		        <p class="list-block-label">介绍:<br><?=$com_user['intro'] ?></p>
		    </div>
		</script>
	</div>
</div>
