@extends('welcome')
@section('title', 'Thanh Toán Thành Công')
@section('finishOrderContent')

<div class="header-height"></div>
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
            <h2 style="font-family:'Times New Roman', Times, serif"><strong>Thanh Toán Thành Công<strong></h2>
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
    <div class="jumbotron text-center mt-20">
            <h1 class="display-3" style="font-family:'Times New Roman', Times, serif">Thank You!</h1>
            <p class="lead"><strong>Vui lòng kiểm tra email</strong> để biết thêm thông tin chi tiết đơn hàng bạn đã đặt</p>
            
            <p>
            Bạn gặp rắc rối ? <a href="">Liên hệ với chúng tôi</a>
            </p>
            <p class="lead">
            <a class="btn btn-primary btn-sm" href="{{route('home')}}" role="button">Tiếp tục trở về tranh chủ</a>
            </p>
    </div>
@endsection