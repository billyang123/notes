<body>
    <?php if ($id):?>
        <?php if ($userId==$data['user_id']):?>
        <h2>demo 编辑</h2>
        <form class="form-horizontal" action="<?=$assets ?>/index.php/demo/up/<?=$id ?>" method="post" data-remote="true" data-done="window.location.href='<?=$assets ?>/index.php/demo'">

          <div class="form-group">
            <label class="col-sm-2 control-label">demo描述</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" placeholder="demo描述" name="demo_name" value="<?=$data['demo_name'] ?>">
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">导航编辑</label>
            <div class="col-sm-10">
                <textarea class="form-control" rows="3" name="extra_text" placeholder="导航编辑（html片段）"><?=$data['extra_text'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <label class="col-sm-2 control-label">demo内容</label>
            <div class="col-sm-10">
              <textarea class="form-control" rows="30" name="content" placeholder="demo内容（html片段）"><?=$data['content'] ?></textarea>
            </div>
          </div>
          <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
              <button type="submit" class="btn btn-default">提交</button>
            </div>
          </div>
        </form>
        <?php else: ?>
        <div class="alert alert-warning" role="alert"><?=$username ?>，你好！当前demo你没有权限修改。</div>
        <?php endif; ?>
    <?php else: ?>
    <h2>demo 新增</h2>
    <form class="form-horizontal" action="<?=$assets ?>/index.php/demo/up" method="post" data-remote="true" data-done="window.location.href='<?=$assets ?>/index.php/demo'">
      <div class="form-group">
        <label class="col-sm-2 control-label">demo描述</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" placeholder="demo描述" name="demo_name">
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">导航编辑</label>
        <div class="col-sm-10">
            <textarea class="form-control" rows="3" name="extra_text" placeholder="导航编辑（html片段）"></textarea>
        </div>
      </div>
      <div class="form-group">
        <label class="col-sm-2 control-label">demo内容</label>
        <div class="col-sm-10">
          <textarea class="form-control" rows="3" name="content" placeholder="demo内容（html片段）"></textarea>
        </div>
      </div>
      <div class="form-group">
        <div class="col-sm-offset-2 col-sm-10">
          <button type="submit" class="btn btn-default">提交</button>
        </div>
      </div>
    </form>
    <?php endif; ?>
    <script>
    seajs.use(["jquery","rails","autosize"],function($,_,textareaAutoSize){
        textareaAutoSize($('textarea'));
    })
    </script>
</body>
</html>