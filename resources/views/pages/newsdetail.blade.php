@extends('welcome')
@section('imageOg', "https://diennuocphucloc.com/storage/app/NewsImages/$newsImage")
@section('title', "$newstitle")
@section('NewsDetail')

<div class="header-height"></div>
<div class="breadcrumb-area mt-37 hm-4-padding">
    <div class="container-fluid">
        <div class="breadcrumb-content text-center">
           <h2 style="font-family:'Times New Roman', Times, serif"><strong>Chi Tiết Tin Tức - Blogger<strong></h2>
            <ul>
                <li>
                    <a href="#">news</a>
                </li>
                <li>newdetail</li>
            </ul>
        </div>
    </div>
</div>
<div class="banner-area hm-4-padding">
    <div class="container-fluid">
       <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
        <!-- QC_HEADER -->
        <ins class="adsbygoogle"
             style="display:block"
             data-ad-client="ca-pub-8602037860916317"
             data-ad-slot="8825476421"
             data-ad-format="auto"
             data-full-width-responsive="true"></ins>
        <script>
             (adsbygoogle = window.adsbygoogle || []).push({});
        </script>
    </div>
</div> 

<!-- blog-area start -->
<div class="blog mt-3 pb-125 hm-3-padding">
    <div class="container-fluid">
        <div class="row">
            @foreach ($newsdetail as $news)
            <div class="col-lg-8 col-xl-9" >
                <div class="blog-details-wrapper">
                    <div class="single-blog-wrapper" >
                        <div class="blog-img mb-30">
                            {{-- <img src="{{asset('storage/app/NewsImages/'.$news->news_img)}}" alt=""> --}}
                        </div>
                        <div class="blog-content">
                            <h1 style="font-family:'Times New Roman', Times, serif"><strong>{{$news->news_title}}</strong></h1>
                            <div class="blog-date-categori">
                                <ul>
                                    <li style="font-family:'Times New Roman', Times, serif"> {{$newsdate}}</li>
                                    <li style="font-family:'Times New Roman', Times, serif">{{$news->name}}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="blog-content">
                            <p style="font-family:'Times New Roman', Times, serif"> {!! $news->news_description !!}</p>
                        </div>
                        
                       
                        {{-- <div class="blog-dec-tags-social">
                            <div class="blog-dec-tags">
                                <ul>
                                    <li><a href="#">lifestyle</a></li>
                                    <li><a href="#">interior</a></li>
                                    <li><a href="#">outdoor</a></li>
                                </ul>
                            </div>
                            <div class="blog-dec-social">
                                <span>share :</span>
                                <ul>
                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                    <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="administrator-wrapper">
                            <div class="administrator-img">
                                <img src="assets/img/blog/blog-administrator.png" alt="">
                            </div>
                            <div class="administrator-content">
                                <h4>Mildred Barnett</h4>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea coma consequat. Duis aute irure dolor in reprehenderit</p>
                            </div>
                        </div> --}}
                    </div>
                    {{-- <div class="blog-comment-wrapper mt-55">
                        <h4 class="blog-dec-title">comments : 02</h4>
                        <div class="single-comment-wrapper mt-35">
                            <div class="blog-comment-img">
                                <img src="assets/img/blog/blog-comment1.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>Anthony Stephens</h4>
                                <span>October 14, 2018 </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                <div class="blog-details-btn">
                                    <a href="blog-details.html">read more</a>
                                </div>
                            </div>
                        </div>
                        <div class="single-comment-wrapper mt-50 ml-125">
                            <div class="blog-comment-img">
                                <img src="assets/img/blog/blog-comment2.png" alt="">
                            </div>
                            <div class="blog-comment-content">
                                <h4>Anthony Stephens</h4>
                                <span>October 14, 2018 </span>
                                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolor magna aliqua. Ut enim ad minim veniam, </p>
                                <div class="blog-details-btn">
                                    <a href="blog-details.html">read more</a>
                                </div>
                            </div>
                        </div>
                    </div> --}}
                    {{-- <div class="blog-reply-wrapper mt-50">
                        <h4 class="blog-dec-title">post a comment</h4>
                        <form action="#">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="text" placeholder="Full Name">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="leave-form">
                                        <input type="email" placeholder="Eail Address ">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="text-leave">
                                        <textarea placeholder="Massage"></textarea>
                                        <input type="submit" value="SEND MASSAGE">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> --}}
                </div>
            </div>
            @endforeach

            <div class="col-lg-4 col-xl-3">
                <div class="blog-sidebar-wrapper sidebar-mrg pl-20">
                    <div class="blog-widget mb-70">
                        <div class="blog-search">
                            <form class="news-form">
                                <input type="text" placeholder="Search.....">
                                <button type="submit">
                                    <i class="ion-search"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                    <!--<div class="blog-widget mb-60">-->
                    <!--    <div class="blog-author">-->
                    <!--        <a href="https://fb.com/HoMinh.Error"><img src="{{URL::to('public/frontend/assets/img/minhho.jpg')}}" alt="" width="172" height="172"></a>-->
                    <!--        <h4 style="font-family:'Times New Roman', Times, serif;"><a href="https://fb.com/HoMinh.Error"><b>Onion</b></a></h4>-->
                    <!--        <span>Lập trình viên PHP, LARAVEL</span>-->
                            <!--<span>0344.387.371</span>-->
                    <!--    </div>-->
                    </div>
                    <div class="blog-widget mb-65">
                        <h4 style="font-family:'Times New Roman', Times, serif;" class="blog-widget-title mb-35"><b>Bài Viết Mới</b></h4>
                        <div class="blog-recent-post">
                            @foreach ($newsrecent as $newsrecent)
                                <div class="recent-post-wrapper mb-25">
                                    <div class="recent-post-img">
                                    <a href="{{route('newsdetail',$newsrecent->news_id)}}"><img src="{{asset('storage/app/NewsImages/'.$newsrecent->news_img)}}" alt="" width="94" height="64"></a>
                                    </div>
                                    <div class="recent-post-content">
                                        <h4><a href="{{route('newsdetail',$newsrecent->news_id)}}">{{Str::words($newsrecent->news_title, 6,'....') }}</a></h4>
                                        <span>{{$newsrecent->created_at}}</span>
                                    </div>
                                </div>
                            @endforeach
                            
                        </div>
                    </div>
                    <div class="blog-widget mb-60">
                        <h4 class="blog-widget-title mb-30"></h4>
                        <div class="blog-categori">
                            <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
                            <!-- QC_VUONG -->
                            <ins class="adsbygoogle"
                                 style="display:block"
                                 data-ad-client="ca-pub-8602037860916317"
                                 data-ad-slot="2252329219"
                                 data-ad-format="auto"
                                 data-full-width-responsive="true"></ins>
                            <script>
                                 (adsbygoogle = window.adsbygoogle || []).push({});
                            </script>
                        </div>
                    </div>
                    {{-- <div class="blog-widget mb-55">
                        <h4 class="blog-widget-title mb-35">INSTAGRAM</h4>
                        <div class="blog-instagram">
                            <ul>
                                <li><a href="#"><img src="assets/img/instagram/instagram1.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/instagram/instagram2.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/instagram/instagram3.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/instagram/instagram4.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/instagram/instagram5.jpg" alt=""></a></li>
                                <li><a href="#"><img src="assets/img/instagram/instagram6.jpg" alt=""></a></li>
                            </ul>
                        </div>
                    </div> --}}
                    <div class="blog-widget mb-55">
                        <h4 class="blog-widget-title mb-25">FOLLOW US</h4>
                        <div class="blog-sidebar-social">
                            <ul>
                                <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    {{-- <div class="blog-widget">
                        <h4 class="blog-widget-title mb-30">TAGS</h4>
                        <div class="blog-tags">
                            <ul>
                                <li><a href="#">home repair</a></li>
                                <li><a href="#">business </a></li>
                                <li><a href="#">design </a></li>
                                <li><a href="#">lifestyle </a></li>
                                <li><a href="#">interior </a></li>
                                <li><a href="#">outdoor </a></li>
                                <li><a href="#">furniture </a></li>
                                <li><a href="#">Equipment </a></li>
                            </ul>
                        </div>
                    </div> --}}
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog-area end -->


@endsection