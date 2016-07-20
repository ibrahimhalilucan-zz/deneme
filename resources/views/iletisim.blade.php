@extends('master')
<script src="https://code.jquery.com/jquery-1.9.1.min.js"></script>
    <script>
    $( document ).ready(function() {
        function kontrol(){
        var name = document.form.name.value;
        var email = document.form.email.value;
        var mesaj = document.form.mesaj.value;
        if(name!="" && email!="" && mesaj!=""){
         document.getElementById("form").submit();
        }else{

         var ikaz = document.getElementById("dene");
         ikaz.innerHTML="Lütfen kullanici adini giriniz.";
        }
       }
    });
    </script>
@section('icerik')
<!--=============== wrapper ===============-->
<div id="wrapper">
    <!--=============== content-holder ===============-->
    <div class="content-holder elem scale-bg2 transition3">
        <!-- Page title -->
        @foreach($iletisim as $contact)
        <div class="dynamic-title">{{$contact->adi}}</div>
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
            <!--  wrapper-inner  --> 
            <div class="wrapper-inner">
                <!--  align-content  --> 
                <div class="align-content">
                    <section>
                        @foreach($iletisim as $contact)

                        <div class="container small-container">
                            <h3 class="dec-text">{{$contact->adi}}</h3>
                            <p>{{$contact->aciklama}}</p>
                            <ul class="contact-list">
                                <li><span>Adres </span>
                                    <a href="#">{{$contact->adres}}</a>
                                </li>
                                <li><span>Telefon</span>
                                    <a href="#">+90 {{$contact->phone}}</a>
                                </li>
                                <li>
                                    <span>E-mail </span>
                                    <a href="#">{{$contact->email}}</a>
                                </li>
                            </ul>
                            <a href="#" class=" btn anim-button   trans-btn   transition  fl-l showform"><span>Mesaj yaz</span><i class="fa fa-eye"></i></a>
                        </div>
                        @endforeach
                        @if (Session::has('mailsucces'))
                        <div class="alert alert-success">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Başarılı!</strong> {{ Session::get('mailsucces') }}
                        </div>
                        @endif
                        @if (Session::has('mailhata'))
                        <div class="alert alert-danger">
                            <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                            <strong>Hata!</strong> {{ Session::get('mailhata') }}
                        </div>
                        @endif
                    </section>
                </div>
                <!--  align-content  end--> 
                <!--  contact-form-holder  --> 
                <div class="contact-form-holder">
                    <div class="close-contact"></div>
                    <div class="align-content">
                        <section>
                            <div id="contact-form">
                                <div id="message"></div>
                                <form name="form" method="post"  action="{{action('Email@mailgonder')}}" enctype="multipart/form-data">
                                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                                    <input name="name" type="name" id="name" onClick="this.select()" placeholder="Adı" required />
                                    <input name="email" type="email" id="email" onClick="this.select()" placeholder="E-mail" required/>            
                                    <textarea name="mesaj"  id="mesaj" onClick="this.select()" placeholder="Mesaj" required></textarea>  
                                    <button type="submit"  id="submit" onclick="kontrol()"><span>Gönder </span> <i class="fa fa-long-arrow-right"></i></button>   

                                </form>
                                <div id="dene"></div>
                            </div>
                        </section>
                    </div>
                </div>
                <!--  contact-form-holder end -->
            </div>
            <!--  fixed-column -->
            <div class="fixed-column">
                <div class="map-box">
                    <div  id="map-canvas"></div>
                </div>
            </div>
            <!--  fixed-column end-->  
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
