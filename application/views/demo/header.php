<!DOCTYPE html>
<html lang="en">
<head>
    <title>人和前端</title>
    <meta name="keywords" content="人和前端" />
    <meta name="description" content="人和前端" />
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="<?=$assets ?>/public/demojscss/dev/sea/sea.js"></script>
    <script>window.baseVar = {assetsPath:"<?=$assets ?>/public/demojscss/dev"}</script>
    <script>
    seajs.config({
        base:"<?=$assets ?>/public/demojscss/dev",
        alias: {
            //var
            "$": 'jquery/jquery-1-8-3',
            "jquery": 'jquery/jquery-1-8-3',
            "jqueryui":'jqueryui/index',
            // plugins
            "rails": 'rails/index',
            "pagination":'pagination/jquery-pagination',
            "autosize":'autosize/textarea-autosize',
            "validate":'validate/index',
            "template":'template/index',
            "selectize":'selectize/index',
            "cxSelect":'cxSelect/index',
            "uploader":'uploader/index',
            "jqPaginator":'pagination/jqPaginator',
            "rainbow":'Rainbow/index',

            //bootstrap
            "tab":'bootstrap/tab',
            "dropdown":'bootstrap/dropdown',
            "bootstrap":'bootstrap/index',
            
            "dataBind":'dataBind/index',

            //css
            "animateCss":'css/animate.css'
        }
    })
    </script>
    <link rel="stylesheet" href="<?=$assets ?>/public/demojscss/dev/css/bootstrap.css">
</head>