<!DOCTYPE HTML>

<head>
  <title>Store Website</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('resources/css/comment.css') }}" rel="stylesheet" type="text/css" media="all" />
  <script src="{{ asset('resources/js/jquerymain.js') }}"></script>
  <script src="{{ asset('resources/js/script.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('resources/js/jquery-1.7.2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/nav.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/move-top.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/easing.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/nav-hover.js') }}"></script>
  <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
  <script type="text/javascript">
    $(document).ready(function($) {
            $('#dc_mega-menu-orange').dcMegaMenu({
                rowItems: '4',
                speed: 'fast',
                effect: 'fade'
            });
        });
  </script>
</head>

<body>
  <div class="wrap">
    <div class="header_top">
      <div class="logo">
        <a href="index.php"><img src="images/logo.png" alt="" /></a>
      </div>
      <div class="header_top_right">
        <div class="search_box">
          <form action="{{ route('search') }}" method="POST">
            @csrf
            <input type="text" name="keyword" placeholder="Nhập từ khóa">
            <input type="submit" value="TÌM KIẾM">
          </form>
        </div>
        <div class="shopping_cart">
          <div class="cart">
            <a href="{{ route('cart') }}" title="View my shopping cart" rel="nofollow">
              <span class="cart_title">Giỏ hàng</span>
              <span class="no_product">
                @if (Session::get('count')!=null)
                ({{ Session::get('count') }} sản phẩm)
                @else
                (Trống)
                @endif
              </span>
            </a>
          </div>
        </div>
        <div class="login">
          @if (Session::get('customer')==null)
          <a href='{{ route('login') }}'>Login</a>
          @else
          <a href='{{ route('logout') }}'>Logout</a>
          @endif
        </div>
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="menu">
      <ul id="dc_mega-menu-orange" class="dc_mm-orange">
        <li><a href="{{ route('index') }}">Trang chủ</a></li>
        <li><a href="{{ route('products') }}">Sản phẩm</a></li>
        <li><a href="{{ route('topbrand') }}">Top Brands</a></li>
        @if (Session::get('customer')!=null)
        <li><a href='{{ route('profile') }}'>Profile</a></li>
        <li><a href='{{ route('order') }}'>Your ORDER</a></li>
        <li><a href="{{ route('changepassworduser') }}">CHANGE PASWORD</a></li>
        @endif
        <div class="clear"></div>
      </ul>
    </div>

    @yield('content')
  </div>
  <div class="footer">
    <div class="wrapper">
      <div class="section group">
        <div class="col_1_of_4 span_1_of_4">
          <h4>Chăm sóc khách hàng</h4>
          <ul>
            <li><a href="#"><span>Trung tâm trợ giúp</span> </a></li>
            <li><a href="#"><span>Hướng dẫn mua hàng</span> </a></li>
            <li><a href="#"><span>Hướng dẫn bán hàng</span></a></li>
            <li><a href="#"><span>Chăm sóc khách hàng</span> </a></li>
            <li><a href="#"><span>Chính sách bảo hành</span></a></li>
            <li><a href="#"><span>Vận chuyển</span></a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Thông tin</h4>
          <ul>
            <li><a href="#"><span>Giới thiệu về shop</span></a></li>
            <li><a href="#"><span>Tuyển dụng</span> </a></li>
            <li><a href="#"><span>Chính sách bảo hành</span> </a></li>
            <li><a href="#"><span>Chính hãng</span></a></li>
            <li><a href="#"><span>Kênh người bán</span></a></li>
            <li><a href="#"><span>Flash Sale</span></a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Liên hệ chúng tôi</h4>
          <ul>
            <li><a href="#"><span>168 Nguyễn Trãi, Hà Đông, Hà Nội</span></a></li>
            <li><a href="#"><span>Phone: 0945586004</span> </a></li>
            <li><a href="#"><span>Cảm ơn quý khách đã tin tưởng và sử dụng dịch vụ của chúng tôi</span> </a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Theo dõi chúng tôi</h4>
          <div class="social-icons">
            <ul>
              <li class="facebook"><a href="#" target="_blank"> </a></li>
              <li class="twitter"><a href="#" target="_blank"> </a></li>
              <li class="googleplus"><a href="#" target="_blank"> </a></li>
              <li class="contact"><a href="#" target="_blank"> </a></li>
              <div class="clear"></div>
            </ul>
          </div>
        </div>
      </div>
      <div class="copy_right">
        <p>Hữu Anh'store - All rights Reseverd </p>
      </div>
    </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function () {
                /*
                var defaults = {
                      containerID: 'toTop', // fading element id
                    containerHoverID: 'toTopHover', // fading element hover id
                    scrollSpeed: 1200,
                    easingType: 'linear'
                 };
                */
        
                $().UItoTop({easingType: 'easeOutQuart'});
        
            });
  </script>
  <a href="#" id="toTop" style="display: block;"><span id="toTopHover" style="opacity: 1;"></span></a>
  <link href="{{ asset('resources/css/flexslider.css') }}" rel='stylesheet' type='text/css' />
  <script defer src="{{ asset('resources/js/jquery.flexslider.js') }}"></script>
  <script type="text/javascript">
    $(function () {
                SyntaxHighlighter.all();
            });
            $(window).load(function () {
                $('.flexslider').flexslider({
                    animation: "slide",
                    start: function (slider) {
                        $('body').removeClass('loading');
                    }
                });
            });
  </script>
</body>

</html>