<?php

namespace App\Http\Controllers;

use Validator;
use App\Urunler;
use Helpers;
use Mail;
use File;
use \Input as Input;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Hakkimda;
use App\Yetenekler;
use App\Hizmetler;
use App\GeriDonusum;
use App\Portfolyo;
use App\PortfolyoGorseller;
use App\Logolar;
use App\Gorusler;
use App\Kategoriler;
use App\Yazilar;
use App\SosyalAglar;
use App\Iletisim;

date_default_timezone_set('Europe/Istanbul');

class IndexController extends Controller {

    public function anasayfa() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $abkosul = ['yazilar.geridonusum' => 'Pasif', 'yazilar.durum' => 'Aktif'];
        $anasayfablog = Yazilar::son_blog_yazi_getir($abkosul)->get();

        $kosul = ['portfolyo.geridonusum' => 'Pasif', 'portfolyo.durum' => 'Aktif'];
        $anasayfaportfolyo = Portfolyo::anasayfa_portfolyo_getir($kosul)->get();

        return view('anasayfa', compact('anasayfablog', 'anasayfaportfolyo', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function portfolyo() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "portfolyomuz, portfolyo, çalışmalar, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $kosul = ['portfolyo.geridonusum' => 'Pasif', 'portfolyo.durum' => 'Aktif'];
        $portfolyo = Portfolyo::portfolyo_getir($kosul)->get();

        return view('portfolyo', compact('portfolyo', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function portfolyodetay($slug) {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "portfolyomuz, portfolyo, çalışmalar, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $kosul = ['portfolyo.slug' => $slug];
        $portfolyo = Portfolyo::portfolyo_getir($kosul)->get();
        $calisma = Portfolyo::where('slug', $slug)->first();
        $resimler = PortfolyoGorseller::where('calismaid', $calisma->id)->get();

        return view('portfolyodetay', compact('portfolyo', 'resimler', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function blog() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "blog, yazılar, sosyal hayat, yardım, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $kosul = ['yazilar.geridonusum' => 'Pasif', 'yazilar.durum' => 'Aktif'];
        $yazilar = Yazilar::yazilari_getir($kosul)->get();

        return view('blog', compact('yazilar', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function blogdetay($slug) {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $key = Yazilar::where('slug', $slug)->first(); $keywords = $key->etiket;
        /* /////////////////////////////// */

        $kosul = ['yazilar.slug' => $slug];
        $yazi = Yazilar::blog_detay_getir($kosul)->get();

        $kategorikosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $kategoriler = Kategoriler::where($kategorikosul)->orderBy('sira', 'DESC')->get();

        $sonyazikosul = ['yazilar.geridonusum' => 'Pasif', 'yazilar.durum' => 'Aktif'];
        $sonyazilar = Yazilar::son_blog_yazi_getir($sonyazikosul)->get();
        
        return view('blogdetay', compact('yazi', 'sonyazilar', 'kategoriler', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function kategori($slug) {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "blog, kategoriler, yazılar, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $kosul = ['yazilar.geridonusum' => 'Pasif', 'yazilar.durum' => 'Aktif', 'K.slug' => $slug];
        $yazilar = Yazilar::yazilari_getir($kosul)->get();

        return view('kategoriler', compact('yazilar', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function hakkimda() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        /* /////////////////////////////// */

        $hakkimda = Hakkimda::first();
        $yetenekler = Yetenekler::orderBy('sira')->get();
        $keywords = $hakkimda->etiket;
        return view('hakkimda', compact('hakkimda', 'yetenekler', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function hizmetlerim() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "hizmetler, hizmetlerim, sunum, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */
        return view('hizmetlerim', compact('footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function referanslarim() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = "referans, referanslarım, logo, web, web tasarım, grafik tasarım, sosyal medya, interaktif";
        /* /////////////////////////////// */

        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $gorusler = Gorusler::where($kosul)->orderBy('sira')->get();
        $logolar = Logolar::where($kosul)->orderBy('sira')->get();
        return view('referanslarim', compact('gorusler', 'logolar', 'footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function iletisim() {
        /* HER SAYFAYA SABİT GELEN VERİLER */
        $kosul = ['geridonusum' => 'Pasif', 'durum' => 'Aktif'];
        $footeriletisim = Iletisim::first();
        $footerhizmetler = Hizmetler::where($kosul)->orderBy('sira')->get();
        $footersosyal = SosyalAglar::where($kosul)->orderBy('sira')->get();
        $footerlogolar = Logolar::where($kosul)->orderBy('sira')->take(9)->get();
        $footeryazilar = Yazilar::where($kosul)->orderBy('sira')->take(6)->get();
        $keywords = $footeriletisim->etiket;
        /* /////////////////////////////// */
        return view('iletisim', compact('footerhizmetler', 'footeriletisim', 'footerlogolar', 'footeryazilar', 'footersosyal', 'keywords'));
    }

    public function mailgonder(Request $request) {
        $isim = $request->get('isim');
        $email = $request->get('email');
        $konu = $request->get('konu');
        $mesaj = $request->get('mesaj');


        $data = array(
            'isim' => $isim,
            'email' => $email,
            'konu' => $konu,
            'mesaj' => $mesaj,
        );
        $ok = Mail::send('iletisimformu-maili', $data, function($message) {
                    $message->to('ozhanm@hotmail.com', 'Özhan Mengücek')->subject('İletişim Formu');
                });

        if ($ok == 1) {
            session()->flash('mailsucces', 'Mesajınız iletildi.');
            return redirect()->back();
        } else {
            session()->flash('mailhata', 'Mesajınız gönderilirken hata oluştu.');
            return redirect()->back();
        }
    }

}
