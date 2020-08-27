@extends('welcome')
@section('title', 'Thanh Toán Giỏ Hàng')
@section('CartComplete')
<div class="header-height"></div>
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2 style="font-family:'Times New Roman', Times, serif"><strong>Thanh Toán<strong></h2>
            <ul>
                <li>
                    <a href="#">cart</a>
                </li>
                <li>cartcomplete</li>
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
<!-- checkout-area start -->
<div class="checkout-area pt-20 mt-5 hm-3-padding pb-100">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="coupon-accordion">
                    <!-- ACCORDION START -->
                    {{-- <h3>Returning customer? <span id="showlogin">Click here to login</span></h3>
                    <div id="checkout-login" class="coupon-content">
                        <div class="coupon-info">
                            <p class="coupon-text">Quisque gravida turpis sit amet nulla posuere lacinia. Cras sed est sit amet ipsum luctus.</p>
                            <form action="#">
                                <p class="form-row-first">
                                    <label>Username or email <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row-last">
                                    <label>Password  <span class="required">*</span></label>
                                    <input type="text" />
                                </p>
                                <p class="form-row">					
                                    <input type="submit" value="Login" />
                                    <label>
                                        <input type="checkbox" />
                                         Remember me 
                                    </label>
                                </p>
                                <p class="lost-password">
                                    <a href="#">Lost your password?</a>
                                </p>
                            </form>
                        </div>
                    </div> --}}
                    <!-- ACCORDION END -->	
                    <!-- ACCORDION START -->
                    {{-- <h3>Have a coupon? <span id="showcoupon">Click here to enter your code</span></h3>
                    <div id="checkout_coupon" class="coupon-checkout-content">
                        <div class="coupon-info">
                            <form action="#">
                                <p class="checkout-coupon">
                                    <input type="text" placeholder="Coupon code" />
                                    <input type="submit" value="Apply Coupon" />
                                </p>
                            </form>
                        </div>
                    </div> --}}
                    <!-- ACCORDION END -->						
                </div>
            </div>
        </div>
    <form method="post">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-12">
                    <div class="checkbox-form">						
                        <h3>Chi tiết thanh toán</h3>
                        <div class="row">
                            <form action="">
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Họ tên người nhận <span class="required">*</span></label>										
                                        <input name="name" type="text" placeholder="" required/>
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Địa chỉ<span class="required">*</span></label>
                                        <input name="address" type="text" placeholder="Street address" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Email<span class="required">*</span></label>										
                                        <input name="email" type="email" required/>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="checkout-form-list">
                                        <label>Phone<span class="required">*</span></label>										
                                        <input name="phone" name="number" type="text" required/>
                                    </div>
                                </div>
                            {{-- <div class="col-md-12">
                                <div class="checkout-form-list create-acc">	
                                    <input id="cbox" type="checkbox" />
                                    <label>Create an account?</label>
                                </div>
                                <div id="cbox_info" class="checkout-form-list create-account">
                                    <p>Create an account by entering the information below. If you are a returning customer please login at the top of the page.</p>
                                    <label>Account password  <span class="required">*</span></label>
                                    <input type="password" placeholder="password" />	
                                </div>
                            </div>								 --}}
                        </div>
                        <div class="different-address">
                            {{-- <div class="ship-different-title">
                                <h3>
                                    <label>Ship to a different address?</label>
                                    <input id="ship-box" type="checkbox" />
                                </h3>
                            </div>
                            <div id="ship-box-info" class="row">
                                <div class="col-md-12">
                                    <div class="country-select">
                                        <label>Country <span class="required">*</span></label>
                                        <select>
                                          <option value="volvo">bangladesh</option>
                                          <option value="saab">Algeria</option>
                                          <option value="mercedes">Afghanistan</option>
                                          <option value="audi">Ghana</option>
                                          <option value="audi2">Albania</option>
                                          <option value="audi3">Bahrain</option>
                                          <option value="audi4">Colombia</option>
                                          <option value="audi5">Dominican Republic</option>
                                        </select> 										
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>First Name <span class="required">*</span></label>										
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Last Name <span class="required">*</span></label>										
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Company Name</label>
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Address <span class="required">*</span></label>
                                        <input type="text" placeholder="Street address" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">									
                                        <input type="text" placeholder="Apartment, suite, unit etc. (optional)" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Town / City <span class="required">*</span></label>
                                        <input type="text" placeholder="Town / City" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>State / County <span class="required">*</span></label>										
                                        <input type="text" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Postcode / Zip <span class="required">*</span></label>										
                                        <input type="text" placeholder="Postcode / Zip" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Email Address <span class="required">*</span></label>										
                                        <input type="email" placeholder="" />
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="checkout-form-list">
                                        <label>Phone  <span class="required">*</span></label>										
                                        <input type="text" placeholder="Postcode / Zip" />
                                    </div>
                                </div>								
                            </div> --}}
                            <div class="order-notes">
                                <div class="checkout-form-list mrg-nn">
                                    <label>Ghi chú đặt hàng</label>
                                    <textarea name="notes" id="checkout-mess" cols="30" rows="10" placeholder="Ghi chú về đơn đặt hàng của bạn, ví dụ ghi chú đặc biệt để giao hàng." ></textarea>
                                </div>									
                            </div>
                            {{csrf_field()}}
                        </div>													
                    </div>
            </div>	
            <div class="col-lg-6 col-md-12 col-12">
                <div class="your-order">
                    <h3>Đơn hàng của bạn</h3>
                    <div class="your-order-table table-responsive">
                        <table>
                            <thead>
                                <tr>
                                    <th class="product-name">Sản phẩm</th>
                                    <th class="product-total">Tổng tiền</th>
                                </tr>							
                            </thead>
                            <tbody>
                                @foreach ($productcart as $product)
                                    <tr class="cart_item">
                                        <td class="product-name">
                                            {{$product->name}} <strong class="product-quantity"> × {{$product->quantity}}</strong>
                                        </td>
                                        <td class="product-total">
                                            <span class="amount">{{number_format($product->price*$product->quantity)}}</span>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr class="cart-subtotal">
                                    <th>Tổng phụ</th>
                                    <td><span class="amount">{{number_format($totalsub)}}</span></td>
                                </tr>
                                <tr class="order-total">
                                    <th>Tổng đơn hàng</th>
                                    <td><strong><span class="amount">{{number_format($total)}} VNĐ</span></strong>
                                    </td>
                                </tr>								
                            </tfoot>
                        </table>
                    </div>
                    <div class="payment-method mt-40"> 
                            <div class="order-button-payment">
                                <input type="submit" value="Đặt hàng" />
                            </div>	
                            <div class="mt-2" style="text-align:center">
                                <a style="font-size:20px" href="{{route('cartshow')}}">click để chỉnh sửa đơn hàng</a>
                            </div>	 				
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
<!-- checkout-area end -->	

@endsection