@extends('master')

@section('icerik')
<!--=============== wrapper ===============-->
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <!-- Page title -->
        @foreach($referanslarimiz as $referans)
        <div class="dynamic-title">{{$referans->baslik}}</div>
        @endforeach

        <!-- Page title  end--> 
        <!--  Navigation --> 
        <div class="nav-overlay"></div>
        <div class="nav-inner isDown">
            <nav>
                <ul>
                    <li><a href="{{URL::to('/')}}"><img src="{{url('public/images/logo.png')}}"  alt="Didem Modaevi"></a></li>
                    @foreach($menulerimiz as $menu)
                    <li><a  href="{{URL::to($menu->slug)}}" class="ajax"><span>{{$menu->adi}}</span></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <!--  Navigation end --> 
        <!--  Content -->
        <div class="content">
            <!-- fixed-info-container -->
            <div class="fixed-info-container">
                <!-- content-nav -->
                <div class="content-nav">
                    <ul>
                        <li><a href="#" class="ajax ln"><i class="fa fa fa-angle-left"></i></a></li>
                        <li>
                            <div class="list">
                                <a href="{{URL::to('referanslarimiz')}}" class="ajax">							
                                    <span>
                                        <i class="b1 c1"></i><i class="b1 c2"></i><i class="b1 c3"></i>
                                        <i class="b2 c1"></i><i class="b2 c2"></i><i class="b2 c3"></i>
                                        <i class="b3 c1"></i><i class="b3 c2"></i><i class="b3 c3"></i>
                                    </span></a>
                            </div>
                        </li>
                        <li><a href="#" class="ajax rn"><i class="fa fa fa-angle-right"></i></a></li>
                    </ul>
                </div>
                <!-- content-nav end-->	
                @foreach($referanslarimiz as $referans)
                <h2>{{$referans->adi}}</h2>
                <div class="separator"></div>
                <div class="clearfix"></div>
                <p>{!! $referans->aciklama !!}</p>
<!--                <h4>Info</h4>
                <ul class="project-details">
                    <li><span>Date :</span> 26.05.2014 </li>
                    <li><span>Client :</span>  House Big </li>
                    <li><span>Status :</span> Completed </li>
                    <li><span>Location : </span>  <a href="https://goo.gl/maps/UzN5m" target="_blank"> Kharkiv Ukraine  </a></li>
                </ul>-->
                @endforeach

                <a href="{{URL::to('referanslarimiz')}}" class=" btn anim-button ajax  trans-btn   transition  fl-l"><span>Referanslarimiz</span><i class="fa fa-eye"></i></a>
            </div>
            <!-- fixed-info-container end--> 
            <!-- resize-carousel-holder--> 
            <div class="resize-carousel-holder vis-info">
                <!-- gallery-items--> 
                <div class="gallery-items four-coulms popup-gallery">
                    <!-- 1 -->
                    @foreach($detayresimleri as $detay)
                    <div class="gallery-item">
                        <div class="grid-item-holder">
                            <div class="box-item">
                                <img  src="<?php echo url('public/resimler/thumb') ?>/{{$detay->resim}}"   alt="{{$referans->adi}}">
                                    <a href="<?php echo url('public/resimler') ?>/{{$detay->resim}}" class="popup-link"><i class="fa fa-expand"></i></a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end gallery items -->					
            </div>
            <!-- resize-carousel-holder-->
        </div>
        <!--  Content  end --> 
        <!-- share  -->
        <div class="share-inner">
            <div class="share-container  isShare"  data-share="['facebook','googleplus','twitter','linkedin']"></div>
            <div class="close-share"></div>
        </div>
        <!-- share end -->
    </div>
    <!-- Content holder  end -->
</div>
<!-- wrapper end -->

@endsection
