@extends('admin.master')

@section('icerik')
<hr />
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/referanslarimiz')}}">Referanslarimiz</a> </li> 
    <li class="active"> <strong>Düzenleme</strong> </li> 
</ol> 
<h2>Referans Düzenleme</h2>
<div class="panel panel-primary">
    <div class="panel-body"> 
        <form role="form" action="{{action('AdminController@referansduzenleme',$referansdetay->id)}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
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
                                    <span class="hidden-xs">Türkçe</span> 
                                </a> 
                            </li>
                        </ul> 
                    </div> 
                </div>
                <div class="panel-body"> 
                    <div class="tab-content"> 
                        <div class="tab-pane active" id="turkce">
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Anaresim<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <div class="fileinput fileinput-exists" data-provides="fileinput">
                                        <input type="hidden" value="{{$referansdetay->resim}}" name="anaresim"> 
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput"> 
                                                <img src="http://placehold.it/350x350" alt="..."> 
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;">
                                                <img src="<?php echo url('public/resimler') ?>/{{$referansdetay->resim}}" style="max-height: 140px;"></div>
                                            <div> 
                                                <span class="btn btn-blue btn-file btn-icon icon-left"> 
                                                    <span class=" fileinput-new"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Resim Seç</span> 
                                                    <span class="btn-icon icon-left fileinput-exists"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Değiştir</span>
                                                    <input type="file" name="anaresim" value="{{$referansdetay->resim}}" accept="image/*"> 
                                                </span>
                                                <a href="#" class="btn btn-red btn-icon icon-left fileinput-exists" data-dismiss="fileinput"><i class="entypo-cancel"></i>Sil</a>
                                                <a href="#sample-modal" data-toggle="modal" data-target="#album-image-options" class="btn btn-green btn-icon icon-left fileinput-exists"><i class="entypo-retweet"></i>Cropla</a>
                                            </div> 
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Kategorisi<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <select name="kategorisi" class="form-control select2" aria-invalid="false" >
                                        <option value="Ferace" {{ $referansdetay->kategorisi == "Ferace" ? 'selected="selected' : '' }}>Ferace</option> 
                                        <option value="Etek" {{ $referansdetay->kategorisi == "Etek" ? 'selected="selected' : '' }} >Etek</option>
                                        <option value="Ceket" {{ $referansdetay->kategorisi == "Ceket" ? 'selected="selected' : '' }} >Ceket</option>
                                        <option value="Tunik" {{ $referansdetay->kategorisi == "Tunik" ? 'selected="selected' : '' }} >Tunik</option> 
                                        <option value="Pardesü" {{ $referansdetay->kategorisi == "Pardesü" ? 'selected="selected' : '' }} >Pardesü</option>
                                        <option value="Kaban" {{ $referansdetay->kategorisi == "Kaban" ? 'selected="selected' : '' }} >Kaban</option>
                                        <option value="Elbise" {{ $referansdetay->kategorisi == "Elbise" ? 'selected="selected' : '' }} >Elbise</option>
                                        <option value="Gömlek" {{ $referansdetay->kategorisi == "Gömlek" ? 'selected="selected' : '' }} >Gömlek</option> 
                                        <option value="Pantolon" {{ $referansdetay->kategorisi == "Pantolon" ? 'selected="selected' : '' }} >Pantolon</option> 

                                    </select> <br>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="col-sm-2 control-label">Adı<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adi" value="{{$referansdetay->adi}}" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adı" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Başlık<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="baslik" value="{{$referansdetay->baslik}}" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Başlık" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Page Title<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pagetitle" value="{{$referansdetay->pagetitle}}" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Page Title" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sırası<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sirasi" value="{{$referansdetay->sirasi}}" data-validate="number,required" data-message-required="Boş Bırakılamaz." placeholder="Sırası" /><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Etiketleri</label>
                                <div class="col-sm-10"> 
                                    <input type="text" value="{{$referansdetay->tags}}" name="tags" class="form-control tagsinput" /><br>
                                </div>
                            </div><br>
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Tarih</label>
                                <div class="col-sm-10"> 
                                    <input type="text" class="form-control" name="date" value="{{$referansdetay->date}}" data-mask="d/m/y" /><br /> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Müşteri</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="musteri" value="{{$referansdetay->musteri}}" data-validate="" data-message-required="Boş Bırakılamaz." placeholder="Müşteri" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <br>
                                <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-blue" style="float: left;"> 
                                            <input type="radio"  value="Aktif" name="durumu" {{ $referansdetay->durumu == 'Aktif' ? 'checked' : '' }}>
                                                <label>Aktif</label><br/><br/>
                                        </div> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-red" style="float: left;"> 
                                            <input type="radio"  value="Pasif" name="durumu" {{ $referansdetay->durumu == 'Pasif' ? 'checked' : '' }}/>
                                            <label>Pasif</label><br><br/>
                                        </div> 
                                    </div><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea name="aciklama" class="ckeditor">{{$referansdetay->aciklama}}</textarea><br/><br/>
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
