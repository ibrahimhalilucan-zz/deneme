@extends('admin.master')

@section('icerik')

<hr />
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/menulerimiz')}}">Menulerimiz</a> </li> 
    <li class="active"> <strong>Ekleme</strong> </li> 
</ol> 
<h2>Menü Ekleme</h2>
<div class="panel panel-primary">
    <div class="panel-body"> 
        <form role="form" action="{{action('AdminController@menuekleme')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
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
                                <label class="col-sm-2 control-label">Sayfa Türü<span class="span_need">*</span></label>
                                <div class="col-sm-10"> 
                                    <select name="sayfaturu" class="form-control select2" aria-invalid="false" > 
                                        <option value="anasayfa">Anasayfa</option> 
                                        <option value="referanslarimiz">Referanslarimiz</option> 
                                        <option value="hakkimizda">Hakkımızda</option> 
                                        <option value="iletisim">İletişim</option>
                                    </select> <br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Adı<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="adi" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Adı" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Page Title<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="pagetitle" data-validate="required" data-message-required="Boş Bırakılamaz." placeholder="Page Title" /> </br>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sırası<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sirasi" data-validate="number,required" data-message-required="Boş Bırakılamaz." placeholder="Sırası" /><br>
                                </div>
                            </div>                            
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Etiketleri</label>
                                <div class="col-sm-10"> 
                                    <input type="text" value="" name="tags" class="form-control tagsinput" />
                                </div>
                            </div>                           
                            <div class="form-group"> 
                                <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-blue" style="float: left;"> 
                                            <input type="radio"  value="Aktif" name="durumu" checked>
                                                <label>Aktif</label><br/><br/>
                                        </div> 
                                    </div>
                                    <div class="col-md-1">
                                        <div class="radio radio-replace color-red" style="float: left;"> 
                                            <input type="radio"  value="Pasif" name="durumu"/>
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

<!--<div class="modal fade" id="album-image-options">
    <div class="modal-dialog"> 
        <div class="modal-content">
            <div class="modal-body"> 
                <div class="row" style="height: 500px;"> 
                    <form enctype="multipart/form-data" action="http://codecanyon.stbeets.nl/form.php" method="post" role="form">
                        <div class="dropzone2" data-width="1200" data-height="420" data-ajax="false" data-originalsave="true" style="width: 600px; height: 210px;">
                            <input type="file" name="thumb" required="" style="position: absolute;">
                        </div>

                    </form> 
                </div> 
            </div> 
        </div> 
    </div> 
</div>-->
<div class="modal fade custom-width" id="album-image-options"> 
    <div class="modal-dialog" style="width: 56%" > 
        <div class="row"> 
                    <form enctype="multipart/form-data" action="http://codecanyon.stbeets.nl/form.php" method="post" role="form">
                        <div class="dropzone2" data-width="1200" data-height="420" data-ajax="false" data-originalsave="true" style="width: 900px; height: 315px;">
                            <input type="file" name="thumb" required="" style="position: absolute;">
                        </div>

                    </form> 
                </div> 
    </div>
</div>
@endsection
