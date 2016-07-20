@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>Referanslarimiz</strong> </li> 
</ol> 
<h2>Referanslarimiz</h2>
<a href="{{URL::to('admin/referansekleme')}}" class="btn btn-green btn btn-icon icon-left pull-right"> <i class="entypo-plus"></i>Referans Ekle</a>
<br/>
<br/>

<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Kategori Adı</th>
            <th>Adı</th>
            <th>Başlık</th> 
            <th>Tarih</th>             
            <th>Müşteri</th> 
            <th>Sirasi</th>           
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody> 
        @foreach($referanslarimiz as $referans)
        <tr>
            <td>{{$referans->kategorisi}}</td>
            <td>{{$referans->adi}}</td>
            <td>{{$referans->baslik}}</td>
            <td>{{$referans->date}}</td>
            <td>{{$referans->musteri}}</td>
            <td>{{$referans->sirasi}}</td>
            <td>{{$referans->durumu}}</td>
            <td> 
                <a href="referansduzenleme/{{$referans->id}}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>Düzenle</a>
                <a href="#modalsilme-{{$referans->id}}" data-toggle="modal" data-target="#modalsilme-{{$referans->id}}" class="bg btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-trash"></i>Sil</a>
                <a href="referansgorselleri/{{$referans->id}}" class="btn btn-green btn-sm btn-icon icon-left"> <i class="entypo-camera"></i>Görseller</a>
            </td>
        </tr>
        @endforeach


    </tbody> 
    <tfoot> 
        <tr>
            <th>Kategori Adı</th>
            <th>Adı</th>
            <th>Başlık</th> 
            <th>Tarih</th>             
            <th>Müşteri</th> 
            <th>Sirasi</th>           
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr>    
    </tfoot> 
</table> 
<br /> 

<!-- Silme İşlemleri -->
@foreach($referanslarimiz as $menu)
<form role="form" action="{{action('AdminController@geridonusum')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="modalsilme-{{$menu->id}}">
        <div class="modal-dialog modal-sm"> 
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                     
                </div>
                <div class="modal-body">
                    <h3>Silmek İstediğinden Emin misin?</h3><br>
                    <div class="row"> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="tabloid" value="{{$menu->id}}" id="field-1"  />
                            </div> 
                        </div> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="adi" value="{{$menu->adi}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="tabloadi" value="referanslarimiz" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                    <div class="row">
                        <div class="container">
                            <div class="col-md-2">
                                <button type="submit" class="bg btn btn-danger btn-lg  btn-icon icon-left"> <i class="entypo-trash"></i>Sil</button>
                            </div>
                            <div class="col-md-2">
                                <button type="button" class="btn btn-green btn-lg btn-icon icon-right" data-dismiss="modal"><i class="entypo-cancel"></i>Kapat</button> 
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
