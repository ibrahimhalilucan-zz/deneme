@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>Geri Dönüşüm Kutusu</strong> </li> 
</ol> 
<h2>Geri Dönüşüm Kutusu</h2>

 
<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Adı</th>
            <th>Tablosu</th>
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody> 
        @foreach($geridonusumkutusu as $geridonsusum)
        <tr>
            <td>{{$geridonsusum->adi}}</td>
            <td>{{$geridonsusum->tabloadi}}</td>
            <td>{{$geridonsusum->durumu}}</td>
            <td> 
                <a href="#geridonusumsil-{{$geridonsusum->id}}" data-toggle="modal" data-target="#geridonusumsil-{{$geridonsusum->id}}" class="bg btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-trash"></i>Sil</a>
                <a href="#geriyukle-{{$geridonsusum->id}}" data-toggle="modal" data-target="#geriyukle-{{$geridonsusum->id}}" class="bg btn btn-warning btn-sm btn-icon icon-left"><i class="fa fa-recycle"></i>Geri Yükle</a>
            </td>
        </tr>
        @endforeach
       
        
    </tbody> 
    <tfoot> 
        <tr>
            <th>Adı</th>
            <th>Tablosu</th>
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr>   
    </tfoot> 
</table> 
<br /> 

<!-- Silme İşlemleri-->
<!-- Geri Yükleme İşlemleri -->
@foreach($geridonusumkutusu as $geridonsusum)
<form role="form" action="{{action('AdminController@geriyuklesil')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="geridonusumsil-{{$geridonsusum->id}}">
        <div class="modal-dialog modal-sm"> 
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     
                </div>
                <div class="modal-body">
                    <h3>Silmek İstediğinizden Emin misiniz?</h3><br>
                    <div class="row">
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="id" value="{{$geridonsusum->id}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="tabloid" value="{{$geridonsusum->tabloid}}" id="field-1"  />
                            </div> 
                        </div> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="adi" value="{{$geridonsusum->adi}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="tabloadi" value="{{$geridonsusum->tabloadi}}" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-2">
                                <button type="submit" class="bg btn btn-danger btn-lg  btn-icon icon-left"> <i class="fa fa-trash"></i>Sil</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-default btn-lg btn-icon icon-right" data-dismiss="modal"><i class="entypo-cancel"></i>Kapat</button> 
                            </div>   
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach


<!-- Geri Yükleme İşlemleri -->
@foreach($geridonusumkutusu as $geridonsusum)
<form role="form" action="{{action('AdminController@geriyukle')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="geriyukle-{{$geridonsusum->id}}">
        <div class="modal-dialog modal-sm"> 
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     
                </div>
                <div class="modal-body">
                    <h3>Geri Yüklemek İstediğinizden Emin misiniz?</h3><br>
                    <div class="row">
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="id" value="{{$geridonsusum->id}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="tabloid" value="{{$geridonsusum->tabloid}}" id="field-1"  />
                            </div> 
                        </div> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="adi" value="{{$geridonsusum->adi}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="tabloadi" value="{{$geridonsusum->tabloadi}}" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-2">
                                <button type="submit" class="bg btn btn-warning btn-lg  btn-icon icon-left"> <i class="fa fa-recycle"></i>Geri yükle</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-danger btn-lg btn-icon icon-right" data-dismiss="modal"><i class="entypo-cancel"></i>Kapat</button> 
                            </div>   
                        </div>
                    </div>
                   
                </div>
            </div>
        </div>
    </div>
</form>
@endforeach
@endsection
