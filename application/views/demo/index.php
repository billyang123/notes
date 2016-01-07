<body>
    <style>
        .affix {
            position: fixed;
        }
        .bs-docs-sidebar.affix {
            position: fixed;
            top: 20px;
            width: 213px;
        }
        .bs-docs-sidebar {
            padding-left: 20px;
        }
        .bs-docs-sidebar .nav .nav {
            display: none;
            padding-bottom: 10px;
            margin-left: 10px;
        }
        .bs-docs-sidebar .nav>.active>ul {
            display: block;
        }
        .bs-docs-sidebar .nav>li>a {
            display: block;
            padding: 4px 20px;
            font-size: 13px;
            font-weight: 500;
            color: #767676;
        }
        .bs-docs-sidebar .nav .nav>.active:focus>a, .bs-docs-sidebar .nav .nav>.active:hover>a, .bs-docs-sidebar .nav .nav>.active>a {
            padding-left: 28px;
            font-weight: 500;
        }
        .bs-docs-sidebar .nav>.active:hover>a, .bs-docs-sidebar .nav>.active>a {
            padding-left: 18px;
            font-weight: 700;
            color: #563d7c;
            background-color: transparent;
            border-left: 2px solid #563d7c;
            text-decoration: none;
        }
        .bs-docs-sidebar .nav .nav>li>a {
            padding-top: 1px;
            padding-bottom: 1px;
            padding-left: 30px;
            font-size: 12px;
            font-weight: 400;
        }
        .container {
            width: 100%;
        }
        </style>
    <body data-spy="scroll" data-target="#navbar-example">
    <div class="row">
        <div class="container">
            <div class="col-md-9">
                <h2 id="paginationDemo"><i class="glyphicon glyphicon-link"></i>分页组件</h2>
                <div class="wrap">
                    <h3 id="jqPaginator"><i class="glyphicon glyphicon-paperclip"></i> jqPaginator</h3>
                    <div class="pagination" id="pagination"></div>
                    <div id="pagination-text"></div>
                    <h4>javascript:</h4>
                    <pre><code data-language="javascript">
                    seajs.use("jqPaginator",function(){
                        $("#pagination").jqPaginator({
                            totalPages: 100,
                            visiblePages: 10,
                            currentPage: 1,
                            first:'&lt;li class="first">&lt;a href="javascript:void(0);">首页&lt;/a>&lt;/li>',
                            prev:'&lt;li class="prev">&lt;a href="javascript:void(0);">&lt;i class="arrow arrow2"></i>上一页</a></li>',
                            next:'&lt;li class="next">&lt;a href="javascript:void(0);">下一页&lt;i class="arrow arrow3"></i></a></li>',
                            last:'&lt;li class="last">&lt;a href="javascript:void(0);">末页&lt;/a></li>',
                            page:'&lt;li class="page">&lt;a href="javascript:void(0);">{{page}}&lt;/a></li>',
                            onPageChange: function (n) {
                                $("#pagination-text").html("当前第" + n + "页");
                            }
                        });
                    })
                    </code></pre>
                    <h4>html</h4>
                    <pre><code data-language="html">
                    <div class="pagination" id="pagination"></div>
                    </code></pre>
                    <script>
                    seajs.use(["jqPaginator"],function(){
                        $("#pagination").jqPaginator({
                            totalPages: 100,
                            visiblePages: 10,
                            currentPage: 1,
                            first: '<li class="first"><a href="javascript:void(0);">首页<\/a><\/li>',
                            prev: '<li class="prev"><a href="javascript:void(0);"><i class="arrow arrow2"><\/i>上一页<\/a><\/li>',
                            next: '<li class="next"><a href="javascript:void(0);">下一页<i class="arrow arrow3"><\/i><\/a><\/li>',
                            last: '<li class="last"><a href="javascript:void(0);">末页<\/a><\/li>',
                            page: '<li class="page"><a href="javascript:void(0);">{{page}}<\/a><\/li>',
                            onPageChange: function (n) {
                                $("#pagination-text").html("当前第" + n + "页");
                            }
                        });
                    })
                    </script>
                </div>
                <div class="wrap">
                    <h3 id="pagekkpager"><i class="glyphicon glyphicon-paperclip"></i> kkpager</h3>
                    <div class="kkpager" id="kkpager"></div>
                    <div id="kkpager-text"></div>
                    <h4>javascript:</h4>
                    <h5>1、使用link模式</h5>
                    <pre><code data-language="javascript">
                    seajs.use(["pagination/kkpager","pagination/kkpager_blue.css"],function(kkpager){
                        //生成分页控件  
                        kkpager.generPageHtml({
                            pno : '${p.pageNo}',
                            mode : 'link', //可选，默认就是link
                            //总页码  
                            total : '${p.totalPage}',  
                            //总数据条数  
                            totalRecords : '${p.totalCount}',  
                            //链接前部  
                            hrefFormer : '${hrefFormer}',
                            //链接尾部  
                            hrefLatter : '${hrefLatter}',
                            //链接算法
                            getLink : function(n){
                                //这里是默认算法，算法适用于比如：
                                //hrefFormer=http://www.xx.com/news/20131212
                                //hrefLatter=.html
                                //那么首页（第1页）就是http://www.xx.com/news/20131212.html
                                //第2页就是http://www.xx.com/news/20131212_2.html
                                //第n页就是http://www.xx.com/news/20131212_n.html
                                if(n == 1){
                                    return this.hrefFormer + this.hrefLatter;
                                }
                                return this.hrefFormer + '_' + n + this.hrefLatter;
                            }

                        });
                    })
                    </code></pre>
                    <p>getLink 参数需要按需要重写。</p>
                    <h5>2、使用click模式（自定义跳转函数）</h5>
                    <pre><code data-language="javascript">
                    seajs.use(["pagination/kkpager","pagination/kkpager_blue.css"],function(kkpager){
                        //生成分页控件  
                        kkpager.generPageHtml({
                            pno : '${p.pageNo}',
                            mode : 'click', //设置为click模式
                            //总页码  
                            total : '${p.totalPage}',  
                            //总数据条数  
                            totalRecords : '${p.totalCount}',
                            //点击页码、页码输入框跳转、以及首页、下一页等按钮都会调用click
                            //适用于不刷新页面，比如ajax
                            click : function(n){
                                //这里可以做自已的处理
                                //...
                                //处理完后可以手动条用selectPage进行页码选中切换
                                this.selectPage(n);
                            },
                            //getHref是在click模式下链接算法，一般不需要配置，默认代码如下
                            getHref : function(n){
                                return '#';
                            }

                        });
                    })
                    </code></pre>
                    <h4>html</h4>
                    <pre><code data-language="html">
                    <div class="kkpager" id="kkpager"></div>
                    </code></pre>
                    <script>
                    seajs.use(["pagination/kkpager","pagination/kkpager_blue.css"],function(kkpager){
                        kkpager.generPageHtml({
                            pagerid:"kkpager",
                            pno : 1,
                            //总页码
                            total : 25,
                            //总数据条数
                            totalRecords : 100,
                            mode : 'click',//默认值是link，可选link或者click
                            click : function(n){
                                // do something
                                //手动选中按钮
                                this.selectPage(n);
                                return false;
                            }
                        });
                    })
                    </script>
                </div>
                <h2 id="cxSelectDemo"><i class="glyphicon glyphicon-link"></i>联动组件</h2>
                <div class="wrap">
                    <h3 id="cxSelect-cityData"><i class="glyphicon glyphicon-paperclip"></i> 国内省市区联动</h3>
                    <div class="form-inline" id="cxSelect_id_1"> 
                      <select class="form-control province"></select> 
                      <select class="form-control city"></select> 
                      <select class="form-control area"></select> 
                    </div> 
                    <h4>javascript:</h4>
                    <pre><code data-language="javascript">
                    seajs.use(["cxSelect/cityData","cxSelect/index"],function(cityData){
                        $('#cxSelect_id_1').cxSelect({ 
                          url: cityData,
                          selects: ['province', 'city', 'area'],
                          nodata: 'none' 
                        }); 
                    })
                    </code></pre>
                    <h4>html</h4>
                    <pre><code data-language="html">
                    <div class="form-inline" id="cxSelect_id_1"> 
                        <select class="form-control province"></select> 
                        <select class="form-control city"></select> 
                        <select class="form-control area"></select> 
                    </div> 
                    </code></pre>
                    <script>
                    seajs.use(["cxSelect/cityData","cxSelect/index"],function(cityData){
                        $('#cxSelect_id_1').cxSelect({ 
                          url: cityData,
                          selects: ['province', 'city', 'area'],
                          nodata: 'none' 
                        }); 
                    })
                    </script>
                </div>
                <div class="wrap">
                    <h3 id="cxSelect-globalLocation"><i class="glyphicon glyphicon-paperclip"></i> 全球主要国家城市联动</h3>
                    <div class="form-inline" id="global_location"> 
                          <select class="form-control country"></select> 
                          <select class="form-control state"></select> 
                          <select class="form-control city"></select> 
                          <select class="form-control region"></select> 
                    </div> 
                    <h4>javascript:</h4>
                    <pre><code data-language="javascript">
                    seajs.use(["cxSelect/globalData","cxSelect/index"],function(globalData){
                        $('#global_location').cxSelect({ 
                          url: globalData,
                          selects: ['country', 'state', 'city',"region"],
                          nodata: 'none' 
                        }); 
                    })
                    </code></pre>
                    <h4>html</h4>
                    <pre><code data-language="html">
                    <div class="form-inline" id="global_location"> 
                        <select class="form-control country"></select> 
                        <select class="form-control state"></select> 
                        <select class="form-control city"></select> 
                        <select class="form-control region"></select> 
                    </div> 
                    </code></pre>
                    <script>
                    seajs.use(["cxSelect/globalData","cxSelect/index"],function(globalData){
                        $('#global_location').cxSelect({ 
                          url: globalData,
                          selects: ['country', 'state', 'city',"region"],
                          nodata: 'none' 
                        }); 
                    })
                    </script>
                </div>
                <div class="wrap">
                    <h3 id="cxSelect-custom"><i class="glyphicon glyphicon-paperclip"></i> 自定义选项</h3>
                    <div class="form-inline" id="custom_data"> 
                        <select class="form-control first"></select> 
                        <select class="form-control second"></select> 
                        <select class="form-control third"></select> 
                        <select class="form-control fourth"></select>
                        <select class="form-control fifth"></select>  
                    </div> 
                    <h4>javascript:</h4>
                    <pre><code data-language="javascript">
                    seajs.use(["cxSelect/index"],function(globalData){
                        $('#custom_data').cxSelect({ 
                          selects: ['first', 'second', 'third', 'fourth', 'fifth'], 
                          jsonName: 'name', 
                          jsonValue: 'value', 
                          jsonSub: 'sub', 
                          url: [ 
                            {
                                name:'A',
                                value: '1',
                                sub: [
                                    {
                                        name: 'A-1',
                                        value: '2',
                                        sub: [
                                            {
                                                name: 'A-1-1', 
                                                value: '11'
                                            },
                                            {
                                                name: 'A-1-2', 
                                                value: '12',
                                                sub:[
                                                    {name: 'A-1-2-1', value: '121',sub:[{name: 'A-1-2-1-1', value: '1211'}
                                                ]
                                            }
                                        ]
                                    }
                                ]}
                                // more.. 
                              ]},
                              {name: 'A-2', value: '3', sub: [ 
                                {name: 'A-2-1', value: '34'} 
                              ]} 
                              // more.. 
                            ]}, 
                            {name:'B', value: '5', sub: [ 
                              {name: 'B-1', value: '8', sub: [ 
                                {name: 'B-1-1', value: '16'} 
                              ]} 
                            ]} 
                            // more.. 
                          ] 
                        }); 
                    })
                    </code></pre>
                    <h4>html</h4>
                    <pre><code data-language="html">
                    <div class="form-inline" id="custom_data"> 
                        <select class="form-control first"></select> 
                        <select class="form-control second"></select> 
                        <select class="form-control third"></select> 
                        <select class="form-control fourth"></select>
                        <select class="form-control fifth"></select>  
                    </div> 
                    </code></pre>
                    <script>
                    seajs.use(["cxSelect/index"],function(globalData){
                        $('#custom_data').cxSelect({ 
                          selects: ['first', 'second', 'third', 'fourth', 'fifth'], 
                          jsonName: 'name', 
                          jsonValue: 'value', 
                          jsonSub: 'sub', 
                          url: [ 
                            {name:'A', value: '1', sub: [ 
                              {name: 'A-1', value: '2', sub: [ 
                                {name: 'A-1-1', value: '11'},
                                {name: 'A-1-2', value: '12',sub:[{name: 'A-1-2-1', value: '121',sub:[{name: 'A-1-2-1-1', value: '1211'}]}]}
                                // more.. 
                              ]},
                              {name: 'A-2', value: '3', sub: [ 
                                {name: 'A-2-1', value: '34'} 
                              ]} 
                              // more.. 
                            ]}, 
                            {name:'B', value: '5', sub: [ 
                              {name: 'B-1', value: '8', sub: [ 
                                {name: 'B-1-1', value: '16'} 
                              ]} 
                            ]} 
                            // more.. 
                          ] 
                        }); 
                    })
                    </script>
                </div>
                <div class="wrap">
                    <h3 id="cxSelect-API"><i class="glyphicon glyphicon-paperclip"></i> 各选项数据接口独立</h3>
                    <h4>html</h4>
                    <pre><code data-language="html">
                        <select class="province" name="province" data-url="_test/province.php"></select> 
                        <select class="city" name="city" data-url="_test/city.php" data-json-space="data"></select> 
                        <select class="area" name="area" data-url="_test/area.php" data-json-space="data.list"></select>
                    </code></pre>
                    <h4>javascript:</h4>
                    <p>调用 cxSelect 时，将使用 get 请求方法，通过data-url属性设定的接口地址，获取省份数据</p>
                    <pre><code data-language="javascript">
                    // _test/province.php 
                    [{"value":1,"name":"北京市"},{"value":2,"name":"上海市"},{"value":3,"name":"浙江省"},...] 
                    </code></pre>
                    <p>当选择省份为“浙江省”时，对应的value为3，会在获取城市数据接口中添加对应参数，获取城市数据默认取上一个select的name属性值作为参数名，也可以通过data-query-name来设置参数名由于城市接口返回的数据是一个 JSON，但是城市数据放在 data 属性中，所以需要通过data-json-space="data"设置命名空间</p>
                    <pre><code data-language="javascript">
                    // _test/city.php?province=3 
                    {"state":"success","data":[{"value":301,"name":"杭州市"},{"value":302,"name":"宁波市"},...]}  
                    </code></pre>
                    <p>当选择城市为“杭州市”时，也会传递对应参数，获取市区数据而市区接口返回的数据层级更深，依然可以通过data-json-space="data.list"设置命名空间，以此类推</p>
                    <pre><code data-language="javascript">
                    // _test/area.php?city=301 
                    {"state":"success","data":{"list":[{"value":3101,"name":"上城区"},{"value":3102,"name":"下城区"},...]}} 
                    </code></pre>
                    <h5>第一个选框可不使用接口</h5>
                    <p>当第一个选框在页面加载时已有选项时，可以不设置第一个选框的接口，减少连接数</p>
                    <h5>使用纯数组作为数据</h5>
                    <p>如果返回数据或自定义数据为纯数组时，请将jsonName和jsonValue设置空字符串，也可以在<select>的data-json-name和data-json-value属性中设置。</p>
                    <pre><code data-language="html">
                        <!-- 通过 data 属性设置 --> 
                        <select data-json-name="" data-json-value=""></select>
                    </code></pre>
                    <pre><code data-language="javascript">
                        // 或调用时，通过参数设置 
                        $('#array_data').cxSelect({ 
                          selects: ['first', 'second', 'third'], 
                          jsonName: '', 
                          jsonValue: '' 
                        });  
                    </code></pre>
                </div>
            </div>
            <div class="col-md-3">
                <nav class="bs-docs-sidebar hidden-print hidden-xs hidden-sm affix" id="navbar-example">
                    <ul class="nav bs-docs-sidenav">
                        <li>
                            <a href="#paginationDemo">分页组件</a>
                            <ul class="nav">
                                <li><a href="#jqPaginator">jqPaginator</a></li>
                                <li><a href="#pagekkpager">kkpager</a></li>
                            </ul>
                        </li>
                        <li>
                            <a href="#cxSelectDemo">联动组件</a>
                            <ul class="nav">
                                <li><a href="#cxSelect-cityData">国内省市区联动</a></li>
                                <li><a href="#cxSelect-globalLocation">全球主要国家城市联动</a></li>
                                <li><a href="#cxSelect-custom">自定义选项</a></li>
                                <li><a href="#cxSelect-API">各选项数据接口独立</a></li>
                            </ul>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </div>
    <script>
    seajs.use(["bootstrap","rainbow"],function(){
        Rainbow.color();
    })
    </script>

</body>
</html>