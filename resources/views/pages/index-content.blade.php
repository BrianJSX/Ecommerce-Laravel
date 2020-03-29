@extends('welcome')
@section('title', 'Trang chủ')
@section('content')
<div class=" slider-area">
    <div class="new-collection-slider owl-carousel carousel slide" data-ride="carousel">
        @foreach ($sliderindex as $slider)
            @if ($slider->slider_status == 1)
                <div class="single-slider slider-1 gray-bg ">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="slider-content slider-animated-1 mt-0">
                                    <h2 class="animated" style="font-family:'Times New Roman', Times, serif"><span><b>{{$slider->slider_title}}</b></span></h2>
                                    <p class="animated" style="font-family:'Times New Roman', Times, serif;color:black" >{{$slider->slider_content}}</p>
                                    <a class="slider-btn animated" href="{{$slider->slider_links}}">Xem chi tiết</a>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="slider-single-img slider-animated-1">
                                    <img class="animated" src="{{asset('storage/app/SliderImages/'.$slider->slider_img)}}" alt="slider images" width="" height="280px" >
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endif
        @endforeach
    </div>
</div>

<div class="banner-area hm1-banner pt-20 pb-107">
                {{-- <div class="container">
                    <div class="row">
                        <div class="col-md-12 col-lg-4">
                            <div class="banner-wrapper banner-border ml-10 mb-30">
                                <div class="banner-img">
                                    <a href="#"><img src="public/frontend/assets/img/banner/1.jpg" alt="image"></a>
                                </div>
                                <div class="banner-content-style1 banner-position-center-right">
                                    <h2>30% <span><img src="public/frontend/assets/img/icon-img/discount.png" alt="image"></span> <br>Products</h2>
                                </div>
                            </div>
                            <div class="banner-wrapper banner-border ml-10 mb-30">
                                <div class="banner-img">
                                    <a href="#"><img src="public/frontend/assets/img/banner/2.jpg" alt="image"></a>
                                </div>
                                <div class="banner-content-style2 banner-position-center-left">
                                    <h3>Don’t Miss</h3>
                                    <h2>Rattan <span>Bag.</span></h2>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="banner-wrapper mrg-mb-md">
                                <div class="banner-img">
                                    <a href="#"><img src="public/frontend/assets/img/banner/3.jpg" alt="image"></a>
                                </div>
                                <div class="banner-content-style3 banner-position-top">
                                    <h3>Black Friday Offer</h3>
                                </div>
                                <div class="banner-content-style4 banner-position-bottom">
                                    <h3>20% Off</h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12 col-lg-4">
                            <div class="banner-wrapper banner-border-2 mr-10 mb-30">
                                <div class="banner-img">
                                    <a href="#"><img src="public/frontend/assets/img/banner/4.jpg" alt="image"></a>
                                </div>
                                <div class="banner-content-style2 banner-position-center-left">
                                    <h3>Don’t Miss</h3>
                                    <h2>Rattan <span>Lamp.</span></h2>
                                </div>
                            </div>
                            <div class="banner-wrapper banner-border-2 mr-10 mb-30">
                                <div class="banner-img">
                                    <a href="#"><img src="public/frontend/assets/img/banner/5.jpg" alt="image"></a>
                                </div>
                                <div class="banner-content-style1 banner-position-center-right">
                                    <h2>30% <span> <img src="public/frontend/assets/img/icon-img/discount.png" alt="image"></span> <br>Products</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> --}}

<div class="product-area pb-80">
    <div class="container">
            <div class="container">
                    <div class="section-title text-center mb-55">
                        <h2 style="font-family:'Times New Roman', Times, serif">SẢN PHẨM MỚI NHẤT</h2>
                    </div>
                    <div class="row">
                        <div class="col-lg-6">
                                    <div class="new-collection-slider owl-carousel mb-30">
                                        @foreach ($sliderindex as $slider)
                                            @if ($slider->slider_status_new == 1)
                                                <div class="single-new-collection">
                                                    <a href="shop.html"><img alt="image" src="{{asset('public/frontend/assets/img/nen_new_slider.png')}}" width="570" height="439"></a>
                                                    <div class="new-collection-content slider-animated-3">
                                                        <h2 class="animated" style="color:white;font-family:'Times New Roman', Times, serif">{{$slider->slider_title}}</h2>
                                                        <a href="#" class="btn-style cr-btn animated"><span>Xem chi tiết</span></a>
                                                    </div>
                                                </div>
                                            @endif
                                        @endforeach
                                    </div>            
                            </div>
                        <div class="col-lg-6">
                            <div class="row">
                               
                                @foreach ($productnew as $productnew)
                                        <div class="col-lg-6 col-md-6">
                                            <div class="product-wrapper mb-45">
                                                <div class="product-img">
                                                    <a href="{{route('productdetailindex',$productnew->prod_slug)}}">
                                                        <img src="{{asset('storage/app/'.$productnew->prod_code.'/'.$productnew->prod_img)}}" height="326px" height="270"  alt="">
                                                    </a>
                                                    <span>Mới</span>
                                                        <input id="Prod_id" type="hidden" value="{{$productnew->prod_id}}">
                                                    <div class="product-action">
                                                        <div class="product-action-style" data-id="{{$productnew->prod_id}}">
                                                            <a class="action-plus" title="Xem chi tiết"  href="{{route('productdetailindex',$productnew->prod_slug)}}">
                                                                <i class="ti-plus"></i>
                                                            </a>
                                                            <a href="javascript:void(0)" type="button" id="addCartNew" onclick="addCartIndex('{{$productnew->prod_id}}')" class="action-cart ml-2 mr-2" title="Add To Cart" >
                                                                <i style="font-size:22px" class="ti-shopping-cart"></i>
                                                            </a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="product-content text-center">
                                                    <h4 style="font-family:'Times New Roman', Times, serif"><a href="{{route('productdetailindex',$productnew->prod_slug)}}"><b>{{$productnew->prod_name}}</b></a></h4>
                                                    <h6 class="mt-2" style="font-family:'Times New Roman', Times, serif">Mã SP: {{$productnew->prod_code}}</h6>
                                                    <div class="product-rating">
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                        <i class="ion-ios-star"></i>
                                                    </div>
                                                    <h6><a href="product-details.html">{{$productnew->brand_name}}</a ></h6>
                                                    <div class="product-price">
                                                            @if ($productnew->prod_sale < $productnew->prod_price && $productnew->prod_sale > 0 )
                                                            <span class="old" style="color:red">{{number_format($productnew->prod_price)}}VNĐ</span>
                                                            <span><b>{{number_format($productnew->prod_sale)}}VNĐ</b></span>
                                                        @else
                                                            <span><b>{{number_format($productnew->prod_price)}}VNĐ</b></span>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                       
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="section-title text-center pt-50 mb-55">
                        <h2 style="font-family:'Times New Roman', Times, serif">SẢN PHẨM NỔI BẬT</h2>
                </div>
        <div class="tab-content">
            <div class="tab-pane active" id="home1" role="tabpanel">
                <div class="row">
                    @foreach ($productfeatured as $productfeatured)
                        <div class="col-md-6 col-lg-4 col-xl-3">
                            <div class="product-wrapper mb-45">
                                <div class="product-img">
                                        <a href="{{route('productdetailindex',$productnew->prod_slug)}}">
                                            <img width="270" height="326" src="{{asset('storage/app/'.$productfeatured->prod_code.'/'.$productfeatured->prod_img)}}" height="326px" height="270" = alt="">
                                        </a>
                                    <span>{{$productfeatured->prod_promotion}}</span>
                                    <div class="product-action">
                                        <div class="product-action-style">
                                            <a class="action-plus" title="Xem chi tiết"  href="{{route('productdetailindex',$productfeatured->prod_slug)}}">
                                                <i class="ti-plus"></i>
                                            </a>
                                            {{-- <a class="action-heart" title="Wishlist" href="#">
                                                <i class="ti-heart"></i>
                                            </a> --}}
                                            <a href="javascript:void(0)" id="addCartNew" onclick="addCartIndex('{{$productfeatured->prod_id}}')" class="action-cart ml-2 mr-2" title="Add To Cart" >
                                                <i style="font-size:22px" class="ti-shopping-cart"></i>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                                <div class="product-content text-center">
                                    <h4><a style="font-family:'Times New Roman', Times, serif" href="{{route('productdetailindex',$productfeatured->prod_slug)}}"><b>{{$productfeatured->prod_name}}</b></a></h4>
                                    <h6 class="mt-2" style="font-family:'Times New Roman', Times, serif">Mã SP: {{$productfeatured->prod_code}}</h6>
                                    <div class="product-rating">
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                        <i class="ion-ios-star"></i>
                                    </div>
                                    <h6><a href="#">{{$productfeatured->brand_name}}</a></h6>
                                    <div class="product-price">
                                        @if ($productfeatured->prod_sale < $productfeatured->prod_price && $productfeatured->prod_sale > 0 )
                                            <span class="old" style="color:red">{{number_format($productfeatured->prod_price)}}VNĐ</span>
                                            <span><b>{{number_format($productfeatured->prod_sale)}}VNĐ</b></span>
                                        @else
                                            <span><b>{{number_format($productfeatured->prod_price)}}VNĐ</b></span>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    
                    
{{-- <div class="banner-area pb-95">
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-6">
                <div class="banner-wrapper overflow mb-30">
                    <div class="banner-img">
                        <a href="#">
                            <img alt="image" src="public/frontend/assets/img/banner/6.jpg">
                        </a>
                    </div>
                    <div class="banner-content-5">
                        <h4>New Arrivals</h4>
                        <h2>Rattan Sofa</h2>
                        <h3>Sale up to 30% off all</h3>
                        <a href="#" class="banner-btn">View Collection</a>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="banner-wrapper overflow mb-30">
                    <div class="banner-img">
                        <a href="#">
                            <img alt="image" src="public/frontend/assets/img/banner/7.jpg">
                        </a>
                    </div>
                    <div class="banner-content-5">
                        <h4>Best Products</h4>
                        <h2>Rattan Accessories</h2>
                        <h3>Sale up to 40% off all</h3>
                        <a href="#" class="banner-btn">View Collection</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> --}}
<div class="new-collection-area pb-90">
</div>
<!--<div class="dealy-of-product-area gray-bg dealy-mrg">-->
<!--                <div class="container">-->
<!--                    <div class="row">-->
<!--                        <div class="col-lg-3 col-md-12">-->
<!--                            <div class="dealy-product-img wow fadeInLeft">-->
<!--                                <img src="public/frontend/assets/img/banner/1.png" alt="image">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-6 col-md-12 dealy-product-content-center">-->
<!--                            <div class="dealy-product-content">-->
<!--                                <h3><a href="#">Rattan Rocking Cradle</a></h3>-->
<!--                                <div class="dealy-rating">-->
<!--                                    <i class="ion-ios-star"></i>-->
<!--                                    <i class="ion-ios-star"></i>-->
<!--                                    <i class="ion-ios-star"></i>-->
<!--                                    <i class="ion-ios-star"></i>-->
<!--                                    <i class="ion-ios-star"></i>-->
<!--                                </div>-->
<!--                                <div class="dealy-price">-->
<!--                                    <span class="old">$20.00</span>-->
<!--                                    <span>$15.00</span>-->
<!--                                </div>-->
<!--                                <div class="timer">-->
<!--                                    <div data-countdown="2018/06/01"></div>-->
<!--                                </div>-->
<!--                                <a href="#" class="btn-style cr-btn"><span>shop now</span></a>-->
<!--                            </div>-->
<!--                        </div>-->
<!--                        <div class="col-lg-3 col-md-12">-->
<!--                            <div class="dealy-product-img wow fadeInRight f-right">-->
<!--                                <img src="public/frontend/assets/img/banner/2.png" alt="image">-->
<!--                            </div>-->
<!--                        </div>-->
<!--                    </div>-->
<!--                </div>-->
<!--</div> -->
            <div class="blog-area pt-50 pb-85 blog-padding hm-blog">
                <div class="container-fluid">
                        <div class="section-title text-center mb-55">
                                <h2 style="font-family:'Times New Roman', Times, serif">TIN TỨC MỚI</h2>
                        </div>
                    <div class="row" >
                        @foreach ($newsindex as $news)
                            @if ($news->news_status == 1)
                            <div class="col-lg-4 col-md-6" >
                                <div class="blog-hm-wrapper mb-40">
                                    <div class="blog-img">
                                        <a href="{{route('newsdetail',$news->news_slug)}}">
                                            <img src="{{asset('storage/app/NewsImages/'.$news->news_img)}}" alt="{{$news->news_img}}" width="407px" height="209px">
                                        </a>
                                    </div>
                                    <div class="blog-hm-content">
                                        <h3><a href="{{route('newsdetail',$news->news_slug)}}" style="font-family:'Times New Roman', Times, serif"><b>{{Str::words($news->news_title,15,'....')}}</b></a></h3>
                                        <div class="blog-meta">
                                            <ul>
                                                <li><span>Đăng Bởi:</span><a href="#">{{$news->name}}</a></li>
                                                <br>
                                                <li><span>Ngày Đăng:</span> {{$news->created_at}}</li>
                                            </ul>
                                        </div>
                                        {{-- <p class="mt-0">{!! Str::words($news->news_description, 4,'....') !!}</p> --}}
                                        <div class="product-share mt-0">
                                                <ul>
                                                    <li>
                                                        <a href="#"><i class="ion-social-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="ion-social-tumblr"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"><i class="ion-social-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#"> <i class="ion-social-instagram-outline"></i></a>
                                                    </li>
                                                </ul>
                                            </div>
                                    </div>
                                </div>
                            </div>
                            @endif
                        @endforeach
                    </div>
                </div>
            </div>
            
@endsection