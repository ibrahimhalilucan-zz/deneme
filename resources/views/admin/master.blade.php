<!DOCTYPE html> 
<html lang="tr"> 
    <head> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta charset="utf-8"> 
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="Neon Admin Panel" /> 
        <meta name="author" content="Laborator.co" />
        <meta name="csrf-token" content="<?= csrf_token() ?>">
    <link rel="icon" href="../admin/assets/images/favicon.ico">
        <title>Admin Paneli</title>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/font-icons/entypo/css/entypo.css') }}"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/bootstrap.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-core.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-theme.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-forms.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/custom.css') }}"/>
        <link rel="stylesheet" href="{{ url('public/admin/assets/css/font-icons/font-awesome/css/font-awesome.min.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/demo.html5imageupload35b8.css') }}"/>
        <script src="{{ url('public/admin/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script type="text/javascript" src="http://code.jquery.com/jquery-1.5.2.min.js"></script>
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>

        <script type="text/javascript">
jQuery(document).ready(function ($) {
    var $table3 = jQuery("#table-1");
    var table3 = $table3.DataTable({
        "aLengthMenu": [[25, 50, 100, -1], [25, 50, 100, "Hepsi"]]
    });
// Initalize Select Dropdown after DataTables is created
    $table3.closest('.dataTables_wrapper').find('select').select2({
        minimumResultsForSearch: -1
    });
// Setup - add a text input to each footer cell
    $('#table-1 tfoot th').each(function () {
        var title = $('#table-1 thead th').eq($(this).index()).text();
        $(this).html('<input type="text" class="form-control" placeholder="" />');
    });
// Apply the search
    table3.columns().every(function () {
        var that = this;
        $('input', this.footer()).on('keyup change', function () {
            if (that.search() !== this.value) {
                that
                        .search(this.value)
                        .draw();
            }
        });
    });
});
        </script> 
        @if (session()->has('success'))
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.success("İşleminiz başarılı bir şekilde gerçekleşti", "Başarılı", opts);
            });
        </script>
        @endif
        @if (session()->has('warning'))
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.warning("Gerekli Alanları doldurunuz", "Uyarı", opts);
            });
        </script>
        @endif
        @if (session()->has('error'))
        <script type="text/javascript">
            jQuery(document).ready(function ($)
            {
                var opts = {
                    "closeButton": true,
                    "debug": false,
                    "positionClass": "toast-top-right",
                    "onclick": null,
                    "showDuration": "300",
                    "hideDuration": "1000",
                    "timeOut": "5000",
                    "extendedTimeOut": "1000",
                    "showEasing": "swing",
                    "hideEasing": "linear",
                    "showMethod": "fadeIn",
                    "hideMethod": "fadeOut"
                };
                toastr.error("İşleminiz gerçekleştirilirken bir sorunla karşılaştı", "Hata", opts);
            });
        </script>
        @endif
    </head> 
    <body class="page-body loaded"> 
    <div class="page-container"> 
        <div class="sidebar-menu"> 
            <div class="sidebar-menu-inner"> 
                <header class="logo-env">
                    <div class="logo"> <a href="{{url('admin/index')}}"><img src="{{url('public/admin/assets/images/logo.png')}}" width="120" alt="" /> </a> </div> 
                    <div class="sidebar-collapse"><a href="#" class="sidebar-collapse-icon"><i class="entypo-menu"></i> </a> </div>
                    <div class="sidebar-mobile-menu visible-xs"><a href="#" class="with-animation"><i class="entypo-menu"></i> </a> </div>
                </header>
                <ul id="main-menu" class="main-menu">
                    <li class="{{(Request::is('admin/genel') ? 'active' : '') }}"> <a href="{{URL::to('admin/genel')}}"><i class="entypo-home"></i><span class="title">Genel</span></a> </li>
                    <li class="{{(Request::is('admin/menulerimiz') ? 'active' : '') }}"> <a href="{{URL::to('admin/menulerimiz')}}"><i class="entypo-flow-tree"></i><span class="title">Menülerimiz</span></a> </li> 
                    <li class="{{(Request::is('admin/referanslarimiz') ? 'active' : '') }}"> <a href="{{URL::to('admin/referanslarimiz')}}"><i class="entypo-archive"></i><span class="title">Referanslarımız</span></a> </li>        
                    <li class="{{(Request::is('admin/hakkimizda') ? 'active' : '') }}"> <a href="{{URL::to('admin/hakkimizda')}}"><i class="entypo-users"></i><span class="title">Hakkımızda</span></a> </li> </li>
                    <li class="{{(Request::is('admin/iletisim') ? 'active' : '') }}"> <a href="{{URL::to('admin/iletisim')}}"><i class="entypo-map"></i><span class="title">İletişim</span></a> </li>
                    <li class="{{(Request::is('admin/sliderlar') ? 'active' : '') }}"> <a href="{{URL::to('admin/sliderlar')}}"><i class="entypo-camera"></i><span class="title">Sliderlar</span></a>
                    <li class="{{(Request::is('admin/sosyalaglar') ? 'active' : '') }}"> <a href="{{URL::to('admin/sosyalaglar')}}"><i class="entypo-facebook"></i><span class="title">Sosyal Ağlarımız</span></a> </li> 
                    <li class="{{(Request::is('admin/seo') ? 'active' : '') }}"> <a href="{{URL::to('admin/seo')}}"><i class="entypo-tag"></i><span class="title">Seo Değerleri</span></a> </li> 
                    <li class="{{(Request::is('admin/geridonusumkutusu') ? 'active' : '') }}"> <a href="{{URL::to('admin/geridonusumkutusu')}}"><i class="fa fa-recycle"></i><span class="title">Geri Dönüşüm Kutusu</span></a> </li> 
                    <li class="{{(Request::is('admin/logout') ? 'active' : '') }}"> <a href="{{URL::to('admin/logout')}}"><i class="entypo-logout"></i><span class="title">Çıkış</span></a> </li>


                </ul> 
            </div> 
        </div> 

        <div class="main-content"> 
            <div class="row">
                <div class="col-md-6 col-sm-8 clearfix"> 
                    <ul class="user-info pull-left pull-none-xsm">
                        <li class="profile-info dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown"> 
                                <img src="{{url('public/admin/assets/images/admin_user.png')}}" alt="" class="img-circle" width="44">MarkaveÖtesi
                            </a>
                        </li> 
                    </ul> 
                    <ul class="user-info pull-left pull-right-xs pull-none-xsm">
                        <li class="notifications dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true"> 
                                <i class="entypo-attention"></i> 
                                <span class="badge badge-secondary">5</span>
                            </a> 
                            <ul class="dropdown-menu">
                                <li class="top"><p class="small"><a href="#" class="pull-right">Tüm Uyarılar</a> <strong></strong> </p> </li> 
                                <li>
                                    <ul class="dropdown-menu-list scroller" tabindex="5001" style="overflow: hidden; outline: none;">
                                        <li class="unread notification-success">
                                            <a><span class="line"> <strong>Referans resmi ve detay resimleri aynı boyutta olmalı</strong> </span></a>
                                        </li>
                                        <li class="unread notification-secondary">
                                            <a><span class="line"> <strong>Resimler 750 x 1150 px oranında olmalı</strong> </span></a>
                                        </li> 
                                        <li class="notification-primary">
                                            <a><span class="line"><strong>Anasayfa resimleri 600 x 950 px oranında olmalı</strong></span></a>
                                        </li>
                                        <li class="notification-primary">
                                            <a><span class="line"><strong>Silme işlemleri geridönüşüme gönderilir</strong></span></a>
                                        </li>
                                        <li class="notification-primary">
                                            <a><span class="line"><strong>Geridönüşümden silinen veriler bir daha geri alınamaz</strong></span></a>
                                        </li>
                                    </ul> 
                                </li>
                                <li class="external"> <a href="#">Tüm Uyarılar</a> </li>
                            </ul>
                        </li> <!-- Message Notifications --> 
                    </ul>
                </div> <!-- Raw Links -->
                <div class="col-md-6 col-sm-4 clearfix hidden-xs"> 

                    <ul class="list-inline links-list pull-right">

                        <li class="sep"></li> 

                        <li><a href="{{URL::to('admin/logout')}}">Çıkış <i class="entypo-logout right"></i> </a></li> 
                    </ul> 
                </div> 
            </div>
            <hr />
            @yield('icerik')
            <footer class="main">
                &copy; 2016 <strong>Admin</strong>  Theme by İbrahim Halil Uçan</a> 
            </footer>
        </div> 

    </div> 




    <!-- Imported styles on this page --> 



    <link rel="stylesheet" href="//demo.neontheme.com/assets/js/dropzone/dropzone.css"/>
    <script src="{{ url('public/admin/assets/js/gsap/TweenMax.min.js') }}"></script>                                       
    <script src="{{ url('public/admin/assets/js/jcrop/jquery.Jcrop.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/bootstrap.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/joinable.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/resizeable.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-api.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/cookies.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/selectboxit/jquery.selectBoxIt.min.js') }}"></script>

    <link rel="stylesheet" href="{{ url('public/admin/assets/js/jcrop/jquery.Jcrop.min.css') }}"/>

    <link rel="stylesheet" href="{{ url('public/admin/assets/js/select2/select2-bootstrap.css') }}"/> 
    <link rel="stylesheet" href="{{ url('public/admin/assets/js/select2/select2.css') }}"/>                                         
    <link rel="stylesheet" href="{{ url('public/admin/assets/js/datatables/datatables.css') }}"/> 
    <link rel="stylesheet" href="{{ url('public/admin/assets/js/daterangepicker/daterangepicker-bs3.css') }}"/> 
    <link rel="stylesheet" href="{{ url('public/admin/assets/js/jvectormap/jquery-jvectormap-1.2.2.css') }}"/> 
    <link rel="stylesheet" href="{{ url('public/admin/assets/js/rickshaw/rickshaw.min.css') }}"/>

    <script src="{{ url('public/admin/assets/js/fileinput.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/dropzone/dropzone.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/jvectormap/jquery-jvectormap-1.2.2.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jvectormap/jquery-jvectormap-europe-merc-en.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jvectormap/jquery-jvectormap-world-mill-en.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jquery.sparkline.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/rickshaw/vendor/d3.v3.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/rickshaw/rickshaw.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/raphael-min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/morris.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/toastr.js') }}"></script> 

    <script src="{{ url('public/admin/assets/js/icheck/icheck.min.js') }}"></script>

    <script src="{{ url('public/admin/assets/js/jquery.multi-select.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/datatables/datatables.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/select2/select2.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jquery.validate.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/jquery.inputmask.bundle.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/bootstrap-tagsinput.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/typeahead.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/bootstrap-datepicker.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/bootstrap-timepicker.min.js') }}"></script>
    <script src="{{ url('public/admin/assets/js/bootstrap-colorpicker.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/moment.min.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/daterangepicker/daterangepicker.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/toastr.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-chat.js') }}"></script> 
    <!-- JavaScripts initializations and stuff --> 
    <script src="{{ url('public/admin/assets/js/neon-custom.js') }}"></script> 
    <!-- Demo Settings --> 
    <script src="{{ url('public/admin/assets/js/neon-demo.js') }}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-skins.js') }}"></script> 
    <script type="text/javascript" src="{{ url('public/admin/ckeditor/ckeditor.js')}}"></script>
    <script src="{{ url('public/admin/assets/js/html5imageupload1412.js') }}"></script> 
    <script>

            $('.dropzone2').html5imageupload();

    </script>



</body> 

</html>
