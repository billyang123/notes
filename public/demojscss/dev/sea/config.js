(function() {
    var root = this;
    var config = {
        base:"http://staticjscss.renhe.cn/patform",
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

            //bootstrap
            "tab":'bootstrap/tab',
            "dropdown":'bootstrap/dropdown',
            "bootstrap":'bootstrap/index',
            
            "dataBind":'dataBind/index',

            //css
            "animateCss":'css/animate.css'
        },
        paths: {
            //"patform":"http://staticjscss.renhe.cn/patform"
        },
        comboSyntax: ["??", ","],
        comboMaxLength: 500,
        preload: [
            //"common"
        ],
        map: [],
        charset: 'utf-8',
        timeout: 20000,
        debug: true
    };
    if (root.seajs) {
        root.seajs.config(config);
    }
    return config;
}).call(this);