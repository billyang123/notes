<script type="text/javascript" src="<?=$assets?>/public/plupload/js/plupload.full.min.js"></script>
<script type="text/javascript" src="<?=$assets?>/public/plupload/js/jquery.plupload.queue/jquery.plupload.queue.min.js"></script>
<link type="text/css" rel="stylesheet" href="<?=$assets?>/public/plupload/js/jquery.plupload.queue/css/jquery.plupload.queue.css" media="screen">
<?=$token ?>
<div class="uk-width-1-1">
	<ul class="uk-subnav uk-subnav-pill" data-uk-switcher="{connect:'#switcher-content'}">
        <li class="uk-active"><a href="#">相册</a></li>
        <li class=""><a href="#">照片</a></li>
        <li class=""><a href="#">视频</a></li>
        <li class=""><a href="#">App</a></li>
    </ul>

    <ul id="switcher-content" class="uk-switcher">

        <li class="uk-active">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    
                    <button class="uk-button" data-uk-modal="{target:'#createAlbum'}">新建相册</button>
                    <div id="createAlbum" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <a class="uk-modal-close uk-close"></a>
                            <form action="<?=$assets?>/index.php/media/createAlbum" class="uk-form uk-clearfix uk-form-horizontal" data-remote="true" action="" method="post" data-done="$.UIkit.notify(res)">
                                <fieldset>
                                    <input value="<?=$user['userId']?>" name="userId" type="hidden">
                                    <input value="<?=$user['username']?>" name="userName" type="hidden">
                                    <legend>创建相册</legend>
                                    <div class="uk-form-row">
                                        <label class="uk-form-label" for="form-album-name">相册名称</label>
                                        <div class="uk-form-controls">
                                            <input type="text" id="form-album-name" name="albumName" placeholder="Text input">
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <label class="uk-form-label" for="form-album-description">相册描述</label>
                                        <div class="uk-form-controls">
                                            <textarea name="albumDescription" rows="5" cols="30" id="form-album-description" placeholder="textarea"></textarea>
                                        </div>
                                    </div>
                                    <div class="uk-form-row">
                                        <label class="uk-form-label" for="form-album-limits">权限</label>
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
                                            <button type="submit" class="uk-button" id="form-album-save">提交</button>
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
                    <a class="uk-thumbnail">
                        <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                    </a>
                    <p class="uk-text-center"><?=$item["name"]?></p>
                </div>
                <?php endforeach;?>
             </div> 
        </li>

        <li class="">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <button class="uk-button" data-uk-modal="{target:'#uploadContainer'}">上传照片</button>
                    <div id="uploadContainer" class="uk-modal">
                        <div class="uk-modal-dialog">
                            <a class="uk-modal-close uk-close"></a>
                            <form id="upload_form">
                                <div id="uploader">
                                    <p>Your browser doesn't have Flash, Silverlight or HTML5 support.</p>
                                </div>
                            </form>
                        </div>
                    </div> 
                </div>
            </div>
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-10'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-10" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-11'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-11" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-12'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-12" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
            </div>

            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-13'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-13" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-14'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-14" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-15'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-15" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
            </div>
        </li>

        <li class="">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-16'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-16" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-17'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-17" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-18'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-18" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
             </div>

             <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-19'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-19" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-20'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-20" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
             </div>
        </li>

        <li class="">
            <div class="uk-grid" data-uk-grid-margin="">
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-21'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-21" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
                <div class="uk-width-medium-1-3">
                    <a class="uk-thumbnail uk-overlay-toggle" data-uk-modal="{target:'#modal-22'}">
                        <div class="uk-overlay">
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                            <div class="uk-overlay-area"></div>
                        </div>
                    </a>
                    <div id="modal-22" class="uk-modal">
                        <div class="uk-modal-dialog uk-modal-dialog-frameless">
                            <a href="" class="uk-modal-close uk-close uk-close-alt"></a>
                            <img width="600" height="400" src="data:image/svg+xml;base64,PD94bWwgdmVyc2lvbj0iMS4wIiBlbmNvZGluZz0idXRmLTgiPz4NCjwhLS0gR2VuZXJhdG9yOiBBZG9iZSBJbGx1c3RyYXRvciAxNi4wLjQsIFNWRyBFeHBvcnQgUGx1Zy1JbiAuIFNWRyBWZXJzaW9uOiA2LjAwIEJ1aWxkIDApICAtLT4NCjwhRE9DVFlQRSBzdmcgUFVCTElDICItLy9XM0MvL0RURCBTVkcgMS4xLy9FTiIgImh0dHA6Ly93d3cudzMub3JnL0dyYXBoaWNzL1NWRy8xLjEvRFREL3N2ZzExLmR0ZCI+DQo8c3ZnIHZlcnNpb249IjEuMSIgaWQ9IkViZW5lXzEiIHhtbG5zPSJodHRwOi8vd3d3LnczLm9yZy8yMDAwL3N2ZyIgeG1sbnM6eGxpbms9Imh0dHA6Ly93d3cudzMub3JnLzE5OTkveGxpbmsiIHg9IjBweCIgeT0iMHB4Ig0KCSB3aWR0aD0iNjAwcHgiIGhlaWdodD0iNDAwcHgiIHZpZXdCb3g9IjAgMCA2MDAgNDAwIiBlbmFibGUtYmFja2dyb3VuZD0ibmV3IDAgMCA2MDAgNDAwIiB4bWw6c3BhY2U9InByZXNlcnZlIj4NCjxyZWN0IGZpbGw9IiNGNUY1RjUiIHdpZHRoPSI2MDAiIGhlaWdodD0iNDAwIi8+DQo8ZyBvcGFjaXR5PSIwLjciPg0KCTxwYXRoIGZpbGw9IiNEOEQ4RDgiIGQ9Ik0yMjguMTg0LDE0My41djExM2gxNDMuNjMydi0xMTNIMjI4LjE4NHogTTM2MC4yNDQsMjQ0LjI0N0gyNDAuNDM3di04OC40OTRoMTE5LjgwOEwzNjAuMjQ0LDI0NC4yNDcNCgkJTDM2MC4yNDQsMjQ0LjI0N3oiLz4NCgk8cG9seWdvbiBmaWxsPSIjRDhEOEQ4IiBwb2ludHM9IjI0Ni44ODEsMjM0LjcxNyAyNzEuNTcyLDIwOC43NjQgMjgwLjgyNCwyMTIuNzY4IDMxMC4wMTYsMTgxLjY4OCAzMjEuNTA1LDE5NS40MzQgDQoJCTMyNi42ODksMTkyLjMwMyAzNTQuNzQ2LDIzNC43MTcgCSIvPg0KCTxjaXJjbGUgZmlsbD0iI0Q4RDhEOCIgY3g9IjI3NS40MDUiIGN5PSIxNzguMjU3IiByPSIxMC43ODciLz4NCjwvZz4NCjwvc3ZnPg0K" alt="">
                        </div>
                    </div>
                </div>
             </div>
        </li>

    </ul>
</div>
<script type="text/javascript">
// Initialize the widget when the DOM is ready
$(function() {
    // Setup html5 version
    $("#uploader").pluploadQueue({
        // General settings
        runtimes : 'html5,flash,silverlight,html4',
        url : "<?=$assets?>/index.php/upload",
        
        chunk_size : '1mb',
        rename : true,
        dragdrop: true,
        
        filters : {
            // Maximum file size
            max_file_size : '10mb',
            // Specify what files to browse for
            mime_types: [
                {title : "Image files", extensions : "jpg,gif,png"},
                {title : "Zip files", extensions : "zip"}
            ]
        },

        // Resize images on clientside if we can
        resize: {
            width : 200, 
            height : 200, 
            quality : 90,
            crop: true // crop to exact dimensions
        },


        // Flash settings
        flash_swf_url : '/js/Moxie.swf',
    
        // Silverlight settings
        silverlight_xap_url : '/js/Moxie.xap'
    });
    $("#upload_form").submit(function(e){
        var uploader = $("#uploader").pluploadQueue();
        if(uploader.total.uploaded == 0){
            if(uploader.files.length > 0){
                uploader.bind("uploadProgress",function(){
                    if(uploader.total.uploaded == uploader.files.length){
                        $("#upload_form").submit();
                    }
                })
                uploader.start();
            }else{
                alert('Your must at least upload one file.');
                e.preventDefault();
            }
        }
    })
});
</script>