<?php

Route::get('admin/', 'AdminController@genel');
Route::get('admin/index', 'AdminController@genel');
Route::get('admin/genel', 'AdminController@genel');

Route::get('admin/menulerimiz', 'AdminController@menulerimiz');
Route::get('admin/menuekleme', 'AdminController@menuekleme');
Route::post('admin/menuekleme', 'AdminController@menuinsert');
Route::get('admin/menuduzenleme/{id}', 'AdminController@menuduzenleme');
Route::post('admin/menuduzenleme/{id}', 'AdminController@menuupdate');

Route::get('admin/referanslarimiz', 'AdminController@referanslarimiz');
Route::get('admin/referansekleme', 'AdminController@referansekleme');
Route::post('admin/referansekleme', 'AdminController@referansinsert');
Route::get('admin/referansduzenleme/{id}', 'AdminController@referansduzenleme');
Route::post('admin/referansduzenleme/{id}', 'AdminController@referansupdate');
Route::get('admin/referansgorselleri/{id}', 'AdminController@referansgorselleri');
Route::post('admin/referansgorselleri/{id}', 'AdminController@referansgorselinsert');

Route::post('admin/gorselupdate/{id}', 'AdminController@gorselupdate');


Route::get('admin/hakkimizda', 'AdminController@hakkimizda');
Route::get('admin/hakkimizdaekleme', 'AdminController@hakkimizdaekleme');
Route::post('admin/hakkimizdaekleme', 'AdminController@hakkimizdainsert');
Route::get('admin/hakkimizdaduzenleme/{id}', 'AdminController@hakkimizdaduzenleme');
Route::post('admin/hakkimizdaduzenleme/{id}', 'AdminController@hakkimizdaupdate');



Route::get('admin/sosyalaglar', 'AdminController@sosyalaglar');
Route::post('admin/sosyalaglar', 'AdminController@sosyalaghizliupdate');
Route::get('admin/sosyalaglarekleme', 'AdminController@sosyalaglarekleme');
Route::post('admin/sosyalaglarekleme', 'AdminController@sosyalaglarinsert');
Route::get('admin/sosyalagduzenleme/{id}', 'AdminController@sosyalagduzenleme');
Route::post('admin/sosyalagduzenleme/{id}', 'AdminController@sosyalagupdate');

Route::get('admin/iletisim', 'AdminController@iletisim');
Route::get('admin/iletisimekleme', 'AdminController@iletisimekleme');
Route::post('admin/iletisimekleme', 'AdminController@iletisiminsert');
Route::get('admin/iletisimduzenle/{id}', 'AdminController@iletisimduzenleme');
Route::post('admin/iletisimduzenle/{id}', 'AdminController@iletisimupdate');

Route::get('admin/sliderlar', 'AdminController@sliderlar');
Route::get('admin/sliderekleme', 'AdminController@sliderekleme');
Route::post('admin/sliderekleme', 'AdminController@sliderinsert');
Route::get('admin/sliderduzenleme/{id}', 'AdminController@sliderduzenleme');
Route::post('admin/sliderduzenleme/{id}', 'AdminController@sliderupdate');

Route::get('admin/seo', 'AdminController@seo');
Route::get('admin/seoekleme', 'AdminController@seoekleme');
Route::post('admin/seoekleme', 'AdminController@seoinsert');
Route::get('admin/seoduzenleme/{id}', 'AdminController@seoduzenleme');
Route::post('admin/seoduzenleme/{id}', 'AdminController@seoupdate');

Route::get('admin/geridonusumkutusu', 'AdminController@geridonusumkutusu');
Route::post('admin/geridonusum', 'AdminController@geridonusum');
Route::post('admin/geriyukle', 'AdminController@geriyukle');
Route::post('admin/geriyuklesil', 'AdminController@geriyuklesil');


Route::post('email/mailgonder', 'Email@mailgonder');
Route::post('arama/index', 'Arama@index');





Route::group(['prefix' => 'admin'], function () {
     Route::get('login', [
        'as' => 'admin.login',
        'uses' => 'AdminController@login'
    ]);
    Route::get('logout', [
        'as' => 'admin.login',
        'uses' => 'AdminController@logut'
    ]);
    Route::post('login', 'AdminController@login');
});

Route::get('admin/login', 'AdminController@login');
Route::get('admin/logout', 'AdminController@logout');

Route::post('admin/girisyap', 'AdminController@girisyap');
Route::get('admin/sifremiunuttum', 'AdminController@sifremiunuttum');
Route::post('admin/sifremiunuttum',[
    'uses' => 'AdminController@yenisifregonder',
    'as' => 'yenisifregonder'
]);
Route::get('admin/sifremidegistir', 'AdminController@sifremidegistir');
Route::post('admin/sifremidegistir', 'AdminController@changepassword');

Route::get('/', 'HomeController@index');
Route::get('anasayfa', 'HomeController@anasayfa');
Route::get('referanslarimiz', 'HomeController@referanslarimiz');
Route::get('hakkimizda', 'HomeController@hakkimizda');
Route::get('iletisim', 'HomeController@iletisim');
Route::get('referanslarimiz/{slug}', 'HomeController@detay');





Route::group(['middleware' => ['web']], function () {
    
});
