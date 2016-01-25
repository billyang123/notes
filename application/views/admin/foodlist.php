<div class="uk-width-medium-1-1">
    <div class="uk-panel uk-panel-box">
    	<div class="uk-text-right">
    		<a href="/index.php/admin/food" class="uk-button">添加</a>
    	</div>
		<table class="uk-table">
		    <caption>食物搭配禁忌</caption>
		    <thead>
		        <tr>
		            <th>食品名</th>
		            <th>禁配忌搭</th>
		            <th>后果</th>
		            <th>操作</th>
		        </tr>
		    </thead>
		    <tbody>
		    <?php foreach ($content as $item):?>
		    	<tr>
		            <td><?=$item["name"]?></td>
		            <td><?=$item["matchName"]?></td>
		            <td><?=$item["effect"]?></td>
		        	<td>
		        		<a href="/index.php/admin/food/<?=$item["id"]?>" class="uk-button">编辑</a>
		        	</td>
		        </tr>
		    <?php endforeach;?>
		    </tbody>
		</table>
	</div>
</div>