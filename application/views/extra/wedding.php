<!DOCTYPE html>
<html lang="zh-CN">
  <head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <title>杨斌斌和郑红英结婚啦～～</title>
  <link href="<?=$assets ?>/public/wedding/favicon.ico" rel="shortcut icon" />
  <link rel="stylesheet" type="text/css" href="<?=$assets ?>/public/wedding/bootstrap/css/bootstrap.min.css" media="screen">
  <link rel="stylesheet" type="text/css" href="<?=$assets ?>/public/wedding/bootstrap/css/bootstrap-responsive.min.css" media="screen">
  <link rel="stylesheet" href="<?=$assets ?>/public/wedding/prettyphoto/css/prettyPhoto.css" type="text/css" media="screen" title="prettyPhoto main stylesheet" charset="utf-8" />
  <link rel="stylesheet" type="text/css" href="<?=$assets ?>/public/wedding/stylesheets/main.css" media="screen">
  <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <link rel="stylesheet" type="text/css" href="/stylesheets/ie.css" media="screen" />
  <![endif]-->
  <script src="<?=$assets ?>/public/wedding/javascripts/jquery.min.js"></script>
  <script src="<?=$assets ?>/public/wedding/javascripts/jquery.scrollto.min.js"></script>
  <script src="<?=$assets ?>/public/wedding/bootstrap/js/bootstrap.min.js"></script>
  <script src="<?=$assets ?>/public/wedding/prettyphoto/js/jquery.prettyPhoto.js" type="text/javascript" charset="utf-8"></script>
  <script src="<?=$assets ?>/public/wedding/javascripts/jquery.validate.js"></script>
  <script src="<?=$assets ?>/public/wedding/javascripts/main.js"></script>
  </head>

  <body>
  	<!-- navigation -->
    <div class='navigation'>
	  <div class='container'>
	    <div class='menu'>
	      <a href="#home-anchor" class="pull-left" id="logo">
	        杨斌斌
	        <img src="/images/two-hearts.png">
	        郑红英
	      </a>
	      	<object type="application/x-shockwave-flash" data="<?=$assets ?>/public/wedding/images/dewplayer.swf" width="200" height="20" id="dewplayer" style="margin-top: 20px;">
			  <param name="wmode" value="transparent">
			  <param name="movie" value="<?=$assets ?>/public/wedding/images/dewplayer.swf">
			  <param name="flashvars" value="mp3=http://assets.91wedding.com/2/bucket/this-ring.mp3&amp;autostart=1&amp;autoreplay=1&amp;showtime=1" />
			</object>
	      <ul class="pull-right">
	        <li>
	          <a href='#story-anchor'>我们的故事</a>
	        </li>
	        <li>
	          <a href='#photos-anchor'>照片</a>
	        </li>
	        <li>
	          <a href='#wedding-anchor'>婚礼</a>
	        </li>
	        <li>
	          <a href='#map-anchor'>地图</a>
	        </li>
	        <!-- <li>
	          <a href='#comments-anchor'>祝福</a>
	        </li> -->
	      </ul>
	    </div>
	  </div>
	</div>
	<!-- home -->
	<span id="home-anchor" class="anchor">&nbsp;</span>
	<div class="container-fluid" id="home">
	  	<div id="invitation-container" class="well">
		  <h4>杨斌斌和郑红英的婚礼：</h4>
		  <p>
		    <i class="icon-time"></i>
		    2015年04月01日(星期三) 下午5:00
		  </p>
		  <!-- <p>
		    <i class="icon-map-marker"></i>
		    浙江省台州市仙居县横溪镇瑶林农庄
		  </p>
		  <p>
		    <i class="icon-signal"></i>
		    18767101138
		  </p>
		  <p>
		    <i class="icon-envelope"></i>
		    yangbinbin_1226@126.com
		  </p> -->
		</div>
	  <div id="myCarousel" class="carousel slide">
	    <!-- Carousel items -->
	    <div class="carousel-inner">
	    <?php foreach ($result['homeImg'] as $item):?>
	      <div class="item">
	        <img src="<?=$item ?>" class="cover-image">
	      </div>
	    <?php endforeach;?>
	    </div>
	    <!-- Carousel nav -->
	    <a class="carousel-control left" href="#myCarousel" data-slide="prev">&lsaquo;</a>
	    <a class="carousel-control right" href="#myCarousel" data-slide="next">&rsaquo;</a>
	  </div>
	</div>
	<!-- story -->
	<span id="story-anchor" class="anchor">&nbsp;</span>
	<div class="container section" id="story">
	  <h2>他们的故事</h2>
	  <div id="timeline-embed"></div>
	  <script type="text/javascript">
	    var timeline_config = {
	        width:              '100%',
	        height:             '600',
	        css:                '<?=$assets ?>/public/wedding/timeline/css/timeline.css',
	        js:                 '<?=$assets ?>/public/wedding/timeline/js/timeline-min.js',
	        source:             <?=json_encode($result['dataLine']) ?>
	    }
	  </script>
	  <script type="text/javascript" src="<?=$assets ?>/public/wedding/timeline/js/storyjs-embed.js"></script>
	</div>
	<!-- photos -->
	<span id="photos-anchor" class="anchor">&nbsp;</span>
	<div class="container section" id="photos">
		<div class="btn-group" data-toggle="buttons-radio">
		<?php foreach ($result['album'] as $i=>$item):?>
			<a href="#photos-pane-<?=($i+1)?>" type="button" data-toggle="tab" class="btn<?=($i==0?' active':'')?>"><?=$item['name']?></a>
		<?php endforeach;?>
		</div><br/>
	  <div class="tab-content">
	  	<?php foreach ($result['album'] as $i=>$item):?>
	  		<div class="tab-pane<?=($i==0?' active':'')?>" id="photos-pane-<?=($i+1)?>">
				<ul class="thumbnails gallery">
		          <?php foreach ($item['photos'] as $k=>$pp):?>
		          <li>
		            <a href="<?=$pp['full']?>" class="thumbnail" rel="prettyPhoto[<?=($i+1)?>]"><img src="<?=$pp['thumb']?>"/></a>
		          </li>
		          <?php endforeach;?>
		        </ul>
		    </div>
		<?php endforeach;?>
	  </div>
	</div>
	<!-- wedding -->
	<span id="wedding-anchor" class="anchor">&nbsp;</span>
	<div class="container section" id="wedding">
	  <div class="row-fluid">
	    <div class="span4 offset1">
	      <h2>婚礼</h2>
	      <h4>女方：</h4>
	      <p>
	        <i class="icon-time"></i>
	        2015年04月01日(星期三) 中午10:30
	      </p>
	      <p>
	        <i class="icon-map-marker"></i>
	        浙江省杭州建德市寿昌镇大塘边河村83号
	      </p>
	      <h4>男方：</h4>
	      <p>
	        <i class="icon-time"></i>
	        2015年04月01日(星期三) 下午05:00
	      </p>
	      <p>
	        <i class="icon-map-marker"></i>
	        浙江省台州市仙居县横溪镇瑶林农庄
	      </p>
	      <!-- <p>
	        <i class="icon-retweet"></i>
	        地铁2号线孝陵卫站3号出站口向东150米
	        <br/>
	      </p>
	      <p>
	        <i class="icon-retweet"></i>
	        乘坐游2在大栅栏站下
	      </p>
	      <p>
	        <i class="icon-plane"></i>
	        我们将与非南京市的宾客联系，安排食宿
	      </p>
	      <p>
	        <i class="icon-envelope"></i>
	        liufengyunchina@gmail.com
	      </p>
	      <p>
	        <i class="icon-signal"></i>
	        13814171931(刘) 13951665846(王)
	      </p>
	      <br/>
	      <h4>欢迎来参加我们的婚礼！</h4> -->
	    </div>
	    <div class="span6">
	      <img src="http://7xifjq.com1.z0.glb.clouddn.com/081.jpg" />
	    </div>
	  </div>
	  </div>
	</div>
	<!-- map -->
	<span id="map-anchor" class="anchor">&nbsp;</span>
	<div class="container section" id="map">
	  <h2>地图</h2>
	  <div class="row-fluid">
	    <div class="span12">
	      <!--百度地图容器-->
	      <div id="dituContent"></div>

	      <br/>
	      <br/>

	      <p><strong>说明：</strong></p>
	      <p>
	        <i class="icon-retweet"></i>
	        婚礼前一天男方到达中转站<strong>杭州建德市健康北路</strong>的家
	      </p>
	      <p>
	        <i class="icon-retweet"></i>
	        第二天10点去<strong>寿昌镇大塘边河村83号</strong>接亲，举行仪式
	      </p>
	      <p>
	        <i class="icon-retweet"></i>
	        13点出发到男方家
	      </p>
	      <p>
	        <i class="icon-retweet"></i>
	        15点半到男方家
	      </p>
	      <!-- <p>
	        <i class="icon-plane"></i>
	        我们将与非南京市的宾客联系，安排食宿
	      </p>
	      <p>
	        <i class="icon-envelope"></i>
	        liufengyunchina@gmail.com
	      </p>
	      <p>
	        <i class="icon-signal"></i>
	        13814171931(刘) 13951665846(王)
	      </p> -->

	    </div>
	  </div>
	</div>

	<script type="text/javascript">

	  function makeMarker(latitude, longitude, title, content) {
	    var marker = new BMap.Marker(new BMap.Point(longitude, latitude));  //创建标注
	    var label = new BMap.Label(title, {'offset': new BMap.Size(20,3)}); //创建标签

	    label.setStyle({
	      borderColor: "#999",
	      color: "red",
	      "font-weight": "bold"
	    });

	    marker.setLabel(label);
	    var infoWindow = new BMap.InfoWindow("<b class='iw_poi_title'>" + title + "</b>"
	        + "<div class='iw_poi_content'>" + content + "</div>"); //创建信息窗口
	    marker.addEventListener("click", function(){this.openInfoWindow(infoWindow);});
	    return marker;
	  }

	  function showMap(){
	    var map = new BMap.Map("dituContent");
	    var point = new BMap.Point(<?=$result['map']['longitude']?>, <?=$result['map']['latitude']?>);
	    map.centerAndZoom(point, <?=$result['map']['zoom']?>); //设置地图中心坐标
	    map.addControl(new BMap.NavigationControl());  //添加默认缩放平移控件

	    var markers = <?=json_encode($result['map']['markers'])?>;

	    for (var i = 0; i < markers.length; i++) {
	      var marker = markers[i];
	      map.addOverlay(makeMarker(marker.latitude, marker.longitude, marker.title, marker.content));
	    }
	  }
	</script>
	<!-- comments -->
	<!-- <span id="comments-anchor" class="anchor">&nbsp;</span>
	<div class="container section" id="comments">
	  <h2>留言祝福</h2>
	  <div class="media">
		  <div class="media-left">
		    <a href="#">
		      <img class="media-object" src="..." alt="...">
		    </a>
		  </div>
		  <div class="media-body">
		    <h4 class="media-heading">Media heading</h4>
		    ...
		  </div>
		</div>
	</div> -->
	<!-- footer -->
	<div class='container'>
		<footer>
		  <div class="pull-left">
		    <a href="http://www.ybbnotes.com" target="_blank">杨斌斌的笔记</a> &copy; 2015 all rights reserved.
		  </div>
		</footer>
	</div>

  </body>
</html>
