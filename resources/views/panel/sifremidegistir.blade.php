
@extends('panel.master')

@section('icerik')
<div class="login-container"> 
    <div class="login-header login-caret"> 
        <div class="login-content">            
            <img src="{{url('public/admin/assets/images/logo.png')}}" /> 
            <p class="description">Sayın Kullanıcı, Şifrenizi Değiştirmek için gerekli alanları doldurunuz</p>
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
                                    <label for="username" class="required ">Kullanıcı Adı <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="text" class="form-control" name="username"  data-validate="required" data-message-required="Boş Bırakılamaz." placeHolder="Kullanıcı Adı"/>
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
                                <input type="text" class="form-control" name="email"  data-validate="email,required" data-message-required="Boş Bırakılamaz." placeHolder="Email" autocomplete="off"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-key"></i> 
                                    <label for="username" class="required ">Şifre <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password"  data-validate="required" data-message-required="Boş Bırakılamaz." placeHolder="Eski Şifre"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-key"></i> 
                                    <label for="username" class="required ">Yeni Şifre <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password"  data-validate="required" data-message-required="Boş Bırakılamaz." placeHolder="Yeni Şifre"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <div class="input-group col-md-12">
                            <div class="col-md-4" id="cizgi">
                                <div class="input-group-addon"> 
                                    <i class="entypo-key"></i> 
                                    <label for="username" class="required ">Şifre Tekrar <span class="required">*</span></label>            
                                </div>
                            </div>                            
                            <div class="col-md-8">
                                <input type="password" class="form-control" name="password"  data-validate="required" data-message-required="Boş Bırakılamaz." placeHolder="Yeni Şifre Tekrar"/>
                            </div>                            
                        </div> 
                    </div>
                    <div class="form-group">
                        <button class="btn btn-primary btn-block btn-login" type="submit" name="yt0"><i class="entypo-login"></i>Şifre Değiştir</button>
                    </div>                    
                </form>
                <div class="login-bottom-links"> 
                    <a href="{{URL::to('admin/login')}}" class="link pull-left"><i class="entypo-left-bold"></i>Geri</a>
                </div>
            </div>
        </div>
    </div> 
</div>

@endsection

