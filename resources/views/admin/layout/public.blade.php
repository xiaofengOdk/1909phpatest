<!DOCTYPE html>
<html>
<head>
    <!-- 页面meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>运营商后台管理系统</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width,initial-scale=1,maximum-scale=1,user-scalable=no" name="viewport">


    <link rel="stylesheet" href="/static/admin/plugins/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/static/admin/plugins/adminLTE/css/AdminLTE.css">
    <link rel="stylesheet" href="/static/admin/plugins/adminLTE/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="/static/admin/css/style.css">

    <script src="/static/admin/plugins/jQuery/jquery-2.2.3.min.js"></script>
    <script src="/static/admin/plugins/jQueryUI/jquery-ui.min.js"></script>
    <script src="/static/admin/plugins/bootstrap/js/bootstrap.min.js"></script>

    <script src="/static/admin/plugins/adminLTE/js/app.min.js"></script>

    <script type="text/javascript">
         function SetIFrameHeight(){
              var iframeid=document.getElementById("iframe"); //iframe id
              if (document.getElementById){
                iframeid.height =document.documentElement.clientHeight;
              }
         }
    </script>
</head>
<body class="hold-transition skin-green sidebar-mini" >
    <div class="wrapper">
        <!-- 页面头部 -->
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- mini logo for sidebar mini 50x50 pixels -->
                <span class="logo-mini"><b>品优购</b></span>
                <!-- logo for regular state and mobile devices -->
                <span class="logo-lg"><b>品优购-运营商后台</b></span>
            </a>
            <!-- Header Navbar: style can be found in header.less -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
                    <span class="sr-only">Toggle navigation</span>
                </a>

                <div class="navbar-custom-menu">
                    <ul class="nav navbar-nav">
                      
                        <!-- User Account: style can be found in dropdown.less -->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <img src="/static/admin/img/user2-160x160.jpg" class="user-image" alt="User Image">
                                <span class="hidden-xs">用户</span>
                            </a>
                            <ul class="dropdown-menu">
                                <!-- User image -->
                                <li class="user-header">
                                    <img src="/static/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">

                                    <p>
                                       @if(session('regs')=='')
                                          <a href="http://www.1909a3.com/index.php/admin/login" style="font-size: 15px; color:white;">登录</a>
                                       @else
                                       @php echo session('regs')->admin_name @endphp
                                       <small>登录时间:@php echo session('time')@endphp</small>
                                       @endif
                                       
                                    </p>
                                </li>

                                <!-- Menu Footer-->
                                <li class="user-footer">
                                    <div class="pull-left">
                                        <a href="#" class="btn btn-default btn-flat">修改密码</a>
                                    </div>
                                    <div class="pull-right">
                                        <a href="/admin/quit" class="btn btn-default btn-flat">退出</a>
                                    </div>
                                </li>
                            </ul>
                        </li>

                    </ul>
                </div>
            </nav>
        </header>

        <!-- 导航侧栏 -->
        <aside class="main-sidebar">
            <!-- sidebar: style can be found in sidebar.less -->
            <section class="sidebar">
                <!-- Sidebar user panel -->
                <div class="user-panel">
                    <div class="pull-left image">
                        <img src="/static/admin/img/user2-160x160.jpg" class="img-circle" alt="User Image">
                    </div>
                    <div class="pull-left info">
                        <p> 用户</p>
                        @if(session('regs')=='')
                        <a href="#" style='color:red;'><i class="fa fa-circle text-success"></i>未在线</a>
                                       @else
                         <a href="#" style='color:green; font-size:16px;'><i class="fa fa-circle text-success"></i>在线</a>
                                       @endif
                                       
                      
                    </div>
                </div>

                <!-- /.search form -->


                <!-- sidebar menu: : style can be found in sidebar.less -->
                <ul class="sidebar-menu"  >
                    <li class="header">菜单</li>
                    <li id="admin-index"><a href="http://www.1909a3.com/index.php/admin/index"><i class="fa fa-dashboard"></i> <span>首页</span></a></li>
                    <!-- 菜单 -->
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>用户管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">

                            </li>
                            <li id="admin-login">
                                <a href="/admin/ushow" target="iframe">
                                    <i class="fa fa-circle-o"></i>用户展示
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>商品管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">

                            <li id="admin-login">
                                <a href="/admin/brand" target="iframe">
                                    <i class="fa fa-circle-o"></i>品牌管理
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="/admin/gimgs_adds" target="iframe">
                                    <i class="fa fa-circle-o"></i>子图片管理
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="/admin/gadd" target="iframe">
                                    <i class="fa fa-circle-o"></i>商品管理
                                </a>
                            </li>
                              <li id="admin-login">
                                <a href="/admin/goods_show" target="iframe">
                                    <i class="fa fa-circle-o"></i>商品展示
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="/admin/category" target="iframe">
                                    <i class="fa fa-circle-o"></i>分类管理
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>权限管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="{{url('/admin/right/index')}}" target="iframe">
                                    <i class="fa fa-circle-o"></i>权限展示
                                </a>
                            </li>

                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>角色管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/role_add" target="iframe">
                                    <i class="fa fa-circle-o"></i>查看
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>分类管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/category" target="iframe">
                                    <i class="fa fa-circle-o"></i>分类管理
                                </a>
                            </li>
                        </ul>
                    </li>
                   <li class="treeview">
                        <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>Sku管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/attr_add" target="iframe">
                                    <i class="fa fa-circle-o"></i>属性查看
                                </a>
                            </li>
                            <li id="admin-login">
                                <a href="/admin/attrval_add" target="iframe">
                                    <i class="fa fa-circle-o"></i>属性值查看
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                      <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>轮播图管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/slide_show" target="iframe">
                                    <i class="fa fa-circle-o"></i>轮播图管理
                                </a>
                            </li>
                        </ul>
                    </li>

                       <li class="treeview">
                      <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>广告管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/adtg_add" target="iframe">
                                    <i class="fa fa-circle-o"></i>广告展示
                                </a>
                            </li>
                        </ul>
                    </li>


                   <li class="treeview">
                      <a href="#">
                            <i class="fa fa-folder"></i>
                            <span>导航管理</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-left pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/nav_add" target="iframe">
                                    <i class="fa fa-circle-o"></i>导航管理
                                </a>
                            </li>
                        </ul>
                         <ul class="treeview-menu">
                            <li id="admin-login">
                                <a href="/admin/foot_show" target="iframe">
                                    <i class="fa fa-circle-o"></i>底部友情链接
                                </a>
                            </li>
                        </ul>
                    </li>
                    <!-- 菜单 /-->

                </ul>
            </section>
            <!-- /.sidebar -->
        </aside>
        <!-- 导航侧栏 /-->

                     <div class="content-wrapper">
                @yield("content")
                        </div>
        <!-- 底部导航 -->
        <footer class="main-footer">
            <div class="pull-right hidden-xs">
                <b>Version</b> 1.0.8
            </div>
            <strong>Copyright &copy; 2014-2017 <a href="http://www.itcast.cn">研究院研发部</a>.</strong> All rights reserved.
        </footer>
    </div>
</body>

</html>
