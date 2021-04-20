<!DOCTYPE html>
<html>

<head>
  <meta http-equiv="content-type" content="text/html; charset=utf-8" />
  <title>Admin</title>
  <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/reset.css') }}" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/text.css') }}" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/grid.css') }}" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/layout.css') }}" media="screen" />
  <link rel="stylesheet" type="text/css" href="{{ asset('resources/css/admin/nav.css') }}" media="screen" />
  <link href="{{ asset('resources/css/admin/table/demo_page.css') }}" rel="stylesheet" type="text/css" />
  <!-- BEGIN: load jquery -->
  <script src="{{ asset('resources/js/admin/jquery-1.6.4.min.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('resources/js/admin/jquery-ui/jquery.ui.core.min.js') }}"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.ui.widget.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.ui.accordion.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.effects.core.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.effects.slide.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.ui.mouse.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/jquery-ui/jquery.ui.sortable.min.js') }}" type="text/javascript"></script>
  <script src="{{ asset('resources/js/admin/table/jquery.dataTables.min.js') }}" type="text/javascript"></script>
  <!-- END: load jquery -->
  <script type="text/javascript" src="{{ asset('resources/js/admin/table/table.js') }}"></script>
  <script src="{{ asset('resources/js/admin/setup.js') }}" type="text/javascript"></script>
  <script type="text/javascript">
    $(document).ready(function() {
            setupLeftMenu();
            setSidebarHeight();
        });
  </script>

</head>

<body>
  <div class="container_12">
    <div class="grid_12 header-repeat">
      <div id="branding">
        <div class="floatleft logo">
          <a href="../index.php">
            <img src="{{ asset('images/admin/livelogo.png') }}" alt="Logo" />
          </a>
        </div>
        <div class="floatleft middle">
          <h1>Training with live project</h1>
          <p>www.trainingwithliveproject.com</p>
        </div>
        <div class="floatright">
          <div class="floatleft">
            <img src="{{ asset('images/admin/img-profile.jpg') }}" alt="Profile Pic" />
          </div>
          <div class="floatleft marginleft10">
            <ul class="inline-ul floatleft">
              <li>Hello {{ Session::get('adminName') }}</li>
              <li><a href="{{ route('adminlogout') }}">Logout</a></li>
            </ul>
          </div>
        </div>
        <div class="clear">
        </div>
      </div>
    </div>
    <div class="clear">
    </div>
    <div class="grid_12">
      <ul class="nav main">
        <li class="ic-dashboard"><a href="index.php"><span>Dashboard</span></a> </li>
        <li class="ic-form-style"><a href=""><span>User Profile</span></a></li>
        <li class="ic-typography"><a href="{{ route('changepassword') }}"><span>Change Password</span></a></li>
        <li class="ic-grid-tables"><a href="{{ route('inbox') }}"><span>Xử lý đơn hàng</span></a></li>
        <li class="ic-charts"><a href=""><span>Visit Website</span></a></li>
      </ul>
    </div>
    <div class="clear">
    </div>
    <div class="grid_2">
      <div class="box sidemenu">
        <div class="block" id="section-menu">
          <ul class="section menu">

            <li><a class="menuitem">Danh mục sản phẩm</a>
              <ul class="submenu">
                <li><a href="{{ route('catadd') }}">Thêm danh mục</a> </li>
                <li><a href="{{ route('catlist') }}">Danh mục sản phẩm</a> </li>
              </ul>
            </li>
            <li><a class="menuitem">Thương hiệu</a>
              <ul class="submenu">
                <li><a href="{{ route('brandadd') }}">Thêm thương hiệu</a> </li>
                <li><a href="{{ route('brandlist') }}">Danh sách thương hiệu</a> </li>
              </ul>
            </li>
            <li><a class="menuitem">Sản phẩm</a>
              <ul class="submenu">
                <li><a href="{{ route('productadd') }}">Thêm sản phẩm</a> </li>
                <li><a href="{{ route('productlist') }}">Liệt kê sản phẩm</a> </li>
              </ul>
            </li>
            <li><a class="menuitem">Site Option</a>
              <ul class="submenu">
                <li><a href="titleslogan.php">Title & Slogan</a></li>
                <li><a href="social.php">Social Media</a></li>
                <li><a href="copyright.php">Copyright</a></li>

              </ul>
            </li>
            <li><a class="menuitem">Update Pages</a>
              <ul class="submenu">
                <li><a>About Us</a></li>
                <li><a>Contact Us</a></li>
              </ul>
            </li>
            <li><a class="menuitem">Slider Option</a>
              <ul class="submenu">
                <li><a href="addslider.php">Add Slider</a> </li>
                <li><a href="sliderlist.php">Slider List</a> </li>
              </ul>
            </li>


          </ul>
        </div>
      </div>
    </div>
    @yield('content')
    <div class="clear">
    </div>
  </div>
  <div class="clear">
  </div>
  <div id="site_info">
    <p>
      &copy; Copyright <a href="http://trainingwithliveproject.com">Training with live project</a>. All Rights Reserved.
    </p>
  </div>
</body>

</html>