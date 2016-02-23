// Initialize your app
var myApp = new Framework7({
    Rainbow:{}
});

// Export selectors engine
var $$ = Dom7;

var notelistFn = function(){
    // 加载flag
    var loading = false;
     
    // 上次加载的序号
     

    var pageIndex = 1;
     
    // 每次加载添加多少条目
    var itemsPerLoad = 10;
     
    // 注册'infinite'事件处理函数
    $$('.infinite-scroll').on('infinite', function () {
     
      // 如果正在加载，则退出
      if (loading) return;
     
      // 设置flag
      loading = true;
     
      // 模拟1s的加载过程
      setTimeout(function () {
        // 重置加载flag
        loading = false;
     
        // 生成新条目的HTML
        pageIndex++;
        $$.ajax({
            url:"/index.php/mobile/ajaxnoteslist/"+pageIndex+"?pageSize="+itemsPerLoad,
            type:"get",
            dataType:"json",
            complete:function(res){
                console.log(res);
                if(res.response=="") {
                    myApp.detachInfiniteScroll($$('.infinite-scroll'));
                      // 删除加载提示符
                    $$('.infinite-scroll-preloader').remove();
                    return;
                }

                $$('[data-page="notelist"] .list-block ul').append(res.response); 
            }
        })
      }, 1000);
    }); 
}

$$('form.ajax-submit').on('submitted', function (e) {
  var xhr = e.detail.xhr; // actual XHR object
  var data = e.detail.data; // Ajax repsonse from action file
  // do something with response data
  var res = JSON.parse(data);
  if(res.success){
    myApp.closeModal();
  }else{
    myApp.alert(res.content.error_msg,"登录失败")
  }
  console.log(xhr,JSON.parse(data))
});
// Add view
var mainView = myApp.addView('.view-main', {
    // Because we use fixed-through navbar we can enable dynamic navbar
    dynamicNavbar: true
});

// Callbacks to run specific code for specific pages, for example for About page:
myApp.onPageInit('about', function (page) {
    // run createContentPage func after link was clicked
    $$('.create-page').on('click', function () {
        createContentPage();
    });
});
myApp.onPageInit('notelist', function (page) {
    // run createContentPage func after link was clicked
    notelistFn();
});
myApp.onPageAfterAnimation('note', function (page) {
    // run createContentPage func after link was clicked
    $$('pre code').each(function(i, block) {
        hljs.highlightBlock(block);
    });
    $$('#panelRight').on('open', function () {
        $$('#panelRight .content-block').html($$('#userInfoComent').html());
    });
});
// Generate dynamic page
var dynamicPageIndex = 0;
function createContentPage() {
	mainView.router.loadContent(
        '<!-- Top Navbar-->' +
        '<div class="navbar">' +
        '  <div class="navbar-inner">' +
        '    <div class="left"><a href="#" class="back link"><i class="icon icon-back"></i><span>Back</span></a></div>' +
        '    <div class="center sliding">Dynamic Page ' + (++dynamicPageIndex) + '</div>' +
        '  </div>' +
        '</div>' +
        '<div class="pages">' +
        '  <!-- Page, data-page contains page name-->' +
        '  <div data-page="dynamic-pages" class="page">' +
        '    <!-- Scrollable page content-->' +
        '    <div class="page-content">' +
        '      <div class="content-block">' +
        '        <div class="content-block-inner">' +
        '          <p>Here is a dynamic page created on ' + new Date() + ' !</p>' +
        '          <p>Go <a href="#" class="back">back</a> or go to <a href="services.html">Services</a>.</p>' +
        '        </div>' +
        '      </div>' +
        '    </div>' +
        '  </div>' +
        '</div>'
    );
	return;
}