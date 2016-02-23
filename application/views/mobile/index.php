<!DOCTYPE html>
<html>
  <head>
    <!-- Required meta tags-->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no, minimal-ui">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- Your app title -->
    <title>我的个人笔记</title>
    <!-- Path to Framework7 iOS CSS theme styles-->
    <link rel="stylesheet" href="<?=$assets ?>/public/framework7/css/framework7.ios.min.css">
    <!-- Path to Framework7 iOS related color styles -->
    <link rel="stylesheet" href="<?=$assets ?>/public/framework7/css/framework7.ios.colors.min.css">
    <!-- Path to your custom app styles-->
    <link rel="stylesheet" href="<?=$assets ?>/public/framework7/css/my-app.css">
    <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/styles/default.min.css">
    <script src="//cdnjs.cloudflare.com/ajax/libs/highlight.js/9.1.0/highlight.min.js"></script>
  </head>
  <body>
    <!-- Status bar overlay for full screen mode (PhoneGap) -->
    <div class="statusbar-overlay"></div>
    <!-- Panels overlay-->
    <div class="panel-overlay"></div>
    <!-- Left panel with reveal effect-->
    <div class="panel panel-left panel-reveal">
      <div class="content-block">
        <div class="list-block">
          <ul>
            <li>
              <a href="/index.php/mobile/about" class="item-link">
                <div class="item-content">
                  <div class="item-inner"> 
                    <div class="item-title">About</div>
                  </div>
                </div>
              </a>
            </li>
            <li>
              <a href="/index.php/mobile/notesList" class="item-link">
                <div class="item-content"> 
                  <div class="item-inner">
                    <div class="item-title">笔记</div>
                  </div>
                </div>
              </a>
            </li>
            <li><a href="form.html" class="item-link">
                <div class="item-content"> 
                  <div class="item-inner">
                    <div class="item-title">Form</div>
                  </div>
                </div></a></li>
          </ul>
        </div>
      </div>
    </div>
    <!-- Views -->
    <div class="views">
      <!-- Your main view, should have "view-main" class -->
      <div class="view view-main">
        <!-- Top Navbar-->
        <div class="navbar">
          <div class="navbar-inner">
            <!-- We need cool sliding animation on title element, so we have additional "sliding" class -->
            <div class="center sliding">我的个人笔记</div>
            <div class="right">
              <!-- 
                Right link contains only icon - additional "icon-only" class
                Additional "open-panel" class tells app to open panel when we click on this link
              -->
              <a href="#" class="link icon-only open-panel"><i class="icon icon-bars-blue"></i></a>
            </div>
          </div>
        </div>
        <!-- Pages container, because we use fixed-through navbar and toolbar, it has additional appropriate classes-->
        <div class="pages navbar-through toolbar-through">
          <!-- Page, "data-page" contains page name -->
          <div data-page="index" class="page">
            <!-- Scrollable page content -->
            <div class="page-content">
              <div class="content-block-title">欢迎来到 我的个人笔记</div>
              <div class="content-block">
                <div class="content-block-inner">
                  <p>点点滴滴，</p>
                  <p>属于你的个人笔记，需要你创建你自己的帐号。</p>
                </div>
              </div>
              <div class="list-block">
                <ul>
                  
                  <li>
                    <a href="/index.php/mobile/notesList" class="item-link">
                      <div class="item-content"> 
                        <div class="item-inner">
                          <div class="item-title">笔记</div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="form.html" class="item-link">
                      <div class="item-content"> 
                        <div class="item-inner">
                          <div class="item-title">写笔记</div>
                        </div>
                      </div>
                    </a>
                  </li>
                  <li>
                    <a href="/index.php/mobile/about" class="item-link">
                      <div class="item-content">
                        <div class="item-inner"> 
                          <div class="item-title">About</div>
                        </div>
                      </div>
                    </a>
                  </li>
                </ul>
              </div>
              <div class="content-block">
                <div class="row">
                  <div class="col-50"><a href="#" data-panel="left" class="button open-login-screen">登录</a></div>
                  <div class="col-50"><a href="#" data-panel="right" class="button open-panel">注册</a></div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- Bottom Toolbar-->
        <div class="toolbar">
          <div class="toolbar-inner">
            <!-- Toolbar links -->
            <a href="#" class="link">我的</a>
            <a href="#" class="link">我的</a>
          </div>
        </div>
      </div>
    </div>
    <!-- Right Panel with Cover effect -->
    <div class="panel panel-right panel-cover" id="panelRight">
      <div class="content-block">
        <p>Right Panel content here</p>
      </div>
    </div>
    

    <div class="login-screen">
      <div class="view">
        <div class="page">
          <div class="page-content login-screen-content">
            <div class="login-screen-title">我的个人笔记</div>
            <form action="<?=$assets ?>/index.php/mobile/login" method="post" class="ajax-submit">
            <input value="<?=$assets ?>/index.php/mobile/" type="hidden" name="redirect">
              <div class="list-block">
                <ul>
                  <li class="item-content">
                    <div class="item-inner">
                      <div class="item-title label">用户名</div>
                      <div class="item-input">
                        <input type="text" name="username" placeholder="你的用户名">
                      </div>
                    </div>
                  </li>
                  <li class="item-content">
                    <div class="item-inner">
                      <div class="item-title label">密码</div>
                      <div class="item-input">
                        <input type="password" name="password" placeholder="你的密码">
                      </div>
                    </div>
                  </li>
                </ul>
              </div>
              <div class="content-block">
                <p class="buttons-row"><button class="button" type="submit">登录</button><a href="#" class="button close-login-screen">取消</a></p>
              </div>
              <div class="list-block">
                <div class="list-block-label">
                  <p>需要登录才能编写你自己的个人笔记</p>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- Path to Framework7 Library JS-->
    <script type="text/javascript" src="<?=$assets ?>/public/framework7/js/framework7.min.js"></script>
    <!-- Path to your app js-->
    <script type="text/javascript" src="<?=$assets ?>/public/framework7/js/my-app.js"></script>
  </body>
</html> 