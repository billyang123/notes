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