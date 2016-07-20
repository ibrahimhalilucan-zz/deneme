@extends('admin.master')

@section('icerik')

<hr />
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/sosyalaglar')}}">Sosyal Ağ</a> </li> 
    <li class="active"> <strong>Düzenleme</strong> </li> 
</ol> 
<h2>Sosyal Ağ Düzenleme</h2> 
<div class="panel panel-primary">
    <div class="panel-body"> 
        <form role="form" action="{{action('AdminController@sosyalagduzenleme',$sosyalag->id)}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
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
                                <label class="col-sm-2 control-label">Türü<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <select name="turu" class="form-control select2" aria-invalid="false" >                                          
                                        <option value="twitter" {{ $sosyalag->turu == 'twitter' ? 'selected="selected' : '' }} >Twitter</option>
                                        <option value="facebook" {{ $sosyalag->turu == 'facebook' ? 'selected="selected' : '' }} >Facebook</option>
                                        <option value="instagram" {{ $sosyalag->turu == 'instagram' ? 'selected="selected' : '' }} >İnstagram</option>
                                        <option value="google-plus" {{ $sosyalag->turu == 'google-plus' ? 'selected="selected' : '' }} >Google Plus</option>
                                        <option value="pinterest" {{ $sosyalag->turu == 'pinterest' ? 'selected="selected' : '' }} >Printerest</option>
                                    </select> <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Adı<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" value="{{$sosyalag->adi}}" name="adi" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adı" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Linki<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="url" value="{{$sosyalag->url}}" data-validate="required,url" data-message-required="Boş Bırakılamaz." placeholder="Link" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sırası<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sirasi" value="{{$sosyalag->sirasi}}" data-validate="number,required" data-message-required="Boş Bırakılamaz." placeholder="Sırası" /><br>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-blue" style="float: left;"> 
                                                <input type="radio" id="rd-1" name="durumu" value="Aktif" {{ $sosyalag->durumu == 'Aktif' ? 'checked' : '' }}/>
                                                <label>Aktif</label><br/><br/>
                                        </div> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-red" style="float: left;"> 
                                            <input type="radio" id="rd-2" name="durumu" value="Pasif" {{ $sosyalag->durumu == 'Pasif' ? 'checked' : '' }}/>
                                            <label>Pasif</label><br><br/>
                                        </div> 
                                    </div><br>
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
