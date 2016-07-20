@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>Hakkımızda</strong> </li> 
</ol> 
<h2>Hakkımızda</h2>
<!--<a href="{{URL::to('admin/bizekleme')}}" class="btn btn-green btn btn-icon icon-left pull-right"> <i class="entypo-plus"></i>Biz Ekle</a>-->
<br/>
<br/>
 
<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Adı</th>
            <th>Spot</th>
            <th>Etiketleri</th> 
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody> 
        @foreach($hakkimizda as $hakkımızda)
        <tr>
            <td>{{$hakkımızda->adi}}</td>
            <td>{{$hakkımızda->spot}}</td>
            <td>{{$hakkımızda->tags}}</td>
            <td>{{$hakkımızda->durumu}}</td>
            <td> 
                <a href="hakkimizdaduzenleme/{{$hakkımızda->id}}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>Düzenle</a>
                
            </td>
        </tr>
        @endforeach
       
        
    </tbody> 
    <tfoot> 
        <tr>
            <th>Adı</th>
            <th>Spot</th>
            <th>Etiketleri</th> 
            <th>Durumu</th>
            <th>Ayarlar</th> 
        </tr>  
    </tfoot> 
</table> 
<br /> 

@endsection
