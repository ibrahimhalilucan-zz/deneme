@extends('master')

@section('icerik')
<!--  Content  -->
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <!-- Page title -->
        <div class="dynamic-title">Referanslarımız</div>
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
        <div class="content ">
            <section class="no-padding no-border">
                <!-- Filters-->
                <div class="filter-holder filter-nvis-column">
                    <div class="gallery-filters at">
                        <a href="#" class="gallery-filter gallery-filter-active"  data-filter="*">Hepsi</a>		
                        <a href="#" class="gallery-filter " data-filter=".Ferace">Ferace</a>
                        <a href="#" class="gallery-filter" data-filter=".Etek">Etek</a>
                        <a href="#" class="gallery-filter" data-filter=".Ceket">Ceket</a>                        		
                        <a href="#" class="gallery-filter " data-filter=".Tunik">Tunik</a>
                        <a href="#" class="gallery-filter" data-filter=".Pardesü">Pardesü</a>
                        <a href="#" class="gallery-filter" data-filter=".Kaban">Kaban</a>                        		
                        <a href="#" class="gallery-filter " data-filter=".Elbise">Elbise</a>
                        <a href="#" class="gallery-filter" data-filter=".Gömlek">Gömlek</a>
                        <a href="#" class="gallery-filter" data-filter=".Pantolon">Pantolon</a>
                    </div>
                </div>
                <!-- filters end -->
                <!--  filter-button-->
                <div class="filter-button vis-fc">Filtrele</div>
                <!--  filter-button end -->
                <!--  gallery-items -->
                <div class="gallery-items   hid-port-info">
                    @foreach($referanslarimiz as $referans)
                    <div class="gallery-item {{$referans->kategorisi}}  ">
                        <div class="grid-item-holder">
                            <div class="box-item">
                                <div class="wh-info-box ">
                                    <div class="wh-info-box-inner at">
                                        <a href="{{URL::to('referanslarimiz/'.$referans->slug)}}" >
                                            <h1>{{$referans->adi}}</h1>
                                        </a>
                                        <span class="folio-cat">{{$referans->kategorisi}}</span>
                                    </div>
                                </div>
                                <img  src="<?php echo url('public/resimler/thumb') ?>/{{$referans->resim}}"   alt="{{$referans->adi}}">
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <!-- end gallery items -->					
            </section>
        </div>
        <!-- share end -->
    </div>
</div>
@endsection
