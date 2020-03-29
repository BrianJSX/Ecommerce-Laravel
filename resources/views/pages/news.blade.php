@extends('welcome')
@section('title', 'Tin Tức - Blogger')
@section('NewsBlog')
<div class="header-height"></div>

    <div class="breadcrumb-area mt-37 hm-4-padding">
        <div class="container-fluid">
            <div class="breadcrumb-content text-center">
                <h2 style="font-family:'Times New Roman', Times, serif"><strong>Tin Tức - Blogger<strong></h2>
                <ul>
                    <li>
                        <a href="">TrangChu</a>
                    </li>
                    <li>NEWS</li>
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
                <!-- blog-area start -->
                <div class="blog-area mt-3 pb-125 hm-3-padding">
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-lg-4 col-xl-3">
                                <div class="blog-sidebar-wrapper sidebar-mrg2 pr-20">
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
                                    <!--        <h4 style="font-family:'Times New Roman', Times, serif;"><a href="https://fb.com/HoMinh.Error"><b>Minh Hồ</b></a></h4>-->
                                    <!--        <span>Lập trình viên PHP, LARAVEL</span>-->
                                    <!--        <br>-->
                                    <!--        <span>Blog cá nhân</span>-->
                                    <!--    </div>-->
                                    <!--</div>-->
                                    <div class="blog-widget mb-65">
                                        <h4 style="font-family:'Times New Roman', Times, serif;" class="blog-widget-title mb-35">TIN MỚI</h4>
                                        <div class="blog-recent-post">
                                            @foreach ($newsrecent as $newsrecent)
                                            <div class="recent-post-wrapper mb-25">
                                                <div class="recent-post-img">
                                                <a href="{{route('newsdetail',$newsrecent->news_id)}}"><img src="{{asset('storage/app/NewsImages/'.$newsrecent->news_img)}}" alt="" width="94" height="64"></a>
                                                </div>
                                                <div class="recent-post-content">
                                                    <h4><a href="{{route('newsdetail',$newsrecent->news_slug)}}">{{Str::words($newsrecent->news_title, 6,'....') }}</a></h4>
                                                    <span>{{$newsrecent->created_at}}</span>
                                                </div>
                                            </div>
                                        @endforeach
                                        </div>
                                    </div>
                                    {{-- <div class="blog-widget mb-60">
                                        <h4 class="blog-widget-title mb-30">CATEGORIES</h4>
                                        <div class="blog-categori">
                                            <ul>
                                                <li><a href="#">Article (05)</a></li>
                                                <li><a href="#">Brand (08)</a></li>
                                                <li><a href="#">Concept (02)</a></li>
                                                <li><a href="#">Design (07)</a></li>
                                                <li><a href="#">Interview (06)</a></li>
                                                <li><a href="#">Management (01)</a></li>
                                            </ul>
                                        </div>
                                    </div> --}}
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
                                    {{-- <div class="blog-widget mb-70">
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
                            <div class="col-lg-8 col-xl-9">
                                <div class="blog-wrapper">
                                    <div class="single-blog-wrapper mb-80">
                                         <!--<div class="sound-cloud embed-responsive embed-responsive-16by9 mb-30">-->
                                            <!--<iframe width="100%" height="300" scrolling="no" frameborder="no" allow="autoplay" src="https://w.soundcloud.com/player/?url=https%3A//api.soundcloud.com/tracks/650111441&color=%23ff5500&auto_play=true&hide_related=false&show_comments=true&show_user=true&show_reposts=false&show_teaser=true&visual=true"></iframe>                                    </div>-->
                                    @foreach ($newsblog as $news)
                                        <br>
                                        <div class="single-blog-wrapper mb-80">
                                            <div class="blog-content">
                                                {{-- <h2><a href="{{route('newsdetail',$news->news_id)}}" style="font-family:'Times New Roman', Times, serif">{{Str::words($news->news_title, 10,'....')}}</a></h2> --}}
                                                
                                            </div>
                                            {{-- <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p> --}}
                                            <div class="single-blog-wrapper">
                                                <div class="link-post">
                                                    <div class="link-content">
                                                        <span>{{$news->created_at}}</span>
                                                        <h3  style="font-family:'Times New Roman', Times, serif"><a href="{{route('newsdetail',$news->news_slug)}}"><b>{{Str::words($news->news_title, 20,'....')}}</b></a></h3>
                                                    </div>
                                                    <div class="post-img">
                                                        <img alt="" src="{{URL::to('public/frontend/assets/img/blog/link-post.png')}}">
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="blog-date-categori">
                                                <ul>
                                                    
                                                    <li><b>Người Đăng: </b><a href="#">{{$news->name}}</a></li>
                                                </ul>
                                            </div>
                                            <div class="blog-btn-social mt-20">
                                                <div class="blog-btn">
                                                    <a class="btn-style cr-btn" href="{{route('newsdetail',$news->news_slug)}}">
                                                        <span>Đọc Ngay</span>
                                                    </a>
                                                </div>
                                                <div class="blog-social">
                                                    <span>share :</span>
                                                    <ul>
                                                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                                        <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                    </ul>
                                                </div>
                                        </div>
                                    @endforeach
                                    
                                    </div>
                                    {{-- <div class="single-blog-wrapper mb-80">
                                        <blockquote>
                                            <div class="quote-post">
                                                <div class="quote-content">
                                                    <span>October 14, 2018 </span>
                                                    <h3><a href="blog-details-quote.html">Lorem ipsum dolor sit amet co adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</a></h3>
                                                    <h6>Tasnim</h6>
                                                </div>
                                                <div class="post-img">
                                                    <img alt="" src="assets/img/blog/quote-post.png">
                                                </div>
                                            </div>
                                        </blockquote>
                                    </div> --}}
                                    {{-- <div class="single-blog-wrapper mb-80">
                                        <div class="blog-gallery-slider owl-carousel mb-30">
                                            <a href="blog-details-gallery.html"><img alt="" src="assets/img/blog/blog-2.jpg"></a>
                                            <a href="blog-details-gallery.html"><img alt="" src="assets/img/blog/blog-1.jpg"></a>
                                            <a href="blog-details-gallery.html"><img alt="" src="assets/img/blog/blog-2.jpg"></a>
                                        </div>
                                        <div class="blog-content">
                                            <h2><a href="blog-details-gallery.html">Spirit of Adventure Rises</a></h2>
                                            <div class="blog-date-categori">
                                                <ul>
                                                    <li>October 14, 2018 </li>
                                                    <li><a href="#">Admin </a></li>
                                                </ul>
                                            </div>
                                        </div>
                                        <p>Lorem ipsum dolor sit amet, consectetur adip elit, sed do eiusmod tempor incididunt labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercit ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit voluptate velit esse cillum dolore eu fugiat nulla pariatur. </p>
                                        <div class="blog-btn-social mt-20">
                                            <div class="blog-btn">
                                                <a class="btn-style cr-btn" href="blog-details-standerd.html">
                                                    <span>read more</span>
                                                </a>
                                            </div>
                                            <div class="blog-social">
                                                <span>share :</span>
                                                <ul>
                                                    <li><a href="#"><i class="ion-social-instagram"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-skype"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                                                    <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div> --}}
                                    {{-- <div class="single-blog-wrapper">
                                        <div class="link-post">
                                            <div class="link-content">
                                                <span>October 14, 2018 </span>
                                                <h3><a href="blog-details-link.html">Lorem ipsum dolor sit amet co adipisicing elit,</a></h3>
                                            </div>
                                            <div class="post-img">
                                                <img alt="" src="assets/img/blog/link-post.png">
                                            </div>
                                        </div>
                                    </div> --}}
                                    <div class="pagination-style text-center mt-50">
                                        <ul>
                                            {{ $newsblog->links() }}
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- blog-area end -->
                {{-- <div class="brand-logo-area hm-4-padding">
                    <div class="container-fluid">
                        <div class="brand-logo-active owl-carousel gray-bg ptb-130">
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/1.png">
                            </div>
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/2.png">
                            </div>
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/3.png">
                            </div>
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/4.png">
                            </div>
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/5.png">
                            </div>
                            <div class="single-logo">
                                <img alt="" src="assets/img/brand-logo/3.png">
                            </div>
                        </div>
                    </div>
                </div> --}}
@endsection