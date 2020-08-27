@extends('welcome')
@section('title', 'Tìm Kiếm Sản Phẩm')
@section('Searchindex')
<div class="header-height"></div>
            <div class="breadcrumb-area mt-37 hm-4-padding">
                <div class="container-fluid">
                    <div class="breadcrumb-content text-center">
                        <h2 style="font-family:'Times New Roman', Times, serif"><b>Tìm Kiếm Sản Phẩm</b></h2>
                        <ul>
                            <li>
                                <a href="{{route('home')}}">home</a>
                            </li>
                            <li>search</li>
                        </ul>
                    </div>
                </div>
            </div>
<div class="banner-area hm-4-padding">
                <div class="container-fluid">
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- qc_x2 -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8602037860916317"
                         data-ad-slot="2334776613"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
</div> 
<div class="shop-wrapper mt-3 hm-3-padding pt-20 pb-100">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="shop-topbar-wrapper">
                        <div class="grid-list-options">
                            <ul class="view-mode">
                                <li class="active"><a href="#product-grid" data-view="product-grid"><i class="ion-grid"></i></a></li>
                                <li><a href="#product-list" data-view="product-list"><i class="ion-navicon"></i></a></li>
                            </ul>
                        </div>
                        <div class="shop-filter">
                            <button class="product-filter-toggle">Hiển thị tất cả</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="product-filter-wrapper">
                        <div class="row">
                            <div class="product-filter col-md-3 col-sm-6 col-xs-12 mb-30">
                                <h5 style="font-family:'Times New Roman', Times, serif">Danh mục</h5>
                                <ul class="sort-by">
                                    @foreach ($categoryshopall as $categoryshop)
                                        <li><a href="{{route('getcategoryshop',$categoryshop->category_slug)}}">{{$categoryshop->category_name}}</a></li>
                                    @endforeach
                                </ul>
                            </div>
                            <div class="product-filter col-md-3 col-sm-6 col-xs-12 mb-30">
                                <h5 style="font-family:'Times New Roman', Times, serif">Thương hiệu</h5>
                                <ul class="color-filter">
                                    @foreach ($brandshopall as $brandshop)
                                        <li><a href="{{route('getbrandshop',$brandshop->brand_slug)}}">{{$brandshop->brand_name}}</a></li>
                                    @endforeach
                                    
                                </ul>
                            </div>
                            <div class="product-filter col-md-3 col-sm-6 col-xs-12 mb-30">
                                <h5>tags</h5>
                                <div class="product-tags">
                                    @foreach ($categoryshopall as $categoryshop)
                                        <a href="{{route('getcategoryshop',$categoryshop->category_slug)}}">{{$categoryshop->category_name}}</a>,
                                    @endforeach
                                    @foreach ($brandshopall as $brandshop)
                                        <a href="{{route('getbrandshop',$brandshop->brand_slug)}}">{{$brandshop->brand_name}}</a>
                                    @endforeach
                                </div>
                            </div>
                            <div class="product-filter col-md-3 col-sm-6 col-xs-12 mb-30">
                                {{-- <h5>Filter by price</h5>
                                <div id="price-range"></div>
                                <div class="price-values">
                                    <span>Price:</span>
                                    <input type="text" class="price-amount">
                                </div> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="grid-list-product-wrapper">
                    <div class="product-grid product-view">
                        <div class="row mb-5" style="font-family:'Times New Roman', Times, serif;font-size:40px">Kết quả tìm kiếm của : {{$keyword}}</div>
                        <div class="row">
                            @foreach ($items as $item)
                                <div class="product-width col-md-6 col-xl-3 col-lg-4">
                                    <div class="product-wrapper mb-35">
                                        <div class="product-img">
                                            <a href="{{route('productdetailindex',$item->prod_slug)}}">
                                                <img class="imageLazyLoad" data-src="{{asset('storage/app/'.$item->prod_code.'/'.$item->prod_img)}}" width="310px" height="375px" alt="">
                                            </a>
                                            <div class="price-decrease">
                                                <span>{{$item->prod_promotion}}</span>
                                            </div>
                                            <div class="product-action-3">
                                                <a class="action-plus-2" href="{{route('productdetailindex',$item->prod_slug)}}">
                                                    <i class="ti-plus"></i> Xem chi tiết
                                                </a>
                                            </div>
                                        </div>
                                        <div class="product-content">
                                            <div class="product-title-wishlist">
                                                <div class="product-title-3">
                                                    <h4><a style="font-family:'Times New Roman', Times, serif" href="{{route('productdetailindex',$item->prod_slug)}}"><b>{{$item->prod_name}} (MSP: {{$item->prod_code}})</b></a></h4>
                                                </div>
                                                <div class="product-wishlist-3">
                                                    <a href="#"><i class="ti-heart"></i></a>
                                                </div>
                                            </div>
                                            <div class="product-peice-addtocart">
                                                <div class="product-peice-3">
                                                        @if ($item->prod_sale < $item->prod_price && $item->prod_sale > 0 )
                                                            <span class="old">{{number_format($item->prod_price)}}VNĐ</span>
                                                            <span>{{number_format($item->prod_sale)}} VNĐ</span>
                                                        @else
                                                            <span>{{number_format($item->prod_price)}} VNĐ</span>
                                                        @endif
                                                </div>
                                                <div class="product-addtocart">
                                                    <a href="javascript:void(0)" onclick="addCartIndex('{{$item->prod_id}}')"> <i class="ti-shopping-cart"></i> Add to cart</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="product-list-details">
                                            <h2><a style="font-family:'Times New Roman', Times, serif" href="{{route('productdetailindex',$item->prod_slug)}}"><b>{{$item->prod_name}} (MSP: {{$item->prod_code}})</b></a></h2>
                                            <div class="product-rating">
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                                <i class="ion-ios-star"></i>
                                            </div>
                                            <div class="product-price">
                                                    @if ($item->prod_sale < $item->prod_price && $item->prod_sale > 0 )
                                                        <span class="old">{{number_format($item->prod_price)}}VNĐ</span>
                                                        <span>{{number_format($item->prod_sale)}} VNĐ</span>
                                                    @else
                                                        <span>{{number_format($item->prod_price)}} VNĐ</span>
                                                    @endif
                                            </div>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <div class="product-categories">
                                                            <h5 class="pd-sub-title">Phụ kiện</h5>
                                                        <ul>
                                                            <li>
                                                                <a>{{$item->prod_accessories}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-categories">
                                                            <h5 class="pd-sub-title">Bảo hành</h5>
                                                        <ul>
                                                            <li>
                                                                <a>{{$item->prod_warranty}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                    <div class="product-categories">
                                                            <h5 class="pd-sub-title">Tình trạng</h5>
                                                        <ul>
                                                            <li>
                                                                <a>{{$item->prod_condition}}</a>
                                                            </li>
                                                        </ul>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                        <div class="product-categories">
                                                                <h5 class="pd-sub-title">Danh mục sản phẩm</h5>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">{{$item->category_name}}</a>
                                                                    </li>
                                                                </ul>
                                                            </div>
                                                        <div class="product-categories">
                                                                <h5 class="pd-sub-title">Thương hiệu sản phẩm</h5>
                                                                <ul>
                                                                    <li>
                                                                        <a href="#">{{$item->brand_name}}</a>
                                                                    </li>
                                                                </ul>
                                                        </div>
                                                </div>
                                            </div>
                                            <div class="shop-list-cart">
                                                <a href="javascript:void(0)" onclick="addCartIndex('{{$item->prod_id}}')"> <i class="ti-shopping-cart"></i> Add to cart</a>
                                            </div>
                                           
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class=" text-center mt-30">
                            <ul>
                                    {{ $items->links() }} 
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
         <!-- modal -->
    </div>
@endsection