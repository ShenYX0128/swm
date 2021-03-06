<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>@yield('title')</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="/admins/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="/admins/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="/admins/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="/admins/dist/css/AdminLTE.min.css">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
  <link rel="stylesheet" href="/admins/dist/css/skins/_all-skins.min.css">
  <!-- Morris chart -->
  <link rel="stylesheet" href="/admins/bower_components/morris.js/morris.css">
  <!-- jvectormap -->
  <link rel="stylesheet" href="/admins/bower_components/jvectormap/jquery-jvectormap.css">
  <!-- Date Picker -->
  <link rel="stylesheet" href="/admins/bower_components/bootstrap-datepicker/dist/css/bootstrap-datepicker.min.css">
  <!-- Daterange picker -->
  <link rel="stylesheet" href="/admins/bower_components/bootstrap-daterangepicker/daterangepicker.css">
  <!-- bootstrap wysihtml5 - text editor -->
  <link rel="stylesheet" href="/admins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

  
  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body class="hold-transition skin-blue sidebar-mini sidebar-collapse">
<div class="wrapper">

  <header class="main-header">
    <!-- Logo -->

    <a href="http://g-mall.cn/admin" class="logo">

      <!-- mini logo for sidebar mini 50x50 pixels -->
      <span class="logo-mini"><b>G</b>MA</span>
      <!-- logo for regular state and mobile devices -->
      <span class="logo-lg"><b>G-</b>MALL</span>
    </a>
    <!-- Header Navbar: style can be found in header.less -->
    <nav class="navbar navbar-static-top">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>

          @php
            $user = DB::table('user')->where('id',session('uid'))->first();
          @endphp

      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">
          <!-- User Account: style can be found in dropdown.less -->
          <li class="dropdown user user-menu">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
      
              <img src="{{$user->header}}" class="user-image" alt="User Image">
              <span class="hidden-xs">{{$user->username}}</span>

            </a>
            <ul class="dropdown-menu">
              <!-- User image -->
              <!-- <div class="widget-user-header bg-black" style="background: url('../dist/img/photo1.png') center center;">
              <h3 class="widget-user-username"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">伊丽莎白皮尔斯</font></font></h3>
              <h5 class="widget-user-desc"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">网页设计者</font></font></h5>
            </div> -->
              <li class="user-header" style="background: url('/admins/dist/img/photo1.png') center center;">

                <img src="{{$user->header}}" class="img-circle" alt="User Image">

                <p>
                  {{$user->username}}

                  <small>Member since Nov. 2018</small>
                </p>
              </li>
              <!-- Menu Body -->
              <!-- <li class="user-body">
                <div class="row">
                  <div class="col-xs-4 text-center">
                    <a href="#">Followers</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Sales</a>
                  </div>
                  <div class="col-xs-4 text-center">
                    <a href="#">Friends</a>
                  </div>
                </div>

                <!- /.row -->

              <!-- </li> -->
              <!-- Menu Footer-->
              <li class="user-footer">
                <div class="pull-left">

                  <a href="/admin/header" class="btn btn-default btn-flat">修改头像</a>
                </div>
                <div class="pull-left">
                  <a href="/admin/passchange" class="btn btn-default btn-flat">修改密码</a>
                </div>
                <div class="pull-right">
                  <a href="/admin/logout" class="btn btn-default btn-flat">退出</a>
                </div>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">
    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">
      <!-- Sidebar user panel -->
      <div class="user-panel">
        <div class="pull-left image">

          <img src="{{$user->header}}" class="img-circle" alt="User Image">
        </div>
        <div class="pull-left info">
          <p>{{$user->username}}</p>

        </div>
      </div>
      <!-- search form -->
      <form action="#" method="get" class="sidebar-form">
        <div class="input-group">
          <input type="text" name="q" class="form-control" placeholder="Search...">
          <span class="input-group-btn">
                <button type="submit" name="search" id="search-btn" class="btn btn-flat"><i class="fa fa-search"></i>
                </button>
              </span>
        </div>
      </form>
      <!-- /.search form -->
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <ul class="sidebar-menu" data-widget="tree">
      


        <li class="treeview">
          <a href="#">
            <i class="fa fa-pie-chart"></i>
            <span>商品管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/goods/create"><i class="fa fa-circle-o"></i> 商品添加</a></li>
            <li><a href="/admin/goods"><i class="fa fa-circle-o"></i> 商品浏览</a></li>
          </ul>
        </li>

          <li class="treeview">
            <a href="#">
              <i class="fa  fa-list"></i>
              <span>分类管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/admin/category/create"><i class="fa fa-circle-o"></i>添加分类</a></li>
              <li><a href="/admin/category"><i class="fa fa-circle-o"></i>浏览分类</a></li>
            </ul>
          </li>
    

      
          <li class="treeview">
            <a href="#">
              <i class="fa  fa-link"></i>
              <span>友情链接</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/admin/friend/create"><i class="fa fa-circle-o"></i>添加链接</a></li>
              <li><a href="/admin/friend"><i class="fa fa-circle-o"></i>浏览链接</a></li>
            </ul>
          </li>
          <li class="treeview">
          <a href="#">
          <i class="fa fa-user"></i>
          <span>管理员管理</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/user/create"><i class="fa fa-user-plus"></i>管理员添加</a></li>
            <li><a href="/admin/user"><i class="fa fa-users"></i>浏览管理员</a></li>
          </ul>

        </li>


          <li class="treeview">
          <a href="#">
          <i class="fa fa-user"></i>
          <span>用户管理</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/customer/create"><i class="fa fa-user-plus"></i>用户添加</a></li>
            <li><a href="/admin/customer"><i class="fa fa-users"></i>浏览用户</a></li>
          </ul>
          </li>

          <li class="treeview">
                <a href="#">
                <i class="fa fa-user"></i>
                <span>角色管理</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/role/create"><i class="fa fa-user-plus"></i>角色添加</a></li>
            <li><a href="/admin/role"><i class="fa fa-users"></i>浏览角色</a></li>
          </ul>
          </li>

          <li class="treeview">
                <a href="#">
                <i class="fa fa-key"></i>
                <span>权限管理</span>
          <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
          </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/permission/create"><i class="fa fa-key"></i>权限添加</a></li>
            <li><a href="/admin/permission"><i class="fa fa-key"></i>浏览权限</a></li>
          </ul>
          </li>
        <li class="treeview">
                    <a href="#">
                      <i class="fa  fa-commenting"></i>
                      <span>评论管理</span>
            <span class="pull-right-container">
              <i class="fa fa-angle-left pull-right"></i>
            </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="/admin/comment"><i class="fa fa-circle-o"></i>评论浏览</a></li>
          </ul>
        </li>
        <li class="treeview">
            <a href="#">
              <i class="fa   fa-life-buoy"></i>
              <span>轮播管理</span>
              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">
              <li><a href="/admin/banner/create"><i class="fa fa-circle-o"></i>添加轮播图</a></li>
              <li><a href="/admin/banner"><i class="fa fa-circle-o"></i>浏览轮播图</a></li>
            </ul>
          </li>

        <li class="treeview">
            <a href="#">
              <i class="fa fa-play-circle-o"></i>
              <span>广告管理</span>


              <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
            </a>
            <ul class="treeview-menu">

              <li><a href="/admin/poster/create"><i class="fa fa-circle-o"></i>添加广告</a></li>
              <li><a href="/admin/poster"><i class="fa fa-circle-o"></i>浏览广告</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa  fa-file-text"></i>
              <span>订单管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
            <ul class="treeview-menu">
              <li><a href="/admin/orders"><i class="fa fa-circle-o"></i>浏览订单</a></li>
              <li><a href="/admin/orders_status"><i class="fa fa-circle-o"></i>浏览订单状态</a></li>
            </ul>
          </li>

          <li class="treeview">
            <a href="#">
              <i class="fa  fa-cogs"></i>
              <span>网站管理</span>
                <span class="pull-right-container">
                <i class="fa fa-angle-left pull-right"></i>
              </span>
              </a>
            <ul class="treeview-menu">
              <li><a href="/admin/config/edit"><i class="fa fa-cog"></i>修改配置</a></li>
            </ul>
          </li>


      </ul>

    </section>
    <!-- /.sidebar -->
  </aside>
 <!--  <div class="form-group"><label class="control-sidebar-subheading"><input type="checkbox" data-layout="sidebar-collapse" class="pull-right"></label>/div> -->
  <!-- <div class="form-group"><input type="checkbox" data-enable="expandOnHover" class="pull-right"></div> -->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


      @if(session('success'))
        <div class="alert alert-success alert-dismissible">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
                <h4><i class="icon fa fa-check"></i> Success</h4>
                {{session('success')}}
              </div>
      @endif
      @if(session('error'))
        <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h4><i class="icon fa fa-ban"></i>显示错误信息</h4>
            {{session('error')}}
        </div>
      @endif

    @section('content')
    @show

  </div>
  <!-- /.content-wrapper -->
  <footer class="main-footer">
    <div class="pull-right hidden-xs">
      <b>Version</b> 2.4.0
    </div>
    <strong>Copyright &copy; 2014-2016 <a href="https://adminlte.io">Almsaeed Studio</a>.</strong> All rights
    reserved.
  </footer>
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- jQuery 3 -->
<script src="/admins/bower_components/jquery/dist/jquery.min.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="/admins/bower_components/jquery-ui/jquery-ui.min.js"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
  $.widget.bridge('uibutton', $.ui.button);
</script>
<!-- Bootstrap 3.3.7 -->
<script src="/admins/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
<!-- Morris.js charts -->
<script src="/admins/bower_components/raphael/raphael.min.js"></script>
<script src="/admins/bower_components/morris.js/morris.min.js"></script>
<!-- Sparkline -->
<script src="/admins/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
<!-- jvectormap -->

<script src="/admins/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>

<script src="/admins/plugins/jvectormap/jquery-jvectormap-3.3.1.min.js"></script>

<script src="/admins/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/admins/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
<!-- daterangepicker -->
<script src="/admins/bower_components/moment/min/moment.min.js"></script>
<script src="/admins/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<!-- datepicker -->
<script src="/admins/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/admins/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/admins/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
<!-- FastClick -->
<script src="/admins/bower_components/fastclick/lib/fastclick.js"></script>
<!-- AdminLTE App -->
<script src="/admins/dist/js/adminlte.min.js"></script>
<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
<script src="/admins/dist/js/pages/dashboard.js"></script>
<!-- AdminLTE for demo purposes -->
<script src="/admins/dist/js/demo.js"></script>
@section('js')

@show

</body>
</html>
