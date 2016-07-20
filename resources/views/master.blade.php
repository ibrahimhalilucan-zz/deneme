<!DOCTYPE HTML>
<html lang="tr">
    <head>
        <!--=============== basic  ===============-->
        <meta charset="UTF-8">
        @foreach($pagetitle as $title)
    <title>{{$title->pagetitle}}</title>
    @endforeach

    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="robots" content="index, follow"/>
    @foreach($seobilgileri as $seo)
    <meta name="description" content="{{$seo->description}}"/>
    <meta name="keywords" content="{{$seo->keywords}}"/>
    @endforeach

    <!--=============== css  ===============-->

    <link type="text/css" rel="stylesheet" href="{{ url('public/css/reset.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/plugins.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/style.css')}}"/>
    <link type="text/css" rel="stylesheet" href="{{ url('public/css/yourstyle.css')}}"/>
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{url('public/images/favicon.png')}}">
    </head>
    <body>
    <div class="loader">
        <div class="tm-loader">
            <div id="circle"></div>
        </div>
    </div>
    <!--================= main start ================-->
    <div id="main">
        <!--=============== header ===============-->
        <header>
            <!-- Nav button-->
            <div class="nav-button">
                <span  class="nos"></span>
                <span class="ncs"></span>
                <span class="nbs"></span>
            </div>
            <!-- Nav button end -->
            <!-- Logo--> 
            <div class="logo-holder">
                <a href="{{URL::to('/')}}"><img src="{{url('public/images/logo.png')}}" alt="Didem Modaevi" height="50"></a>
            </div>
            <!-- Logo  end--> 
            <!-- Header  title --> 
            <div class="header-title">
                <h2><a class="ajax" href="#">Didem Modaevi |  Modanın Yeni Adresi</a></h2>
            </div>
            <!-- Header  title  end-->

            <!-- share  end-->				
        </header>
        <!-- Header   end-->
        <!--=============== wrapper ===============-->	
        @yield('icerik')
        <!-- wrapper end -->
        <!--=============== footer ===============-->
        <footer>
            <div class="policy-box">
                <span>&#169; Didem Modaevi 2016  /  Tüm haklari saklıdir. </span>
            </div>
            <div class="footer-social">
                <ul>
                    <li><a href="#" rel="external"><i class="fa fa-facebook"></i><span>facebook</span></a></li>
                    <li><a href="#" rel="external"><i class="fa fa-twitter"></i><span>twitter</span></a></li>
                    <li><a href="#" rel="external"><i class="fa fa-instagram"></i><span>instagram</span></a></li>
                    <li><a href="#" rel="external"><i class="fa fa-pinterest"></i><span>pinterest</span></a></li>
                    <li><a href="#" rel="external"><i class="fa fa-tumblr"></i><span>tumblr</span></a></li>
                </ul>
            </div>
        </footer>
        <!-- footer end -->
    </div>
    <!-- Main end -->
    <!--=============== google map ===============-->
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>  
    <!--=============== scripts  ===============-->
    <script type="text/javascript" src="{{ url('public/js/jquery.min.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/js/plugins.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/js/core.js')}}"></script>
    <script type="text/javascript" src="{{ url('public/js/scripts.js')}}"></script>

</body>
</html>