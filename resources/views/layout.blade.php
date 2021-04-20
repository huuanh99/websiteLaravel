<!DOCTYPE HTML>
<head>
  <title>Store Website</title>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
  <link href="{{ asset('resources/css/style.css') }}" rel="stylesheet" type="text/css" media="all" />
  <link href="{{ asset('resources/css/menu.css') }}" rel="stylesheet" type="text/css" media="all" />
  <script src="{{ asset('resources/js/jquerymain.js') }}"></script>
  <script src="{{ asset('resources/js/script.js') }}" type="text/javascript"></script>
  <script type="text/javascript" src="{{ asset('resources/js/jquery-1.7.2.min.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/nav.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/move-top.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/easing.js') }}"></script>
  <script type="text/javascript" src="{{ asset('resources/js/nav-hover.js') }}"></script>
  <link href='http://fonts.googleapis.com/css?family=Monda' rel='stylesheet' type='text/css'>
  <link href='http://fonts.googleapis.com/css?family=Doppio+One' rel='stylesheet' type='text/css'>
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
            <input type="text" name="keyword" placeholder="Search for Products">
            <input type="submit" value="SEARCH">
          </form>
        </div>
        <div class="shopping_cart">
          <div class="cart">
            <a href="{{ route('cart') }}" title="View my shopping cart" rel="nofollow">
              <span class="cart_title">Cart</span>
              <span class="no_product">
                @if (Session::get('count')!=null)
                ({{ Session::get('count') }} sản phẩm)
                @else
                (0 sản phẩm)
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
        <li><a href="{{ route('index') }}">Home</a></li>
        <li><a href="{{ route('products') }}">Products</a></li>
        <li><a href="{{ route('topbrand') }}">Top Brands</a></li>
        @if (Session::get('customer')==null)
        @else
        <li><a href='{{ route('profile') }}'>Profile</a></li>
        <li><a href='{{ route('order') }}'>Your ORDER</a></li>
        @endif

        <li><a href="{{ route('contact') }}">Contact</a></li>
        <div class="clear"></div>
      </ul>
    </div>

    <div class="header_bottom">
      <div class="rightsidebar span_3_of_1">
        <h2>CATEGORIES</h2>
        <ul>
          @foreach ($category as $item)
          <li><a href="{{ route('productbycat',['id'=>$item->id]) }}">{{ $item->catName }}</a></li>
          @endforeach
        </ul>
      </div>
      <div class="header_bottom_right_images">
        <!-- FlexSlider -->

        <section class="slider">
          <div class="flexslider">
            <ul class="slides">
              @foreach ($slider_featured as $item)
              <li><img src="uploads/{{ $item->image }}" alt="" /></li>
              @endforeach

            </ul>
          </div>
        </section>
        <!-- FlexSlider -->
      </div>
      <div class="clear"></div>
    </div>
    @yield('content')
  </div>
  <div class="footer">
    <div class="wrapper">
      <div class="section group">
        <div class="col_1_of_4 span_1_of_4">
          <h4>Information</h4>
          <ul>
            <li><a href="#">About Us</a></li>
            <li><a href="#">Customer Service</a></li>
            <li><a href="#"><span>Advanced Search</span></a></li>
            <li><a href="#">Orders and Returns</a></li>
            <li><a href="#"><span>Contact Us</span></a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Why buy from us</h4>
          <ul>
            <li><a href="about.html">About Us</a></li>
            <li><a href="faq.html">Customer Service</a></li>
            <li><a href="#">Privacy Policy</a></li>
            <li><a href="contact.html"><span>Site Map</span></a></li>
            <li><a href="preview.html"><span>Search Terms</span></a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>My account</h4>
          <ul>
            <li><a href="contact.html">Sign In</a></li>
            <li><a href="index.html">View Cart</a></li>
            <li><a href="#">My Wishlist</a></li>
            <li><a href="#">Track My Order</a></li>
            <li><a href="faq.html">Help</a></li>
          </ul>
        </div>
        <div class="col_1_of_4 span_1_of_4">
          <h4>Contact</h4>
          <ul>
            <li><span>+88-01713458599</span></li>
            <li><span>+88-01813458552</span></li>
          </ul>
          <div class="social-icons">
            <h4>Follow Us</h4>
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
        <p>Training with live project &amp; All rights Reseverd </p>
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