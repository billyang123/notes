<?php foreach ($content as $item):?>
<li>
	<p class="uk-clearfix">
		<a class="uk-float-left" href="<?=$assets?>/index.php/notes/<?=$item["id"] ?>"><?=$item["title"] ?></a>
		<span class="uk-float-right"><?=date("Y-m-d H:i:s",$item["create_date"]) ?></span>
	</p>

</li>
<?php endforeach;?>
<? if ($pageNum < $totalPage):?>
	<li>
		<p class="uk-clearfix uk-text-center">
			<a href="/index.php/home?p=<?=$pageNum+1?>" data-remote="true" data-done="$(this).closest('li').replaceWith(res)">显示更多..</a>
		</p>
	</li>
<? endif;?>