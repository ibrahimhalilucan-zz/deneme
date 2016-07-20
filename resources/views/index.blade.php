@extends('master')

@section('icerik')
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2   no-padding">
        <!-- Page title -->
        <div class="dynamic-title">Services</div>
        <!-- Page title  end--> 
        <!--  Navigation --> 
        <div class="nav-overlay"></div>
        <div class="nav-inner isDown">
            <nav>
                <ul>
                    <li><a href="{{URL::to('/')}}"><img src="{{url('public/images/logo.png')}}" width="50" alt="Didem Modaevi"></a></li>
                    @foreach($menulerimiz as $menu)
                    <li><a  href="{{URL::to($menu->slug)}}"><span>{{$menu->adi}}</span></a></li>
                    @endforeach
                </ul>
            </nav>
        </div>
        <!--  Navigation end --> 
        <!--  Content -->
        <div class="content full-height no-padding home-content ">
            <!--full-height wrap -->
            <div class="full-height-wrap">
                <!-- 1 -->
                <div class="hero-grid big-column">
                    <div class="hero-slider synkslider owl-carousel" data-attime="3220" data-rtlt="false">
                        @foreach($sliderbir as $slider)
                        <div class="item">
                            <div class="bg" style="background-image:url(<?php echo url('public/resimler') ?>/{{$slider->resim}})"></div>
                        </div>
                        @endforeach
                        
                    </div>
                </div>
                <div class="hero-grid big-column">
                    <div class="hero-slider synkslider owl-carousel" data-attime="3220" data-rtlt="false">
                        @foreach($slideriki as $slider)
                        <div class="item">
                            <div class="bg" style="background-image:url(<?php echo url('public/resimler') ?>/{{$slider->resim}})"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="hero-grid big-column">
                    <div class="hero-slider synkslider owl-carousel" data-attime="3220" data-rtlt="false">
                        @foreach($slideruc as $slider)
                        <div class="item">
                            <div class="bg" style="background-image:url(<?php echo url('public/resimler') ?>/{{$slider->resim}})"></div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="hero-grid big-column">
                    <div class="hero-slider synkslider owl-carousel" data-attime="3220" data-rtlt="false">
                        @foreach($sliderdort as $slider)
                        <div class="item">
                            <div class="bg" style="background-image:url(<?php echo url('public/resimler') ?>/{{$slider->resim}})"></div>
                        </div>
                        @endforeach
                    </div>
                </div>

                <div class="overlay"></div>
                <!-- enter-wrap -->
                <div class="enter-wrap-holder column-wrap">
                    <div class="enter-wrap">
                        <h3> Didem Modaevi</h3>
                        <a href="{{URL::to('referanslarimiz')}}" class="btn anim-button   trans-btn   transition  fl-l"><span><h1>Giriş</h1></span><i class="fa fa-long-arrow-right"></i></a>
                    </div>
                </div>
                <!-- enter-wrap end  -->
            </div>
            <!-- full-height-wrap end  -->  
        </div>
        <!-- Content   end -->	 
        <!-- share  -->
        <div class="share-inner">
            <div class="share-container  isShare"  data-share="['facebook','googleplus','twitter','linkedin']"></div>
            <div class="close-share"></div>
        </div>
        <!-- share end -->
    </div>
    <!-- Content holder  end -->
</div>

@endsection
