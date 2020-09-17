<!doctype html>
<html class="no-js" lang="zxx">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
        <meta name="description" content="Cửa Hàng Điện Nước Phúc Lộc, điện nước phúc lộc, Sửa chữa điện nước 24h chuyên nghiệp, chuyên cung cấp thiết bị điện nước, các loại đèn trang trí với uy tín và chất lượng lâu năm. Quý khách hãy liên hệ ngay cho Phúc Lộc để được mua hàng với giá tốt nhất">
        <meta name="keywords" content="điện nước phúc lộc,sửa chữa điện nước 24h, sửa chữa điện chuyên nghiệp, thiết bị điện nước phúc lộc, đèn trang trí, thiết bị vệ sinh, cung cấp  thiết bị điện nước, chuyên cung cấp thiết bị chiếu sáng, chuyên cung cấp thiết bị đèn led, chuyên cugn cấp thiết bị điện nước quận 7, chuyên cung cấp thiết bị điện nước tphcm, cung cấp thiết bị chueeys sáng quận 7, thiết bị chiếu sáng quận 7, đèn led giá rẻ, đèn led chiếu sáng quận 7, dien nuoc phuc loc, sửa chữa điện nước 24h">
        <meta name="robots" content="index,follow">
        <meta name="geo.region" content="VN" />
        <meta name="geo.placename" content="454A Lê Văn Lương, Phường Tân Phong, Quận 7, TPHCM" />
        <meta name="geo.position" content="10.736075;106.702759" />
        <meta name="ICBM" content="10.736075, 106.702759" />
        <meta name="author" content="Minh Hồ - Điện Nước Phúc Lộc" />
        <meta name="revised" content="Điện Nước Phúc Lộc, 2/3/2020" />
        <meta property = "og:type" content = "article" />
        <meta property="og:title" content="@yield('title')" />
        <meta property = "og:url" content = "{{$url}}" />
        <meta property="og:image" content="@yield('imageOg')" />
        <meta property="og:description" content="Cửa Hàng Điện Nước Phúc Lộc chuyên cung cấp thiết bị điện nước, các loại đèn trang trí với uy tín và chất lượng lâu năm. Quý khách hãy liên hệ ngay cho Phúc Lộc để được mua hàng với giá tốt nhất" />

        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <title>Điện Nước 24H Chuyên Nghiệp Phúc Lộc | @yield('title')</title>

        <!-- Favicon -->
        <link rel="shortcut icon" type="image/x-icon" href="{{URL::to('public/frontend/assets/img/logo/pc.png')}}">
		<!-- all css here -->
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/bootstrap.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/animate.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/owl.carousel.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/chosen.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/themify-icons.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/ionicons.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/meanmenu.min.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/bundle.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/style.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/responsive.css')}}">
        <link rel="stylesheet" href="{{URL::to('public/frontend/assets/css/easyzoom.css')}}">
    </head>
    <style>
        .pace {
          -webkit-pointer-events: none;
          pointer-events: none;
          -webkit-user-select: none;
          -moz-user-select: none;
          user-select: none;
        }

        .pace-inactive {
          display: none;
        }

        .pace .pace-progress {
          background: #ee1116;
          position: fixed;
          z-index: 2000;
          top: 0;
          right: 100%;
          width: 100%;
          height: 2px;
        }

        .pace .pace-progress-inner {
          display: block;
          position: absolute;
          right: 0px;
          width: 100px;
          height: 100%;
          box-shadow: 0 0 10px #ee1116, 0 0 5px #ee1116;
          opacity: 1.0;
          -webkit-transform: rotate(3deg) translate(0px, -4px);
          -moz-transform: rotate(3deg) translate(0px, -4px);
          -ms-transform: rotate(3deg) translate(0px, -4px);
          -o-transform: rotate(3deg) translate(0px, -4px);
          transform: rotate(3deg) translate(0px, -4px);
        }

        .pace .pace-activity {
          display: block;
          position: fixed;
          z-index: 2000;
          top: 15px;
          right: 15px;
          width: 14px;
          height: 14px;
          border: solid 2px transparent;
          border-top-color: #ee1116;
          border-left-color: #ee1116;
          border-radius: 10px;
          -webkit-animation: pace-spinner 400ms linear infinite;
          -moz-animation: pace-spinner 400ms linear infinite;
          -ms-animation: pace-spinner 400ms linear infinite;
          -o-animation: pace-spinner 400ms linear infinite;
          animation: pace-spinner 400ms linear infinite;
        }

        @-webkit-keyframes pace-spinner {
          0% { -webkit-transform: rotate(0deg); transform: rotate(0deg); }
          100% { -webkit-transform: rotate(360deg); transform: rotate(360deg); }
        }
        @-moz-keyframes pace-spinner {
          0% { -moz-transform: rotate(0deg); transform: rotate(0deg); }
          100% { -moz-transform: rotate(360deg); transform: rotate(360deg); }
        }
        @-o-keyframes pace-spinner {
          0% { -o-transform: rotate(0deg); transform: rotate(0deg); }
          100% { -o-transform: rotate(360deg); transform: rotate(360deg); }
        }
        @-ms-keyframes pace-spinner {
          0% { -ms-transform: rotate(0deg); transform: rotate(0deg); }
          100% { -ms-transform: rotate(360deg); transform: rotate(360deg); }
        }
        @keyframes pace-spinner {
          0% { transform: rotate(0deg); transform: rotate(0deg); }
          100% { transform: rotate(360deg); transform: rotate(360deg); }
        }
    </style>
    <body  style="font-family:'Times New Roman', Times, serif">
        <div class="wrapper">
            <!-- header start -->
            <header>
                <div class="header-area transparent-bar">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-1 col-md-1 col-sm-5 col-5">
                                <div class="language-currency">
                                    <div class="language">
                                        <select class="select-header orderby">
                                            <option value="">ENGLISH</option>
                                            <option value="">VIE</option>
                                        </select>
                                    </div>
                                    <div class="currency">
                                        {{-- <select class="select-header orderby">
                                            <option value="">USD</option>
                                            <option value="">US </option>
                                            <option value="">EURO</option>
                                        </select> --}}
                                    </div>
                                </div>
                                <div class="sticky-logo">
                                    <a href="{{route('home')}}"><img src="{{URL::to('public/frontend/assets/img/logo/dt.png')}}" alt="logo" /></a>
                                </div>
                                <div class="logo-small-device">
                                    <a href="{{route('home')}}"><img alt="" src="{{URL::to('public/frontend/assets/img/logo/dt.png')}}" alt="logo"></a>
                                </div>
                            </div>
                            <div class="col-lg-10 col-md-10 d-none d-md-block">
                                <div class="logo-menu-wrapper text-center">
                                    <div class="logo">
                                        <a href="{{route('home')}}"><img src="{{URL::to('public/frontend/assets/img/logo/pc.png')}}" alt="logo" /></a>
                                    </div>
                                    <div class="main-menu">
                                        <nav>
                                            <ul>
                                                <li>
                                                    <a href="{{route('home')}}"><b>Trang chủ</b></a>
                                                </li>
                                                <li>
                                                    <a href="{{route('shopindex')}}"><b>Cửa Hàng</b></a>
                                                </li>
                                                <li><a  href="javascript:void(0)"><b>Danh Mục <i class="ion-ios-arrow-down"></i></b></a>
                                                    <ul>
                                                        @foreach ($categoryindex as $category)
                                                            @if ($category->category_status == 1)
                                                            <li><a href="{{route('getcategoryshop',$category->category_slug)}}">{{$category->category_name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a  href="javascript:void(0)"><b>Thương Hiệu <i class="ion-ios-arrow-down"></i></b></a>
                                                    <ul>
                                                        @foreach ($brandindex as $brand)
                                                           @if ($brand->brand_status == 1)
                                                                <li><a href="{{route('getbrandshop',$brand->brand_slug)}}">{{$brand->brand_name}}</a></li>
                                                           @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a  href="{{route('news')}}"><b>Blog</b></a>
                                                </li>
                                            </ul>
                                        </nav>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-1 col-md-1 col-sm-7 col-7">
                                <div class="header-site-icon">
                                    <div class="header-search same-style">
                                        <button class="sidebar-trigger-search">
                                            <span class="ti-search"></span>
                                        </button>
                                    </div>
                                    <div class="header-login same-style">
                                        <a href="{{URL::to('staff')}}">
                                            <span class="ti-user"></span>
                                        </a>
                                    </div>
                                    <div class="header-cart same-style">
                                        <button class="sidebar-trigger">
                                            <i class="ti-shopping-cart"></i>
                                            <span class="count-style">{{$countcart}}</span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                            <div class="mobile-menu-area col-12">
                                <div class="mobile-menu">
                                    <nav id="mobile-menu-active">
                                        <ul class="menu-overflow">
                                                <li>
                                                    <a href="{{route('home')}}">Trang chủ</a>
                                                </li>
                                                <li>
                                                    <a href="{{route('shopindex')}}">Shop</a>
                                                </li>
                                                <li><a href="javascript:void(0)">Danh Mục <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                        @foreach ($categoryindex as $category)
                                                            @if ($category->category_status == 1)
                                                                <li><a href="{{route('getcategoryshop',$category->category_slug)}}">{{$category->category_name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li><a href="javascript:void(0)">Thương Hiệu <i class="ion-ios-arrow-down"></i></a>
                                                    <ul>
                                                        @foreach ($brandindex as $brand)
                                                            @if ($brand->brand_status == 1)
                                                                <li><a href="{{route('getbrandshop',$brand->brand_slug)}}">{{$brand->brand_name}}</a></li>
                                                            @endif
                                                        @endforeach
                                                    </ul>
                                                </li>
                                                <li>
                                                    <a href="{{route('news')}}">Blog</a>
                                                </li>
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <!-- sidebar-cart start -->
            <div class="sidebar-cart onepage-sidebar-area">
                <div class="wrap-sidebar">
                    <div class="sidebar-cart-all">
                        <div class="sidebar-cart-icon">
                            <button class="op-sidebar-close"><span class="ti-close"></span></button>
                        </div>
                        <div class="cart-content">
                            <h3 style="font-family:'Times New Roman', Times, serif"><b>GIỎ HÀNG</b></h3>
                            <ul>
                                @foreach ($productcart as $productcartshow)
                                    <li class="single-product-cart">
                                        <div class="cart-img">
                                            <a href="#"><img src="{{asset('storage/app/'.$productcartshow->attributes->code.'/'.$productcartshow->attributes->img)}}" alt="" width="80" height="80"></a>
                                        </div>
                                        <div class="cart-title">
                                            <h3><a href="#"> {{ Str::words($productcartshow->name, 4,'....') }}</a></h3>
                                            <span>{{$productcartshow->quantity}} x {{$productcartshow->price}}</span>
                                        </div>
                                        <div class="cart-delete">
                                            <button id="" type="button" class="Del-cart-btn btn btn-outline-danger pr-4 pl-4"  data-url="{{route('delcart',$productcartshow->id)}}">
                                                <i class="ion-ios-trash-outline" aria-hidden="true"></i>
                                            </button>
                                        </div>
                                    </li>
                                @endforeach
                                <li class="single-product-cart">
                                    <div class="cart-total">
                                        <h4 style="font-family: 'Times New Roman', Times, serif ;font-size:20px" >Tổng : <span>{{number_format($total)}}</span></h4>
                                    </div>

                                </li>
                            </ul>
                            <div class="cart-checkout-btn">
                                <a class="cr-btn btn-style cart-btn-style" href="{{route('cartshow')}}"><span>Xem giỏ hàng</span></a>
                                <a class="no-mrg cr-btn btn-style cart-btn-style" href="{{route('cartcomplete')}}"><span>Tiếp tục thanh toán</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- main-search start -->
            <div class="main-search-active">
                <div class="sidebar-search-icon">
                    <button class="search-close"><span class="ti-close"></span></button>
                </div>
                <div class="sidebar-search-input">
                <form method="GET" action="{{asset('search/')}}" role="search">
                        <div class="form-search">
                            <input id="search" name="result" class="input-text"  placeholder="Tìm kiếm sản phẩm" type="text">
                            <button type="submit">
                                <i class="ti-search"></i>
                            </button>
                        </div>
                    </form>
                </div>
            </div>


                {{-- body content --}}
                @yield('content')
                @yield('ContentProductDetail')
                @yield('ShopContent')
                @yield('Searchindex')
                @yield('NewsDetail')
                @yield('NewsBlog')
                @yield('CartContent')
                @yield('CartComplete')
                @yield('finishOrderContent')


                {{-- end body content --}}

            <footer class="gray-bg footer-padding">
                <div class="container-fluid">
                    <div class="footer-top pt-85 pb-25">
                        <div class="row">
                            <div class="col-lg-3 col-md-5">
                                <div class="footer-widget mb-30">
                                    <div class="footer-widget-title">
                                        <h3 style="font-family:'Times New Roman', Times, serif">Liên Hệ</h3>
                                    </div>
                                    <div class="food-info-wrapper">
                                        <div class="food-address">
                                            <div class="food-info-icon">
                                                <i class="ion-ios-home-outline"></i>
                                            </div>
                                            <div class="food-info-content">
                                                <p>454A Lê Văn Lương, Phường Tân Phong, Quận 7, TP.HCM</p>
                                            </div>
                                        </div>
                                        <div class="food-address">
                                            <div class="food-info-icon">
                                                <i class="ion-ios-telephone-outline"></i>
                                            </div>
                                            <div class="food-info-content">
                                                <p>0978.273.233</p>
                                            </div>
                                        </div>
                                        <div class="food-address">
                                            <div class="food-info-icon">
                                                <i class="ion-ios-email-outline"></i>
                                            </div>
                                            <div class="food-info-content">
                                                <p><a href="#">admin@diennuocphucloc.com</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-4">
                                <div class="footer-widget mb-30">
                                    <div class="footer-widget-title">
                                        <h3 style="font-family:'Times New Roman', Times, serif">DANH MỤC</h3>
                                    </div>
                                    <div class="food-widget-content">
                                        <ul class="quick-link">
                                            @foreach ($categoryindex as $category)
                                                @if ($category->category_status == 1)
                                                    <li><a href="#">{{$category->category_name}}</a></li>
                                                @endif
                                            @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-3">
                                <div class="footer-widget mb-30">
                                    <div class="footer-widget-title">
                                        <h3 style="font-family:'Times New Roman', Times, serif">Thương hiệu</h3>
                                    </div>
                                    <div class="food-widget-content">
                                        <ul class="quick-link">
                                                @foreach ($brandindex as $brand)
                                                    @if ($brand->brand_status == 1)
                                                        <li><a href="#">{{$brand->brand_name}}</a></li>
                                                    @endif
                                                @endforeach
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-2 col-md-6">
                                <div class="footer-widget mb-30">
                                    <div class="footer-widget-title">
                                        <h3 style="font-family:'Times New Roman', Times, serif">Hổ trợ</h3>
                                    </div>
                                    <div class="food-widget-content">
                                        <ul class="quick-link">
                                            <li><a href="tel:0911556664">0911.556.664</a></li>
                                            <li><a href="tel:0978273233">0978.273.233</a></li>
                                            <li><a href="tel:0978273733">0978.273.733</a></li>
                                            <li><a href="tel:0978273733">0344.387.371</a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-md-6">
                                <div class="footer-widget mb-30">
                                    <div class="footer-widget-title">
                                        <h3>FaceBook</h3>
                                    </div>
                                    <div class="twitter-info-wrapper">
                                        <div class="single-twitter">
                                            <div class="twitter-icon">
                                                <i class="ion-social-facebook-outline"></i>
                                            </div>
                                            <div class="twitter-content">
                                                <p>Minh Hồ <a href="#">IT</a> <a class="link1" href="#">@hominhs</a> <a class="link2" href="#">https://facebook.com/HoMinh.Error</a></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom border-top-1 ptb-15">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="copyright-payment">
                                    <div class="copyright">
                                        <p>Copyright ©  2018 <a href="https://freethemescloud.com/">Free themes Cloud</a> All RIght Reserved. Mod by Minh Hồ</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="footer-payment-method">
                                    <a href="#"><img alt="" src="{{URL::to('public/frontend/assets/img/icon-img/7.png')}}"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                {{-- call phone --}}
                <div class="hotline-phone-ring-wrap">
                    <div class="hotline-phone-ring">
                        <div class="hotline-phone-ring-circle"></div>
                        <div class="hotline-phone-ring-circle-fill"></div>
                        <div class="hotline-phone-ring-img-circle">
                        <a href="tel:0978273233" class="pps-btn-img">
                            <img src="{{URL::to('public/frontend/assets/img/callphone/call.png')}}" alt="Gọi điện thoại" width="50">
                        </a>
                        </div>
                    </div>
                    <div class="hotline-bar">
                        <a href="tel:0978273233">
                            <span class="text-hotline">0978.273.233</span>
                        </a>
                    </div>
                </div>
                <div id="fb-root"></div>
                <!--Your customer chat code -->
                <div class="fb-customerchat"
                    attribution=install_email
                    page_id="101423508109111"
                    logged_in_greeting="Xin Chào!! Chúng tôi có thể giúp gì cho bạn??"
                    logged_out_greeting="Xin Chào!! Chúng tôi có thể giúp gì cho bạn??">
                </div>
            </footer>

        </div>

		<!-- all js here -->
        <script src="{{ URL::to('public/frontend/assets/js/vendor/jquery-1.12.0.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/popper.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/bootstrap.min.js')}}"></script>
        <script src="https://cdn.jsdelivr.net/npm/intersection-observer@0.7.0/intersection-observer.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/vanilla-lazyload@15.2.0/dist/lazyload.min.js"></script>

        <script src="{{ URL::to('public/frontend/assets/js/isotope.pkgd.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/imagesloaded.pkgd.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/jquery.counterup.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/waypoints.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/owl.carousel.min.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/plugins.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/main.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/scriptJs.js')}}"></script>
        <script src="{{ URL::to('public/frontend/assets/js/pace.min.js')}}"></script>
        <script src="{{ URL::asset('./resources/js/ajaxindex.js')}}"></script>
        <script src="{{URL::to('public/frontend/assets/js/vendor/modernizr-2.8.3.min.js')}}"></script>
        <script data-ad-client="pub-8602037860916317" async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <script async src="https://www.googletagmanager.com/gtag/js?id=UA-159339475-1"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
        <script>
            const lazyLoadInstance = new LazyLoad({
            elements_selector: ".imageLazyLoad",
            load_delay: 200
            });
        </script>
        <script type="text/javascript">
            function addCartIndex(id){
                $.get(
                        '{{route('cartaddajax')}}',
                        {id:id},
                        function(){
                            let timerInterval
                            Swal.fire({
                            //   title: '<div style="font-family"></div>',
                              html: 'Vui lòng chờ <b></b> milliseconds.',
                              allowOutsideClick:false,
                              timer: 3000,
                              timerProgressBar: true,
                              onBeforeOpen: () => {
                                Swal.showLoading()
                                timerInterval = setInterval(() => {
                                  const content = Swal.getContent()
                                  if (content) {
                                    const b = content.querySelector('b')
                                    if (b) {
                                      b.textContent = Swal.getTimerLeft()
                                    }
                                  }
                                }, 100)
                              },
                              onClose: () => {
                                clearInterval(timerInterval)
                              }
                            }).then((result) => {
                              /* Read more about handling dismissals below */
                              if (result.dismiss === Swal.DismissReason.timer) {
                                    const Toast = Swal.mixin({
                                          toast: true,
                                          position: 'bottom-end,relative',
                                          showConfirmButton: false,
                                          timer: 3000,
                                          timerProgressBar: true,
                                          allowOutsideClick:false,
                                          onOpen: (toast) => {
                                            toast.addEventListener('mouseenter', Swal.stopTimer)
                                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                                          }
                                    });
                                    Toast.fire({
                                      icon: 'success',
                                      title: 'Thêm sản phẩm thành công',
                                    }).then(()=>{
                                        window.location.reload(true);
                                    });
                              }
                            })

                        }
                    );
            }
        </script>



    </body>
</html>
