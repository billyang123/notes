# classic

演示地址：[classic.91wedding.com](http://classic.91wedding.com)

## 使用说明

### 设置数据源地址

在`_config.yml`中，将`data_sources.url`修改为你自己网站的数据源。

比如，如果你的子域名为`forever.91wedding.com`，那么相应的地址应该为：

    http://i.91wedding.com/api/sites/forever/data?version=v1

### 修改网站名称

修改文件`_layouts/default.html`。

### 修改导航栏文字

修改文件`_includes/navigation.html`。

### 设置封面滚动图片

您可以首先将封面滚动图片上传到后台的媒体库中，然后将图片的链接设置在`_includes/home.html`中。

### 修改滚动图片上的欢迎信息

修改文件`_includes/invitation.html`。

### 修改参加婚礼报名模块的文字

修改文件`_includes/wedding.html`。

### 修改地图说明文字

修改文件`_includes/map.html`。

### 设置评论功能

网站默认使用[disqus](http://disqus.com/)评论系统。你可以在disqus上注册帐号，建立站点。然后将`_config.yml`中`disqus_shortname`替换为你在disqus中建立网站的short name即可。

注：您也可以不注册自己的站点，而实用默认的`91wedding`。这样，您将没有权限删除留言。

### 修改婚礼信息侧栏图片

在`_includes/wedding.html`中将`/images/wedding.jpg`替换为你自己图片的链接地址。

### 修改网站底部文字

修改文件`_includes/footer.html`。

### 修改背景音乐

修改文件`_includes/music.html`，将`http://assets.91wedding.com/2/bucket/this-ring.mp3`替换为你自己的mp3的链接地址。

本模板所使用的音乐插件是dewplayer，高级用户可以访问其[主页](http://www.alsacreations.fr/dewplayer-en.html)，进行高级定制。

## 高级功能

### 本地编译和调试

如果进行本地的编译和调试，你需要如下知识：

- html/css基本知识
- git的安装和使用
- 安装ruby解释器(在linux和mac系统中默认就带有ruby解释器)

有了上面的基础，先安装本模板使用的一个静态站点生成器Monad:

```
gem install monad
```

安装后，你就可以通过命令`monad serve`来运行站点了。命令`monad build`可以编译站点。
