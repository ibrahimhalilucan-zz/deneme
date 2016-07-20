<!DOCTYPE html>
<html>
    <head>
    <title>Laravel</title>

    <link href="https://fonts.googleapis.com/css?family=Lato:100" rel="stylesheet" type="text/css">

        <style>
            html, body {
                height: 100%;
            }

            body {
                margin: 0;
                padding: 0;
                width: 100%;
                display: table;
                font-weight: 100;
                font-family: 'Lato';
            }

            .container {
                text-align: center;
                display: table-cell;
                vertical-align: middle;
            }

            .content {
                text-align: center;
                display: inline-block;
            }

            .title {
                font-size: 96px;
            }
        </style>
    </head>
    <body>
    <div class="container">
        <div class="content">
            <h4>Sayın Kullanıcı, </h4>
            <p>Markaveotesi Yönetim paneline giriş için talebiniz doğrultusunda şifreniz yenilenmiştir</p>
            <h4>Yeni Şifreniz: {{ $yenisifre }}</h4>
            <p>Bir sonraki girişinizde yeni şifrenizi kullanabilirsiniz.</p>
            <p>Sistem tarafından belirlenen şifrenizi değiştirmek istiyorsanız:paneldeki Şifreyi Değiştir'i seçiniz ve yönergeleri kullanarak gereken bilgileri giriniz.</p>
            <p>Güvenliğiniz için şifrenizi lütfen not ediniz.</p>

        </div>
    </div>
</body>
</html>
