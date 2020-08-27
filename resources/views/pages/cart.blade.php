@extends('welcome')
@section('title', 'Giỏ Hàng')
@section('CartContent')
<script type="text/javascript">
    function updateCart(qty,id){
        if(qty >= 1){
            $.get(
                '{{route('updatecart')}}',
                {qty:qty,id:id},
                function(){
                    alert('Đã cập nhật số lượng giỏ hàng');
                    window.location.reload();
                }
            )
        }else{
            alert('Vui lòng nhập số lượng >= 1');
        }
}

</script>
<div class="header-height"></div>
 <!-- main-search start -->
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2 style="font-family:'Times New Roman', Times, serif"><strong>GIỎ HÀNG<strong></h2>
            <ul>
                <li>
                    <a href="#">Cart</a>
                </li>
                <li>Show</li>
            </ul>
        </div>
    </div>
</div>
<div class="banner-area hm-4-padding">
                <div class="container-fluid">
                   <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                    <!-- QC_brandproduct -->
                    <ins class="adsbygoogle"
                         style="display:block"
                         data-ad-client="ca-pub-8602037860916317"
                         data-ad-slot="4348666059"
                         data-ad-format="auto"
                         data-full-width-responsive="true"></ins>
                    <script>
                         (adsbygoogle = window.adsbygoogle || []).push({});
                    </script>
                </div>
</div> 

{{-- cart content --}}
<div class="product-cart-area hm-3-padding pt-80 pb-130 " >
    <div class="container-fluid">
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
                <div class="table-content table-responsive" >
                    <table>
                        <thead>
                            <tr>
                                <th class="product-name">Sản phẩm</th>
                                <th class="product-price">Tên sản phẩm</th>
                                <th class="product-code">Mã sản phẩm</th>
                                <th class="product-name">giá</th>
                                <th class="product-price">số lượng</th>
                                <th class="product-quantity">Tổng tiền</th>
                                <th class="product-subtotal">Xóa</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($productcart as $product)
                            <tr>
                                <td class="product-thumbnail">
                                    <a href="{{route('productdetailindex',$product->id)}}"><img class="imageLazyLoad" data-src="{{asset('storage/app/'.$product->attributes->code.'/'.$product->attributes->img)}}" alt="" width="120" height="150"></a>
                                </td>
                                <td class="product-name">
                                    <a href="{{route('productdetailindex',$product->id)}}">{{$product->name}}</a>
                                </td>
                                <td class="product-code">
                                    <a href="{{route('productdetailindex',$product->id)}}">{{$product->attributes->code}}</a>
                                </td>
                                <td class="product-price">
                                    <span class="amount">
                                            {{number_format($product->price)}}
                                    </span>
                                </td>
                                <td class="product-quantity">
                                    <div class="quantity-range">
                                        <input onchange="updateCart(this.value,'{{$product->id}}')" class="input-text qty text" type="number" name="qty" step="1" min="1"  title="Qty" size="4" value="{{$product->quantity}}">
                                    </div>
                                </td>
                                <td class="product-subtotal">{{number_format($product->price*$product->quantity)}}</td>
                                <td class="product-cart-icon product-subtotal">
                                    <button id="" type="button" class="Del-cart-btn btn btn-outline-danger pr-4 pl-4"  data-url="{{route('delcart',$product->id)}}">
                                        <i class="ion-ios-trash-outline" aria-hidden="true"></i>
                                    </button>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="cart-shiping-update">
                    <div class="cart-shipping">
                        <a class="btn-style cr-btn" href="{{route('home')}}">
                            <span>Trở lại mua hàng</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-7 col-sm-6">
                <div class="">
                    {{-- <h4>enter your discount code</h4>
                    <div class="coupon">
                        <input type="text">
                        <input class="cart-submit" type="submit" value="enter">
                    </div> --}}
                </div>
            </div>
            <div class="col-md-5 col-sm-6" >
                <div class="shop-total" >
                    <h3>Tổng giá đơn hàng</h3>
                    <ul>
                        <li>
                            Tổng phụ
                            <span>{{number_format($totalsub)}}</span>
                        </li>
                        {{-- <li>
                            tax
                            <span>$9.00</span>
                        </li> --}}
                        <li class="order-total">
                            vận chuyển
                            <span>0</span>
                        </li>
                        <li>
                            Tổng đơn hàng
                            <span>{{number_format($total)}} VNĐ</span>
                        </li>
                    </ul>
                </div>
                <div class="cart-btn text-center mb-15">
                    <a href="{{route('cartcomplete')}}">Thanh Toán</a>
                </div>
               
            </div>
        </div>
    </div>
</div>
@endsection