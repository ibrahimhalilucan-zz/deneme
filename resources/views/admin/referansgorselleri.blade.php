@extends('admin.master')

@section('icerik')
<ol class="breadcrumb" > 
    <li> <a href="{{URL::to('admin/genel')}}"><i class="entypo-folder"></i>Anasayfa</a> </li>
    <li> <a href="{{URL::to('admin/referanslarimiz')}}">Referanslarimiz</a> </li> 
    <li class="active"> <strong>Görselleri</strong> </li> 
</ol> 
<h2>Referans Görselleri</h2>
<a href="#modalresim" data-toggle="modal" data-target="#modalresim" class="bg btn btn-green btn-sm btn-icon icon-left pull-right"><i class="entypo-plus"></i>Görsel Ekle</a>
<br/>
<br/>
<hr>
<script type="text/javascript">
    jQuery(document).ready(function ($)
    {
        $(".gallery-env").on("click", ".image-thumb .image-options a.delete", function (ev)
        {
            ev.preventDefault();

            var $image = $(this).closest('[data-tag]');
            var t = new TimelineLite({
                onComplete: function ()
                {
                    $image.slideUp(function ()
                    {
                        $image.remove();
                    });
                }
            });
            $image.addClass('no-animation');
            t.append(TweenMax.to($image, .2, {css: {scale: 0.95}}));
            t.append(TweenMax.to($image, .5, {css: {autoAlpha: 0, transform: "translateX(100px) scale(.95)"}}));
        }).on("click", ".image-thumb .image-options a.edit", function (ev)
        {
            ev.preventDefault();
            // This will open sample modal
            $("#album-image-options").modal('show');
            // Sample Crop Instance
            var image_to_crop = $("#album-image-options img"),
                    img_load = new Image();
            img_load.src = image_to_crop.attr('src');
            img_load.onload = function ()
            {
                if (image_to_crop.data('loaded'))
                    return false;
                image_to_crop.data('loaded', true);
                image_to_crop.Jcrop({
                    //boxWidth: $("#album-image-options").outerWidth(),
                    boxWidth: 580,
                    boxHeight: 385,
                    onSelect: function (cords)
                    {
                        // you can use these vars to save cropping of the image coordinates
                        var h = cords.h,
                                w = cords.w,
                                x1 = cords.x,
                                x2 = cords.x2,
                                y1 = cords.w,
                                y2 = cords.y2;
                    }
                }, function ()
                {
                    var jcrop = this;
                    jcrop.animateTo([600, 400, 100, 150]);
                });
            }
        });

        // Sample Filtering
        var all_items = $("div[data-tag]"),
                categories_links = $(".image-categories a");
        categories_links.click(function (ev)
        {
            ev.preventDefault();
            var $this = $(this),
                    filter = $this.data('filter');
            categories_links.removeClass('active');
            $this.addClass('active');
            all_items.addClass('not-in-filter').filter('[data-tag="' + filter + '"]').removeClass('not-in-filter');
            if (filter == 'all' || filter == '*')
            {
                all_items.removeClass('not-in-filter');
                return;
            }
        });
    });
</script>
<div class="gallery-env">

    <div class="row">
        @foreach($referansgorselleri as $detaygorselleri)
        <div class="col-sm-2 col-xs-4" data-tag="1d"> 
            <article class="image-thumb">
                <a href="#" class="image"> 
                    <img src="<?php echo url('public/resimler') ?>/{{$detaygorselleri->resim}}" /> 
                </a> 
                <div class="image-options">

                    <a href="#modal-{{$detaygorselleri->id}}" data-toggle="modal" data-target="#modal-{{$detaygorselleri->id}}" class="edit"><i class="entypo-pencil"></i></a>
                    <a href="#modalsilme-{{$detaygorselleri->id}}" data-toggle="modal" data-target="#modalsilme-{{$detaygorselleri->id}}" class="delete"> <i class="entypo-cancel"></i></a>
                </div> 
            </article> 
        </div>
        @endforeach()
    </div> 
</div>


@foreach($referansdetay as $referansgorsel)
<form role="form" action="{{action('AdminController@referansgorselleri',$referansgorsel->id)}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="modalresim">
        <div class="modal-dialog"> 
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Resim Ekleme</h4> 
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">Anaresim<span class="span_need">*</span></label>
                            <div class="col-sm-10"> 
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <input type="hidden" name="anaresim"/> 
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger=""> 
                                        <img src="http://placehold.it/350x350" alt="..."> 
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;"></div>
                                    <div> 
                                        <span class="btn btn-blue btn-file btn-icon icon-left"> 
                                            <span class=" fileinput-new"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Resim Seç</span> 
                                            <span class="btn-icon icon-left fileinput-exists"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Değiştir</span>
                                            <input type="file" name="anaresim"  accept="image/*"> 
                                        </span>
                                        <a href="#" class="btn btn-red btn-icon icon-left fileinput-exists" data-dismiss="fileinput"><i class="entypo-cancel"></i>Sil</a>

                                    </div> 
                                </div> 
                            </div> <hr>
                        </div>

                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="referansid" value="{{$referansgorsel->id}}" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group">
                                <label class="col-sm-2 control-label">Sırası<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="sirasi" value="" data-validate="number,required" data-message-required="Boş Bırakılamaz." placeholder="Sırası" /><br>
                                </div>
                            </div> 
                            <div class="form-group">
                                <br>
                                <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                                <div class="col-sm-10">
                                    <div class="col-md-2">
                                        <div class="radio radio-replace color-blue" style="float: left;"> 
                                            <input type="radio"  value="Aktif" name="durumu" checked>
                                                <label>Aktif</label><br/><br/>
                                        </div> 
                                    </div>
                                    <div class="col-md-2">
                                        <div class="radio radio-replace color-red" style="float: left;"> 
                                            <input type="radio"  value="Pasif" name="durumu" />
                                            <label>Pasif</label><br><br/>
                                        </div> 
                                    </div><br>
                                </div>
                            </div>
                        </div> 
                    </div>

                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-green btn-icon icon-left">Kaydet<i class="entypo-check"></i></button>

                </div>
            </div>
        </div>
    </div>
</form>

@endforeach()


<!-- Görsel Düzenleme İşlemleri -->
@foreach($referansgorselleri as $detaygorselleri)
<form role="form" action="{{action('AdminController@gorselupdate',$detaygorselleri->id)}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="modal-{{$detaygorselleri->id}}">
        <div class="modal-dialog"> 
            <input type="hidden" name="_token" value="<?php echo csrf_token() ?>"/>
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                    <h4 class="modal-title">Görsel Düzenleme</h4> 
                </div>
                <div class="modal-body">
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="referansid" value="{{$detaygorselleri->referansid}}" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                    
                    <div class="form-group">
                        <label class="col-sm-2 control-label">Anaresim<span class="span_need">*</span></label>
                        <div class="col-sm-10"> 
                            <div class="fileinput fileinput-exists" data-provides="fileinput">
                                <input type="hidden" value="{{$detaygorselleri->resim}}" name="anaresim"> 
                                    <div class="fileinput-new thumbnail" style="width: 200px; height: 200px;" data-trigger="fileinput"> 
                                        <img src="http://placehold.it/350x350" alt="..."> 
                                    </div>
                                    <div class="fileinput-preview fileinput-exists thumbnail" style="max-width: 200px; max-height: 150px; line-height: 10px;">
                                        <img src="<?php echo url('public/resimler') ?>/{{$detaygorselleri->resim}}" style="max-height: 140px;"></div>
                                    <div> 
                                        <span class="btn btn-blue btn-file btn-icon icon-left"> 
                                            <span class=" fileinput-new"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Resim Seç</span> 
                                            <span class="btn-icon icon-left fileinput-exists"><i class="glyphicon glyphicon-circle-arrow-up"></i>&nbsp;Değiştir</span>
                                            <input type="file" name="anaresim" value="{{$detaygorselleri->resim}}" accept="image/*"> 
                                        </span>
                                        <a href="#" class="btn btn-red btn-icon icon-left fileinput-exists" data-dismiss="fileinput"><i class="entypo-cancel"></i>Sil</a>
                                    </div> 
                            </div> 
                        </div>
                    </div>
                    <div class="form-group"> 
                        <label for="field-3" class="col-sm-2 control-label">Sırası<span class="span_need">*</span></label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="sirasi"   value="{{$detaygorselleri->sirasi}}" data-validate="number,required" data-message-required="Boş Bırakılamaz." placeholder="Sırası" /><br>
                        </div>
                    </div> 
                    <div class="form-group">
                        <br>
                        <label class="col-sm-2 control-label">Durumu<span class="span_need">*</span></label>
                        <div class="col-sm-10">
                            <div class="col-md-2">
                                <div class="radio radio-replace color-blue" style="float: left;"> 
                                    <input type="radio"  value="Aktif" name="durumu" {{ $detaygorselleri->durumu == 'Aktif' ? 'checked' : '' }}>
                                        <label>Aktif</label><br/><br/>
                                </div> 
                            </div>
                            <div class="col-md-2">
                                <div class="radio radio-replace color-red" style="float: left;"> 
                                    <input type="radio"  value="Pasif" name="durumu" {{ $detaygorselleri->durumu == 'Pasif' ? 'checked' : '' }}/>
                                        <label>Pasif</label><br><br/>
                                </div> 
                            </div><br>
                        </div>
                    </div>
                    <div class="row"> 
                        <div class="col-md-12"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="id" value="{{$detaygorselleri->id}}" id="field-1"  />
                                <input  type="hidden" class="form-control" name="adi" value="{{$detaygorselleri->adi}}" id="field-1"  />
                            </div> 
                        </div> 
                    </div>
                </div> 
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Kapat</button>
                    <button type="submit" class="btn btn-green btn-icon icon-left">Kaydet<i class="entypo-check"></i></button>

                </div>
            </div>
        </div>
    </div>
</form>
@endforeach

<!-- Silme İşlemleri -->
@foreach($referansgorselleri as $detaygorselleri)
<form role="form" action="{{action('AdminController@geridonusum')}}" id="form1" method="post" class="validate" enctype="multipart/form-data">
    <div class="modal fade" id="modalsilme-{{$detaygorselleri->id}}">
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
                                <input  type="hidden" class="form-control" name="tabloid" value="{{$detaygorselleri->id}}" id="field-1"  />
                            </div> 
                        </div> 
                        <div class="col-md-1"> 
                            <div class="form-group"> 
                                <input  type="hidden" class="form-control" name="adi" value="{{$detaygorselleri->adi}}" id="field-1"  />
                            </div> 
                        </div>
                        <div class="col-md-1"> 
                            <div class="form-group">
                                <input  type="hidden" class="form-control" name="tabloadi" value="gorseller" id="field-1"  />
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
