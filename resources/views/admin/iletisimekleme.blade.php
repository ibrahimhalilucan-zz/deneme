@extends('admin.master')

@section('icerik')

<hr />
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/iletisimbilgileri')}}">İletişim Bilgileri</a> </li> 
    <li class="active"> <strong>Ekleme</strong> </li> 
</ol> 
<h2>İletişim Bilgileri Ekleme</h2> 
<div class="panel panel-primary">
    <div class="panel-body"> 
        <form role="form" action="{{action('AdminController@iletisimekleme')}}" id="form1" method="post" class="validate"  enctype="multipart/form-data">
            <div class="row">
                <div class="form-group pull-right"> 
                    <button type="submit" class="btn btn-green btn-icon icon-left">Kaydet<i class="entypo-check"></i></button>                                                                    
                </div>
            </div>
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="panel minimal minimal-gray">
                <div class="panel-heading">
                    <div class="panel-options">
                        <ul class="nav nav-tabs bordered">
                            <li class="active">
                                <a href="#turkce" data-toggle="tab" aria-expanded="true"> 
                                    <span class="visible-xs"><i class="entypo-home"></i></span> 
                                    <span class="hidden-xs">Genel</span> 
                                </a> 
                            </li> 
                        </ul> 
                    </div> 
                </div>
                <div class="panel-body"> 
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="turkce">
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Adı<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <input type="text" name="adi" class="form-control"  data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adı" /><br /> 
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="field-ta" class="col-sm-2 control-label">Açıklama<span class="span_need">*</span></label> 
                                <div class="col-sm-10"> 
                                    <textarea class="form-control" id="field-ta" name="aciklama" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Açıklama"></textarea><br>
                                </div> <br>
                            </div>
                            <div class="form-group"> 
                                <label for="field-ta" class="col-sm-2 control-label">Adres<span class="span_need">*</span></label> 
                                <div class="col-sm-10"> 
                                    <textarea class="form-control" id="field-ta" name="adres" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adres"></textarea><br>
                                </div> <br>
                            </div>
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Email<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <input type="text" name="email" class="form-control" data-mask="email" data-validate="email,required" data-message-required="Boş Bırakılamaz." placeholder="Email" /><br /> 
                                </div>
                            </div> 
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Telefon<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" name="phone" class="form-control" data-mask="phone"  data-validate="phone" data-message-required="Boş Bırakılamaz." placeholder="Telefon"/><br /> 
                                </div> 
                            </div>
                        </div>
                    </div> 
                </div> 
            </div>
        </form>
    </div> 
</div>
@endsection
