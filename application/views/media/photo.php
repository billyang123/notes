<div class="uk-width-1-1">
    <ul class="uk-subnav uk-subnav-pill">
        <li><a href="/index.php/media">Album</a></li>
        <li class="uk-active"><a href="/index.php/media/photo">Photo</a></li>
        <li class=""><a href="/index.php/media/video">Video</a></li>
    </ul>
            <div class="uk-grid" data-uk-grid-margin="">
                <?php foreach ($content as $item):?>
                <div class="uk-width-medium-1-6" style="height:194px;">
                    <a class="uk-thumbnail uk-overlay-toggle uk-width-medium-1-1" data-uk-modal="{target:'#modal-<?=$item["id"]?>'}">
                        <div class="uk-overlay uk-align-center">
                            <img src="<?=$item["path"]?>" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-<?=$item['id']?>" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img src="<?=$item["path"]?>" alt="">
                        </div>
                    </div>
                </div>
                <?php endforeach;?>
            </div>
</div>