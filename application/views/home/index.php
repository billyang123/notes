<div class="uk-width-medium-1-1">
	<div class="uk-vertical-align uk-text-center" style="background: url('http://ybbcdn.qiniudn.com/QrhZFbv.gif') 50% bottom no-repeat;margin-bottom:10px;background-size: 100%;">
        <div class="uk-vertical-align-middle" style="width:565px;">
            <h1 class="uk-heading-large" style="color:#FFF;">Dribs and drabs</h1>
            <p class="uk-text-large uk-text-overflow" style="color:#FFF;">Belong to your notes.Need create your own account</p>
            <p>
               	<a class="uk-button uk-button-primary uk-button-large" href="/index.php/login">Login</a>
                <a class="uk-button uk-button-large" href="/index.php/register">Register</a>
            </p>
        </div>
    </div>
</div>
<div class="uk-width-medium-3-4">
	<div class="uk-width-medium-1-1 uk-panel-box">
		<h3 class="uk-panel-title"><i class="uk-icon-list"></i>   Articles</h3>
		<ul class="uk-list uk-list-line">
			<?php foreach ($content as $item):?>
			<li>
				<p class="uk-clearfix">
					<a class="uk-float-left" href="<?=$assets?>/index.php/notes/<?=$item["id"] ?>"><?=$item["title"] ?></a>
					<span class="uk-float-right"><?=date("Y-m-d H:i:s",$item["create_date"]) ?></span>
				</p>

			</li>
			<?php endforeach;?>
			<li>
				<p class="uk-clearfix uk-text-center">
					<a href="/index.php/home?p=2" data-remote="true" data-done="$(this).closest('li').replaceWith(res)">显示更多..</a>
				</p>
			</li>
		</ul>
	</div>
</div>
<div class="uk-width-medium-1-4">
		<!-- <div class="uk-panel uk-panel-box uk-text-center">
	        <img class="uk-border-circle" width="120" height="120" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iMTIwcHgiIGhlaWdodD0iMTIwcHgiIHZpZXdCb3g9IjAgMCAxMjAgMTIwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCAxMjAgMTIwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGRkZGRkYiIHdpZHRoPSIxMjAiIGhlaWdodD0iMTIwIi8+DQo8Zz4NCgk8cGF0aCBmaWxsPSIjRTBFMEUwIiBkPSJNMTA5LjM1NCw5OS40NzhjLTAuNTAyLTIuODA2LTEuMTM4LTUuNDA0LTEuOTAzLTcuODAxYy0wLjc2Ny0yLjM5Ny0xLjc5Ny00LjczMi0zLjA5My03LjAxMQ0KCQljLTEuMjk0LTIuMjc2LTIuNzc4LTQuMjE3LTQuNDU1LTUuODIzYy0xLjY4MS0xLjYwNC0zLjcyOS0yLjg4Ny02LjE0OC0zLjg0NmMtMi40MjEtMC45NTgtNS4wOTQtMS40MzgtOC4wMTctMS40MzgNCgkJYy0wLjQzMSwwLTEuNDM3LDAuNTE2LTMuMDIsMS41NDVjLTEuNTgxLDEuMDMyLTMuMzY3LDIuMTgyLTUuMzU1LDMuNDVjLTEuOTksMS4yNzEtNC41NzgsMi40MjEtNy43NjUsMy40NTENCgkJQzY2LjQxLDgzLjAzNyw2My4yMSw4My41NTIsNjAsODMuNTUyYy0zLjIxMSwwLTYuNDEtMC41MTUtOS41OTgtMS41NDZjLTMuMTg4LTEuMDMtNS43NzctMi4xODEtNy43NjUtMy40NTENCgkJYy0xLjk5MS0xLjI2OS0zLjc3NC0yLjQxOC01LjM1NS0zLjQ1Yy0xLjU4Mi0xLjAyOS0yLjU4OC0xLjU0NS0zLjAyLTEuNTQ1Yy0yLjkyNiwwLTUuNTk4LDAuNDc5LTguMDE3LDEuNDM4DQoJCWMtMi40MiwwLjk1OS00LjQ3MSwyLjI0MS02LjE0NiwzLjg0NmMtMS42ODEsMS42MDYtMy4xNjQsMy41NDctNC40NTgsNS44MjNjLTEuMjk0LDIuMjc4LTIuMzI2LDQuNjEzLTMuMDkyLDcuMDExDQoJCWMtMC43NjcsMi4zOTYtMS40MDIsNC45OTUtMS45MDYsNy44MDFjLTAuNTAyLDIuODAzLTAuODM5LDUuNDE1LTEuMDA2LDcuODM1Yy0wLjE2OCwyLjQyMS0wLjI1Miw0LjkwMi0wLjI1Miw3LjQ0DQoJCWMwLDEuODg0LDAuMjA3LDMuNjI0LDAuNTgyLDUuMjQ3aDEwMC4wNjNjMC4zNzUtMS42MjMsMC41ODItMy4zNjMsMC41ODItNS4yNDdjMC0yLjUzOC0wLjA4NC01LjAyLTAuMjUzLTcuNDQNCgkJQzExMC4xOTIsMTA0Ljg5MywxMDkuODU3LDEwMi4yOCwxMDkuMzU0LDk5LjQ3OHoiLz4NCgk8cGF0aCBmaWxsPSIjRTBFMEUwIiBkPSJNNjAsNzguMTZjNy42MiwwLDE0LjEyNi0yLjY5NiwxOS41Mi04LjA4OGM1LjM5Mi01LjM5Myw4LjA4OC0xMS44OTgsOC4wODgtMTkuNTE5DQoJCXMtMi42OTYtMTQuMTI2LTguMDg4LTE5LjUxOUM3NC4xMjYsMjUuNjQzLDY3LjYyLDIyLjk0Niw2MCwyMi45NDZzLTE0LjEyOCwyLjY5Ny0xOS41MTksOC4wODkNCgkJYy01LjM5NCw1LjM5Mi04LjA4OSwxMS44OTctOC4wODksMTkuNTE5czIuNjk1LDE0LjEyNiw4LjA4OSwxOS41MTlDNDUuODcyLDc1LjQ2NCw1Mi4zOCw3OC4xNiw2MCw3OC4xNnoiLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
	        <h3>Author Name</h3>
	        <p>Lorem ipsum dolor sit amet, consectetur adipisici elit, sed eiusmod tempor incidunt ut.</p>
	    </div> -->
		<div class="uk-panel uk-panel-box">
	        <!--<h3 class="uk-panel-title">Latest Articles</h3>
	        <ul class="uk-list uk-list-line">
	        	<?php foreach (array_slice($content,0,10) as $item):?>
	            <li><a href="#"><?=$item["title"] ?></a></li>
	            <?php endforeach;?>
	        </ul>-->
	        
	        <h3 class="uk-panel-title"><i class="uk-icon-leaf"></i>   classify</h3>
	        <div class="notes-tags">
	            <?php foreach ($classify as $item):?>
	            <a href="/index.php/notes/?class=<?=$item['id']?>"><?=$item['name']?></a>
	            <?php endforeach;?>
	        </div>
	        <h3 class="uk-panel-title"><i class="uk-icon-tags"></i>   tags</h3>
	        <div class="notes-tags">
	            <?php foreach ($tags as $item):?>
	            <a href="/index.php/notes/?tagName=<?=$item['tag_name']?>"><?=$item['tag_name']?></a>
	            <?php endforeach;?>
	        </div>
	        <h3 class="uk-panel-title"><i class="uk-icon-link"></i>   Social Links</h3>
	        <ul class="uk-list uk-list-line">            
	            <li><a href="http://wowubuntu.com/markdown/">Markdown</a></li>
	            <li><a href="https://github.com/">GitHub</a></li>
	            <li><a href="http://craig.is/making/rainbows">rainbows</a></li>
	            <li><a href="http://getbootstrap.com/">bootstrap</a></li>
	        </ul>
	    </div>
</div>
