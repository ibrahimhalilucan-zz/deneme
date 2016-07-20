@extends('master')

@section('icerik')
<!--=============== wrapper ===============-->
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <!-- Page title -->
        @foreach($hakkimizda as $about)
        <div class="dynamic-title">{{$about->adi}}</div>
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
        <div class="content full-height">
            @foreach($hakkimizda as $about)
            <div class="fixed-column">
                <div class="bg" style="background-image:url(public/resimler/{{$about->resim}}" ></div>
            </div>
            @endforeach
            <!--  wrapper-inner -->
            <div class="wrapper-inner">
                <!--  align-content -->
                <div class="align-content">
                    <section>
                        @foreach($hakkimizda as $about)
                        <div class="container small-container">
                            <h3 class="dec-text">{{$about->spot}}</h3>
                            <p>{!! $about->aciklama !!}</p>


                            <h3 class="dec-text">Hizmetlerimiz</h3>

                            <div class="services-box-info lft-info">
                                <ul>
                                    {!! $about->solhizmet !!}
                                </ul>
                            </div>
                            <div class="services-box-info rft-info">
                                <ul>
                                    {!! $about->saghizmet !!}
                                </ul>
                            </div>

                        </div>

                        @endforeach
                        <a href="{{URL::to('referanslarimiz')}}" class="ajax btn anim-button  ajax trans-btn   transition  fl-l"><span>Referanslarimiz</span><i class="fa fa-eye"></i></a>
                    </section>
                </div>

            </div>
        </div>

    </div>
</div>
@endsection
