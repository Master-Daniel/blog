<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="description" content="Foodeiblog Template">
        <meta name="keywords" content="s">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="author" content="Daniel Michael (https://elitecodec.com.ng)">
        <meta name="format-detection" content="telephone=no">
        <meta name="apple-mobile-web-app-capable" content="yes">
        <meta name="theme-color" content="#212529" />
        <meta name="description" content="Sheriffied,Delta state, softdelta,sheriff, PDP, Delta Government, news delta, update news delta, house of assembly delta state, oborevwori, francis, Delta government bill, delta central, political news, politics in delta, Advancing delta, more for delta,Ibori,Davido,Okowa, Atiku, wike, harrysong, daddy showkey, delta central, Great Ogboru, Dr. Ifeanyi Okowa, People democratic party,Monday onyeme,deputy Governor ,Governor, Okpe, Streetcredibility, case in Supreme Court,Francis Oborevwori,Grass root mobilizer, 25 LGA's of Delta State. " />
        <meta name="keywords" content="" />
        <meta property="og:url" content="https://Soft Delta.com/" />
        <meta property="og:site_name" content="Soft Delta" />
        <meta property="og:type" content="web application" />
        <meta property="og:title" content="" />
        <meta property="og:description" content="Sheriffied,Delta state, softdelta,sheriff, PDP, Delta Government, news delta, update news delta, house of assembly delta state, oborevwori, francis, Delta government bill, delta central, political news, politics in delta, Advancing delta, more for delta,Ibori,Davido,Okowa, Atiku, wike, harrysong, daddy showkey, delta central, Pensioners in Delta,, Dr. Ifeanyi Okowa, People democratic party,Monday onyeme,deputy Governor ,Governor, Okpe, Streetcredibility, Sheriff We know ,Deltans, Rt. Hon sheriff PDP in the state, PDPstakeholder. " />
        {{-- <meta property="og:image:width" content="1200" />
        <meta property="og:image:height" content="627" /> --}}
        <meta property="twitter:card" content="" />
        <meta property="twitter:site" content="@Softdelta" />
        <meta property="twitter:url" content="https://Soft Delta.com/" />
        <meta property="twitter:titte" content="" />
        <meta property="og:url" content="https://www.your-domain.com/your-page.html" />
        <meta property="og:type" content="Post" />
        <meta property="og:title" content="{{ $title }} - Soft Delta" />
        @if(isset($post_details->post_summary))
        <meta property="og:description" content="{{ $post_details->post_summary }}" />
        @endif
        @if(isset($post_details->post_image))
        <meta property="og:image" content="{{ asset('public/uploads/'.$post_details->post_image) }}" />
        @else
        <meta property="og:image" content="{{ url('storage/images/site-logo.png') }}" />
        <meta property="twitter:image" content="{{ url('storage/images/site-logo.png') }}" />
        @endif;
        <meta property="twitter:description" content="Sheriffied,Delta state, softdelta,sheriff, PDP, Delta Government, news delta, update news delta, house of assembly delta state, oborevwori, francis, Delta government bill, delta central, political news, politics in delta, Advancing delta, more for delta,Ibori,Davido,Okowa, Atiku, wike, harrysong, daddy showkey, delta central, Asaba Affairs, Dr. Ifeanyi Okowa, People democratic party,Monday onyeme,deputy Governor ,Governor, Okpe, Streetcredibility, Youth 4 Sheriff ,support group,elections 202" />
        <meta name="apple-mobile-app-capable" content="yes" />
        <meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />

        <title>{{ $title }} - Soft Delta</title>

        <!-- Google Font -->
        <link href="//fonts.googleapis.com/css73f1.css?family=Nunito+Sans:300,400,600,700,800,900&amp;display=swap"  rel="stylesheet">
        <link href="//fonts.googleapis.com/css1dbe.css?family=Unna:400,700&amp;display=swap" rel="stylesheet">
        <link type="text/css" rel="stylesheet" href="{{ asset('assets/css/style.css') }}" />

    </head>
    <body class="">

        @yield('content')

        <footer id="footer">
            <div class="container">
                <div class="row">
                    <div class="col-md-5">
                        <div class="footer-widget">
                            <div class="footer-logo">
                                <a href="{{ route('home') }}" class="logo">
                                    <img src="{{ url('storage/images/site-logo.png') }}" alt="">
                                </a>
                            </div>
                            <ul class="footer-nav">
                                <li><a href="javascript:void(0)">Privacy Policy</a></li>
                                <li><a href="javascript:void(0)">Advertisement</a></li>
                            </ul>
                            <div class="footer-copyright">
                                <span>Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | Developed by <a href="//elitecodec.com.ng" target="_blank">Elite Codec Inc.</a>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">About Us</h3>
                                    <ul class="footer-links">
                                        <li><a href="{{ route('about') }}">About Us</a></li>
                                        <li><a href="{{ route('contact') }}">Contacts</a></li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="footer-widget">
                                    <h3 class="footer-title">Catagories</h3>
                                    <ul class="footer-links">
                                        @foreach ($categories as $key => $category)
                                            <li><a href="javascript:void(0)">{{ $category['category_name'] }}</a></li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="footer-widget">
                            <h3 class="footer-title">Join our Newsletter</h3>
                            <div class="footer-newsletter">
                                <form>
                                    <input class="input" type="email" name="newsletter" placeholder="Enter your email">
                                    <button class="newsletter-btn"><i class="fa fa-paper-plane"></i></button>
                                </form>
                            </div>
                            <ul class="footer-social">
                                <li><a href="https://www.facebook.com/DELTAPEOPLENGR"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="https://twitter.com/softDelta2023/status/1570007990052306945?t=PaV8YodXIYOl7PScKtA9pQ&s=19"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="https://www.youtube.com/channel/UCjb02gX0VGb1zcb9OjC2Tvg"><i class="fa fa-youtube"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </footer>

        {{-- <div class="ml-4 text-center text-sm text-gray-500 sm:text-right sm:ml-0">
            Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div> --}}

        <div id="fb-root"></div>
        <script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = "https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v3.0";
        fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk'));</script>

        <script src="{{ asset('assets/js/jquery.min.js') }}"></script>
        <script src="{{ asset('assets/js/script.js') }}"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/push.js/1.0.12/push.min.js" integrity="sha512-DjIQO7OxE8rKQrBLpVCk60Zu0mcFfNx2nVduB96yk5HS/poYZAkYu5fxpwXj3iet91Ezqq2TNN6cJh9Y5NtfWg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
        <script src="{{ asset('assets/js/custom/notification.js') }}"></script>
        <script>eval(mod_pagespeed_15hy7ra_pu);</script>
	    <script>eval(mod_pagespeed_RDDE5qW6SI);</script>
    </body>
</html>