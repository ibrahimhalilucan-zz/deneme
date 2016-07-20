@extends('admin.master')

@section('icerik')

<hr />
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/hakkimizda')}}">Hakkimizda</a> </li> 
    <li class="active"> <strong>Düzenleme</strong> </li> 
</ol>

<h2>Hakkimizda Düzenleme</h2> 
<div class="panel panel-primary">
    <div class="panel-body"> 
        <form role="form" action="{{action('AdminController@hakkimizdaduzenleme',$hakkimizda->id)}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
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
                                <label class="col-sm-2 control-label">Resim<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <div class="fileinput fileinput-exists" data-provides="fileinput">
                                        <input type="hidden" value="{{$hakkimizda->resim}}" name="anaresim"> 
                                            <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput"> 
                                                <img src="http://placehold.it/350x350" alt="..."> 
                                            </div>
                                            <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;">
                                                <img src="<?php echo url('public/resimler') ?>/{{$hakkimizda->resim}}" style="max-height: 140px;"></div>
                                            <div> 
                                                <span class="btn btn-blue btn-file btn-icon icon-left"> 
                                                    <span class=" fileinput-new"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Resim Seç</span> 
                                                    <span class="btn-icon icon-left fileinput-exists"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Değiştir</span>
                                                    <input type="file" name="anaresim" value="{{$hakkimizda->resim}}" accept="image/*"> 
                                                </span>
                                                <a href="#" class="btn btn-red btn-icon icon-left fileinput-exists" data-dismiss="fileinput"><i class="entypo-cancel"></i>Sil</a>
                                                <a href="#sample-modal" data-toggle="modal" data-target="#album-image-options" class="btn btn-green btn-icon icon-left fileinput-exists"><i class="entypo-retweet"></i>Cropla</a>
                                            </div> 
                                    </div> 
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label"> Adı<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adi" value="{{$hakkimizda->adi}}" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adı" /> </br>
                                </div>
                            </div>
                            <div class="form-group"> 
                                <label for="field-ta" class="col-sm-2 control-label">Spot<span class="span_need">*</span></label> 
                                <div class="col-sm-10"> 
                                    <textarea class="form-control" id="field-ta" name="spot" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Spot">{{$hakkimizda->spot}}</textarea><br>
                                </div> <br>
                            </div>
                            
                           <div class="form-group">
                                <label class="col-sm-2 control-label">Etiketleri</label>
                                <div class="col-sm-10"> 
                                    <input type="text"  value="{{$hakkimizda->tags}}" name="tags" class="form-control tagsinput" />
                                </div>
                            </div>
                            
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-md-2">
                                        <div class="radio radio-replace color-blue" style="float: left;"> 
                                            <input type="radio"  value="Aktif" name="durumu" {{ $hakkimizda->durumu == 'Aktif' ? 'checked' : '' }}>
                                                <label>Aktif</label><br/><br/>
                                        </div> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-replace color-red" style="float: left;"> 
                                            <input type="radio"  value="Pasif" name="durumu" {{ $hakkimizda->durumu == 'Pasif' ? 'checked' : '' }}/>
                                            <label>Pasif</label><br><br/>
                                        </div> 
                                    </div><br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Açıklama</label>
                                <div class="col-sm-10">
                                    <textarea name="aciklama" class="ckeditor">{{$hakkimizda->aciklama}}</textarea><br/><br/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Sol Hizmet</label>
                                <div class="col-sm-10">
                                    <textarea name="solhizmet" class="ckeditor">{{$hakkimizda->solhizmet}}</textarea><br/><br/>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="username" class="col-sm-2 control-label">Sağ Hizmet</label>
                                <div class="col-sm-10">
                                    <textarea name="saghizmet" class="ckeditor">{{$hakkimizda->saghizmet}}</textarea><br/><br/>
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
