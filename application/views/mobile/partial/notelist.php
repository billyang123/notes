
<!-- We don't need full layout here, because this page will be parsed with Ajax-->
<!-- Top Navbar-->
<div class="navbar">
  <div class="navbar-inner">
    <div class="left"><a href="#" class="back link"> <i class="icon icon-back"></i><span>返回</span></a></div>
    <div class="center sliding">笔记</div>
    <div class="right">
      <!-- Right link contains only icon - additional "icon-only" class--><a href="#" class="link icon-only open-panel"> <i class="icon icon-bars"></i></a>
    </div>
  </div>
</div>
<div class="pages">
	
  <!-- Page, data-page contains page name-->
  	<div data-page="notelist" class="page">
		<div class="page-content infinite-scroll" data-distance="100">
			<!-- <div class="content-block-title">笔记列表</div> -->
			<div class="list-block media-list">
			  <ul>
			  	<?php foreach ($content as $item):?>
			  	<li>
			      <a href="/index.php/mobile/note/<?=$item["id"] ?>" class="item-link item-content">
			        <div class="item-inner">
			          <div class="item-title-row">
			            <div class="item-title"><?=$item["title"] ?></div>
			            <div class="item-after"><?=date("Y-m-d H:i:s",$item["create_date"]) ?></div>
			          </div>
			          <div class="item-subtitle"><?=$item["userName"] ?></div>
			          <div class="item-text"><?=strip_tags($item["content"]) ?></div>
			        </div>
			      </a>
			    </li>
				<?php endforeach;?>

			  </ul>
			</div>
			<!-- 加载提示符 -->
		  <div class="infinite-scroll-preloader">
		    <div class="preloader"></div>
		  </div>
		</div>
	</div>
</div>