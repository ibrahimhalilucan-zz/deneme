<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Menulerimiz;
use App\Social;
use App\Sliderlar;
use App\Referanslarimiz;
use App\Gorseller;
use App\Hakkimizda;
use App\Iletisim;
use App\Seo;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Database\Query\Builder;
use Memcached;

class HomeController extends Controller {

    public function index() {
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
        $social = Social::sosyalaglari_getir($kosul)->get();
        $sliderkosul1 = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif', 'slideryeri' => '1.Bölge'];
        $sliderkosul2 = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif', 'slideryeri' => '2.Bölge'];
        $sliderkosul3 = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif', 'slideryeri' => '3.Bölge'];
        $sliderkosul4 = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif', 'slideryeri' => '4.Bölge'];
        $sliderbir = Sliderlar::sliderlari_getir($sliderkosul1)->get();
        $slideriki = Sliderlar::sliderlari_getir($sliderkosul2)->get();
        $slideruc = Sliderlar::sliderlari_getir($sliderkosul3)->get();
        $sliderdort = Sliderlar::sliderlari_getir($sliderkosul4)->get();
        $seobilgileri = Seo::seobilgilerini_getir()->get();
        $titlekosul = ['sayfaturu' => 'anasayfa', 'durumu' => 'Aktif'];
        $pagetitle = Menulerimiz::menuleri_getir($titlekosul)->get();
        return view('index', compact('menulerimiz', 'social', 'sliderbir', 'slideriki', 'slideruc', 'sliderdort', 'seobilgileri', 'pagetitle'));
        //  return Redirect::to('referanslarimiz');
    }

    public function anasayfa() {
//        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
//        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
//        $social = Social::sosyalaglari_getir($kosul)->get();
//        $sliderkosul1 =['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif','slideryeri'=>'1.Bölge'];
//        $sliderkosul2 =['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif','slideryeri'=>'2.Bölge'];
//        $sliderkosul3 =['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif','slideryeri'=>'3.Bölge'];
//        $sliderkosul4 =['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif','slideryeri'=>'4.Bölge'];
//        $sliderbir = Sliderlar::sliderlari_getir($sliderkosul1)->get();
//        $slideriki = Sliderlar::sliderlari_getir($sliderkosul2)->get();
//        $slideruc = Sliderlar::sliderlari_getir($sliderkosul3)->get();
//        $sliderdort = Sliderlar::sliderlari_getir($sliderkosul4)->get();
//        return view('index',  compact('menulerimiz','social','sliderbir','slideriki','slideruc','sliderdort'));
        return Redirect::to('referanslarimiz');
    }

    public function referanslarimiz() {
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
        $social = Social::sosyalaglari_getir($kosul)->get();
        $referanslarimiz = Referanslarimiz::referanslarimizi_getir($kosul)->get();
        $seobilgileri = Seo::seobilgilerini_getir()->get();
        $titlekosul = ['sayfaturu' => 'referanslarimiz', 'durumu' => 'Aktif'];
        $pagetitle = Menulerimiz::menuleri_getir($titlekosul)->get();

        return view('referanslarimiz', compact('referanslarimiz', 'menulerimiz', 'social', 'seobilgileri', 'pagetitle'));
    }

    public function detay($slug) {
        $aktifsayfa_kosulu = ['slug' => $slug];
        $aktifsayfa_kosulu2 = ['R.slug' => $slug];
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
        $social = Social::sosyalaglari_getir($kosul)->get();
        $referanslarimiz = Referanslarimiz::referanslarimizi_getir($aktifsayfa_kosulu)->get();
        //dd($referanslarimiz);
        $detayresimleri = DB::table('referanslarimiz as R')
                        ->leftJoin('gorseller as G', 'R.id', '=', 'G.referansid')
                        ->where($aktifsayfa_kosulu2)
                        ->select('G.resim as resim')->orderBy('G.sirasi')->get();
        //dd($detayresimleri);
        $seobilgileri = Seo::seobilgilerini_getir()->get();

        $titlekosul = ['slug' => $slug,];
        $pagetitle = Referanslarimiz::referanslarimizi_getir($titlekosul)->get();
       // dd($slug);
        $sayfaturu = Referanslarimiz::aktif_sayfayi_getir($slug)->first();
        
        if ($sayfaturu == null) {
             abort(404);
        } else {
            return view('detay', compact('menulerimiz', 'social', 'referanslarimiz', 'detayresimleri', 'seobilgileri', 'pagetitle'));
        }
    }

    public function hakkimizda() {
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
        $social = Social::sosyalaglari_getir($kosul)->get();
        $hakkimizda = Hakkimizda::hakkimizda_getir($kosul)->get();
        $seobilgileri = Seo::seobilgilerini_getir()->get();
        $titlekosul = ['sayfaturu' => 'hakkimizda', 'durumu' => 'Aktif'];
        $pagetitle = Menulerimiz::menuleri_getir($titlekosul)->get();
        return view('hakkimizda', compact('menulerimiz', 'social', 'hakkimizda', 'seobilgileri', 'pagetitle'));
    }

    public function iletisim() {
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        $menulerimiz = Menulerimiz::menuleri_getir($kosul)->get();
        $social = Social::sosyalaglari_getir($kosul)->get();
        $iletisim = Iletisim::iletisimbilgilerigetir_getir()->get();
        $seobilgileri = Seo::seobilgilerini_getir()->get();
        $titlekosul = ['sayfaturu' => 'iletisim', 'durumu' => 'Aktif'];
        $pagetitle = Menulerimiz::menuleri_getir($titlekosul)->get();
        return view('iletisim', compact('menulerimiz', 'social', 'iletisim', 'seobilgileri', 'pagetitle'));
    }

}
