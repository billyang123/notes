<div class="uk-width-medium-1-1">
    <div class="uk-panel uk-panel-box">
		<table class="uk-table">
		    <caption>账户列表</caption>
		    <thead>
		        <tr>
		            <th>序号</th>
		            <th>账户</th>
		            <th>邮箱</th>
		            <th>时间</th>
		            <th>介绍</th>
		            <th>操作</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($content as $item):?>
		    	<?php if ($item["auth"]!="10001"):?>
		    	<tr>
		            <td><?=$item["id"]?></td>
		            <td><?=$item["username"]?></td>
		            <td><?=$item["email"]?></td>
		            <td><?=date("Y-m-d H:i:s",$item["create_date"]) ?></td>
		            <td><?=$item["intro"]?></td>
		            <td>
		            <?php if ($item["auth"]=="0"):?>
		            	<a class="uk-button uk-button-primary" data-remote="true" data-done="$.alert(res.content)" href="/index.php/account/pass/<?=$item["id"]?>">通过</a>
		            <?php else:?>

						<a class="uk-button uk-button-danger" data-remote="true" data-done="$.alert(res.content)" href="/index.php/account/nopass/<?=$item["id"]?>">禁用</a>
		            <?php endif;?>
		            </td>
		        </tr>
		        <?php endif;?>
		    <?php endforeach;?>
		    </tbody>
		</table>
	</div>
</div>