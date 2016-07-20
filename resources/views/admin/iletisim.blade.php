@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>İletişim Bilgilerimiz</strong> </li> 
</ol> 
<h2>İletişim Bilgilerimiz</h2>

<br/>
<br/>
 
<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Adres</th> 
            <th>Email</th>
            <th>Telefon</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody> 
        @foreach($iletisimbilgileri as $bilgi)
        <tr> 
            <td>{{$bilgi->adres}}</td>
            <td>{{$bilgi->email}}</td>
            <td>{{$bilgi->phone}}</td>
            <td> 
                <a href="iletisimduzenle/{{$bilgi->id}}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>Düzenle</a> 
            </td>
        </tr>
        @endforeach
       
        
    </tbody> 
    <tfoot> 
        <tr>
            <th>Adres</th> 
            <th>Email</th>
            <th>Telefon</th>
            <th>Ayarlar</th> 
        </tr> 
    </tfoot> 
</table> 
<br /> 


@endsection
