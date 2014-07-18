<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8" />
        <meta name="apple-touch-fullscreen" content="yes"/>
        <meta content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0" name="viewport" />
        <meta content="yes" name="apple-mobile-web-app-capable" />
        <meta content="black" name="apple-mobile-web-app-status-bar-style" />
        <meta name="format-detection" content="telephone=no" />

        <title>Amap</title>
        <style type="text/css">  
html{height:100%}  
body{height:100%;margin:0px;padding:0px}  
#container{height:100%}  

    .my-layer {
        width: 200px;
        height: 100px;
        background: #ccc;
    }
</style>  

        <script src="http://webapi.amap.com/maps?v=1.2&key=5dd4ff0cfe836cb99b3c54d6a0833155" type="text/javascript"></script>

    </head>

    <body>

        <div id="container"></div>  

        <script type="text/javascript" src="http://g.tbcdn.cn/mtb/zepto/1.0.4/zepto.js"></script>
        <script type="text/javascript" src="http://g.tbcdn.cn/mtb/lib-amap/1.0.1/amap.js"></script>
        <script type="text/javascript">
            var map = new lib.AMap({
                container: 'container',
                autoPosition: false
            });

            map.moveTo(120, 30).addLayer({
                id: 'test',
                lon: 120,
                lat: 30,
                content: '<div class="my-layer">我是测试用的... <a href="http://www.taobao.com">Taobao</a></div>'
            });

            $('#container').on('click', '.my-layer', function (e) {
                $(e.target).css({
                    background: 'red'
                });
            });
        </script>
        
    </body>
</html>