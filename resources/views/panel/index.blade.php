
@extends('panel.master')

@section('icerik')
<div class="login-container"> 
    <div class="login-header login-caret"> 
        <div class="login-content">            
            <img src="{{url('public/admin/assets/images/logo.png')}}" /> 
            <p class="description">Sayın Kullanıcı, Yönetim Paneline Erişmek için giriş yapınız.</p>
         </div> 
    </div> 
    <div class="login-progressbar"> <div></div> </div> 
    <div class="login-form">
        <div class="login-content">


            <div class="form">
                <form id="login_form" action="{{action('AdminController@girisyap')}}" method="post" class="validate">
                    <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
                    <div class="form-group"> 
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-user"></i> 
                                    <label for="username" class="required ">Username <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username"  data-validate="required" data-message-required="Username Boş Bırakılamaz." placeHolder="Username"/>
                            </div>
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-mail"></i> 
                                    <label for="username" class="required ">Email <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="email"  data-validate="email,required" data-message-required="Email Boş Bırakılamaz." placeHolder="Email" autocomplete="off"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-key"></i> 
                                    <label for="username" class="required ">Password <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password"  data-validate="required" data-message-required="Password Boş Bırakılamaz." placeHolder="Password"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block btn-login" type="submit" name="yt0"><i class="entypo-login"></i>Giriş Yap</button>
                    </div>                    
                </form>
                <div class="login-bottom-links"> 
                    <a href="{{URL::to('admin/sifremiunuttum')}}" class="link pull-left"><i class="entypo-lock-open"></i> Şifreni mi unuttun?</a>
                    <a href="{{URL::to('admin/sifremidegistir')}}" class="link pull-right"><i class="entypo-key"></i> Şifre Değiştir</a>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection

