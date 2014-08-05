<form method="post" action="http://up.qiniu.com/" enctype="multipart/form-data">
      <input name="key" type="hidden" value="<?=$key?>">
      
      <input name="token" type="hidden" value="<?=$token?>">
      <input name="file" type="file" />
      <button class="uk-button" type="submit">upload</button>
</form>
