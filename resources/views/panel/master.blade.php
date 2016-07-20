<!DOCTYPE html> 
<html lang="tr"> 
    <head> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge"> 
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1" /> 
        <meta name="description" content="Neon Admin Panel" /> 
        <meta name="author" content="Laborator.co" />
    <link rel="icon" href="assets/images/favicon.ico"> 
        <title>Admin | Login</title> 
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/js/jquery-ui/css/no-theme/jquery-ui-1.10.3.custom.min.css')}}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/font-icons/entypo/css/entypo.css') }}"/>
        <link rel="stylesheet" href="http://fonts.googleapis.com/css?family=Noto+Sans:400,700,400italic" id="style-resource-3"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/bootstrap.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-core.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-theme.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/neon-forms.css') }}"/>
        <link rel="stylesheet" type="text/css" href="{{ url('public/admin/assets/css/custom.css') }}"/>
        <script src="{{ url('public/admin/assets/js/jquery-1.11.3.min.js') }}"></script>
        <script src="{{ url('public/admin/assets/js/jquery-1.11.1.min.js') }}"></script>
        @if (session()->has('sifreyenilemebasarili'))
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
    toastr.success("Yeni Şifreniz Mail Adresinize Gönderilmiştir", "Başarılı", opts);
});
        </script>
        @endif
        @if (session()->has('sifreyenilemebasarisiz'))
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
                toastr.error("Gerekli Alanları doldurunuz", "Uyarı", opts);
            });
        </script>
        @endif
        @if (session()->has('kullaniciyok'))
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
                toastr.error("Girdiğiniz bilgilere ait bir kullanici yok", "Hata", opts);
            });
        </script>
        @endif
        @if (session()->has('sifrelereslenmiyor'))
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
                toastr.error("Şifreler Eşlenmiyor", "Hata", opts);
            });
        </script>
        @endif
        @if (session()->has('changepasswprd'))
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
                toastr.success("Şifreniz başarılı bir şekilde değişti", "Başarılı", opts);
            });
        </script>
        @endif
    </head>

    <body class="page-body login-page login-form-fall"> 

        @yield('icerik')
    <script src="{{ url('public/admin/assets/js/gsap/TweenMax.min.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/jquery-ui/js/jquery-ui-1.10.3.minimal.min.js')}}"></script>
    <script src="{{ url('public/admin/assets/js/bootstrap.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/joinable.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/resizeable.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-api.js')}}"></script>
    <script src="{{ url('public/admin/assets/js/cookies.min.js')}}"></script>
    <script src="{{ url('public/admin/assets/js/jquery.validate.min.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-login.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-custom.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-demo.js')}}"></script> 
    <script src="{{ url('public/admin/assets/js/neon-skins.js')}}"></script>

    <script src="{{ url('public/admin/assets/js/toastr.js') }}"></script> 


</body> 

</html>