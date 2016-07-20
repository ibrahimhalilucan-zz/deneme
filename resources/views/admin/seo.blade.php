@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li class="active"> <strong>Seo Bilgileri</strong> </li> 
</ol> 
<h2>Seo Bilgileri</h2>

<br/>
<br/>
<table class="table table-bordered datatable" id="table-1"> 
    <thead>
        <tr>
            <th>Title</th>
            <th>Keywords</th>
            <th>Metatag</th> 
            <th>Description</th>
            <th>Ayarlar</th> 
        </tr> 
    </thead>
    <tbody> 
        @foreach($seo as $seobilgisi)
        <tr>
            <td>{{$seobilgisi->title}}</td>
            <td>{{$seobilgisi->keywords}}</td>
            <td>{{$seobilgisi->metatag}}</td>
            <td>{{$seobilgisi->description}}</td>
            <td> 
                <a href="seoduzenleme/{{$seobilgisi->id}}" class="btn btn-default btn-sm btn-icon icon-left"> <i class="entypo-pencil"></i>Düzenle</a>
            </td>
        </tr>
        @endforeach
    </tbody> 
    <tfoot> 
        <tr>
            <th>Title</th>
            <th>Keywords</th>
            <th>Metatag</th> 
            <th>Description</th>
            <th>Ayarlar</th> 
        </tr>  
    </tfoot> 
</table> 
<br />

@endsection
