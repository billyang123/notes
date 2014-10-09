<div class="uk-width-1-1">
	<ul class="uk-subnav uk-subnav-pill">
        <li class="uk-active"><a href="/index.php/media">Album</a></li>
        <li class=""><a href="/index.php/media/photo">Photo</a></li>
        <li class=""><a href="/index.php/media/video">Video</a></li>
    </ul>
    <div class="uk-grid" data-uk-grid-margin="">
        <div class="uk-width-medium-2-3">
                    
            <button class="uk-button" data-uk-modal="{target:'#createAlbum'}">Create Album</button>
            <div id="createAlbum" class="uk-modal">
                <div class="uk-modal-dialog">
                    <a class="uk-modal-close uk-close"></a>
                    <form action="<?=$assets?>/index.php/media/createAlbum" class="uk-form uk-clearfix uk-form-horizontal" data-remote="true" action="" method="post" data-done="">
                        <fieldset>
                            <input value="<?=$user['userId']?>" name="userId" type="hidden">
                            <input value="<?=$user['username']?>" name="userName" type="hidden">
                            <legend>Create Album</legend>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="form-album-name">Name</label>
                                <div class="uk-form-controls">
                                    <input type="text" id="form-album-name" name="albumName" placeholder="Text input">
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="form-album-description">Description</label>
                                <div class="uk-form-controls">
                                    <textarea name="albumDescription" rows="5" cols="30" id="form-album-description" placeholder="textarea"></textarea>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="form-album-description">Album Cover</label>
                                <div class="uk-form-controls">
                                    <input type="text" id="form-album-cover" name="albumCover" placeholder="">
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="form-album-limits">limits of authority</label>
                                <div class="uk-form-controls">
                                    <select id="form-album-limits" name="albumLimits">
                                        <option value="public">public</option>
                                        <option value="personal">personal</option>
                                    </select>
                                </div>
                            </div>
                            <div class="uk-form-row">
                                <label class="uk-form-label" for="form-album-save"></label>
                                <div class="uk-form-controls">
                                    <button type="submit" class="uk-button" id="form-album-save">submit</button>
                                </div>
                            </div>
                        </fieldset>
                    </form>
                </div>
            </div>
        </div>        
    </div>         
    <div class="uk-grid" data-uk-grid-margin="">
        <?php foreach ($content as $item):?>
        <div class="uk-width-medium-1-3">
            <a class="uk-thumbnail" href="/index.php/media/album/<?=$item['id']?>">
                <img width="600" height="400" src="<?=$item["cover"]?$item["cover"]:'data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K' ?>" alt="">
            </a>
            <p class="uk-text-center"><?=$item["name"]?></p>
        </div>
        <?php endforeach;?>
     </div> 
</div>

