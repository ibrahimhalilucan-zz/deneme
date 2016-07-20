@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>Sosyal Ağ</strong> </li> 
</ol> 
<h2>Sosyal Ağ</h2>
<a href="{{URL::to('admin/sosyalaglarekleme')}}" class="btn btn-green btn btn-icon icon-left pull-right"> <i class="entypo-plus"></i>Sosyal Ağ Ekle</a>
<br/>
<br/>

<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Sırası</th> 
            <th>Adı</th>
            <th>Url</th>
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody>
        @foreach($sosyalaglar as $sosyalag)
        <tr> 
            <td>{{$sosyalag->sirasi}}</td>
            <td>{{$sosyalag->adi}}</td>
            <td>{{$sosyalag->url}}</td>
            <td>{{$sosyalag->durumu}}</td> 
            <td> 
                <a href="sosyalagduzenleme/{{$sosyalag->id}}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>Düzenle</a> 
                <a href="#modalsilme-{{$sosyalag->id}}" data-toggle="modal" data-target="#modalsilme-{{$sosyalag->id}}" class="bg btn btn-danger btn-sm btn-icon icon-left"> <i class="entypo-trash"></i>Sil</a>
            </td>
        </tr>

        @endforeach


    </tbody> 
    <tfoot> 
        <tr>
            <th>Sırası</th> 
            <th>Adı</th>
            <th>Url</th>
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr> 
    </tfoot> 
</table> 
<br />

<!-- Silme İşlemleri -->
@foreach($sosyalaglar as $sosyalag)
<form role="form" action="{{action('AdminController@geridonusum')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="modalsilme-{{$sosyalag->id}}">
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
                                <input  type="hidden" class="form-control" name="tabloid" value="{{$sosyalag->id}}" id="field-1"  />
                            </div> 
                        </div> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="adi" value="{{$sosyalag->adi}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="tabloadi" value="social" id="field-1"  />
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
