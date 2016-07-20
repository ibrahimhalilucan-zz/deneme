<?php

namespace App\Http\Controllers;

use Intervention\Image\ImageManagerStatic as Image;
use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;
use Validator;
use File;
use \Input as Input;
use Helpers;
use Mail;
use App\User;
use App\Menulerimiz;
use App\Iletisim;
use App\Social;
use App\Hakkimizda;
use App\Referanslarimiz;
use App\Gorseller;
use App\Seo;
use App\Geridonusum;
use App\Sliderlar;
use Carbon\Carbon;

date_default_timezone_set('Europe/Istanbul');

class AdminController extends Controller {

    public function index() {
        if (Auth::check()) {
            return Redirect::to('admin/genel');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function genel() {
        if (Auth::check()) {
            return view('admin/index');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function menulerimiz() {
        if (Auth::check()) {
            $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
            $menulerimiz = DB::table('menulerimiz')->where($kosul)->get();
            return view('admin/menulerimiz', compact('menulerimiz'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function menuekleme() {
        if (Auth::check()) {
            return view('admin/menuekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function menuinsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'pagetitle' => 'required',
                        'sayfaturu' => 'required',
                        'sirasi' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);
            $request->merge([
                'slug' => $turkce_seo_uyumlu_link_slug,
            ]);
            Menulerimiz::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function menuduzenleme($id) {
        if (Auth::check()) {
            $menu = Menulerimiz::find($id);
            return view('admin.menuduzenleme', compact('menu'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function menuupdate(Request $request, $id) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'pagetitle' => 'required',
                        'sayfaturu' => 'required',
                        'sirasi' => 'required',
                        'durumu' => 'required'
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);
            $request->merge([
                'slug' => $turkce_seo_uyumlu_link_slug,
            ]);

            Menulerimiz::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referanslarimiz() {
        if (Auth::check()) {
            $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
            $referanslarimiz = DB::table('referanslarimiz')->where($kosul)->get();
            return view('admin/referanslarimiz', compact('referanslarimiz'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansekleme() {
        if (Auth::check()) {
            return view('admin/referansekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansinsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'anaresim' => 'required',
                        'sirasi' => 'required',
                        'durumu' => 'required',
                        'baslik' => 'required',
                        'pagetitle' => 'required',
                        'kategorisi' => 'required'
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);
            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            }
            $thumb = Image::make('public/resimler/' . $imageName);
            $thumb->fit(380, 590, function ($constraint) {
                $constraint->upsize();
            });
            $thumb->save('public/resimler/thumb/' . $imageName);

            $request->merge([
                'resim' => $imageName,
                'slug' => $turkce_seo_uyumlu_link_slug,
            ]);
            Referanslarimiz::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansduzenleme($id) {
        if (Auth::check()) {
            $referansdetay = Referanslarimiz::find($id);
            return view('admin.referansduzenleme', compact('referansdetay'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansupdate(Request $request, $id) {
        if (Auth::check()) {
            $is_detayi = Referanslarimiz::find($id);
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'anaresim' => 'required',
                        'sirasi' => 'required',
                        'durumu' => 'required',
                        'baslik' => 'required',
                        'pagetitle' => 'required',
                        'kategorisi' => 'required'
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);



            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                File::delete('public/resimler/' . $is_detayi->resim);
                File::delete('public/resimler/thumb/' . $is_detayi->resim);
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
                $thumb = Image::make('public/resimler/' . $imageName);
                $thumb->fit(380, 590, function ($constraint) {
                    $constraint->upsize();
                });
                $thumb->save('public/resimler/thumb/' . $imageName);
            } else {
                $imageName = $is_detayi->resim;
            }

            $request->merge([
                'resim' => $imageName,
                'slug' => $turkce_seo_uyumlu_link_slug,
            ]);


            Referanslarimiz::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansgorselleri($id) {
        if (Auth::check()) {
            $sql_kosullari = ['R.id' => $id, 'G.silinmedurumu' => 'Pasif'];
            $referansdetay = DB::table('referanslarimiz')->where('id', $id)->get();
            $referansgorselleri = DB::table('referanslarimiz as R')
                            ->leftJoin('gorseller as G', 'R.id', '=', 'G.referansid')
                            ->select('G.referansid as referansid', 'G.id as id', 'G.resim as resim', 'G.sirasi as sirasi', 'R.adi as adi', 'G.durumu as durumu')->where($sql_kosullari)->get();


            return view('admin.referansgorselleri', compact('referansdetay', 'referansgorselleri'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function referansgorselinsert(Request $request) {
        if (Auth::check()) {
            $referansid = $request->get('referansid');
            $referansdetay = Referanslarimiz::find($referansid);
            $validator = Validator::make($request->all(), [
                        'sirasi' => 'required',
                        'anaresim' => 'required',
                        'referansid' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($referansdetay->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            }
            $thumb = Image::make('public/resimler/' . $imageName);
            $thumb->fit(380, 590, function ($constraint) {
                $constraint->upsize();
            });
            $thumb->save('public/resimler/thumb/' . $imageName);
            $request->merge([
                'resim' => $imageName,
            ]);
            Gorseller::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function gorselupdate(Request $request, $id) {
        if (Auth::check()) {
            $is_detayi = Gorseller::find($id);
            $validator = Validator::make($request->all(), [
                        'sirasi' => 'required',
                        'anaresim' => 'required',
                        'referansid' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                File::delete('public/resimler/' . $is_detayi->resim);
                File::delete('public/resimler/thumb/' . $is_detayi->resim);
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
                $thumb = Image::make('public/resimler/' . $imageName);
                $thumb->fit(380, 590, function ($constraint) {
                    $constraint->upsize();
                });
                $thumb->save('public/resimler/thumb/' . $imageName);
            } else {
                $imageName = $is_detayi->resim;
            }
            $request->merge([
                'resim' => $imageName,
            ]);
            Gorseller::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function hakkimizda() {
        if (Auth::check()) {
            $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
            $hakkimizda = DB::table('hakkimizda')->where($kosul)->get();
            return view('admin/hakkimizda', compact('hakkimizda'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function hakkimizdaekleme() {
        if (Auth::check()) {
            return view('admin/hakkimizdaekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function hakkimizdainsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'anaresim' => 'required',
                        'adi' => 'required',
                        'aciklama' => 'required',
                        'solhizmet' => 'required',
                        'saghizmet' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            }


            $request->merge([
                'resim' => $imageName,
            ]);
            Hakkimizda::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function hakkimizdaduzenleme($id) {
        if (Auth::check()) {
            $hakkimizda = Hakkimizda::find($id);
            return view('admin.hakkimizdaduzenleme', compact('hakkimizda'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function hakkimizdaupdate(Request $request, $id) {
        if (Auth::check()) {
            $hakkimizda = Hakkimizda::find($id);
            $validator = Validator::make($request->all(), [
                        'anaresim' => 'required',
                        'adi' => 'required',
                        'aciklama' => 'required',
                        'solhizmet' => 'required',
                        'saghizmet' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                File::delete('public/resimler/' . $hakkimizda->resim);
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            } else {
                $imageName = $hakkimizda->resim;
            }
            $request->merge([
                'resim' => $imageName,
            ]);
            Hakkimizda::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sliderlar() {
        if (Auth::check()) {
            $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
            $sliderlar = DB::table('sliderlar')->where($kosul)->get();
            return view('admin/sliderlar', compact('sliderlar'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sliderekleme() {
        if (Auth::check()) {
            return view('admin/sliderekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sliderinsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'sirasi' => 'required',
                        'anaresim' => 'required',
                        'adi' => 'required',
                        'sirasi' => 'required',
                        'slideryeri' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            } 
            $request->merge([
                'resim' => $imageName,
            ]);
            Sliderlar::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sliderduzenleme($id) {
        if (Auth::check()) {
            $sliderlar = Sliderlar::find($id);
            return view('admin.sliderduzenleme', compact('sliderlar'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sliderupdate(Request $request, $id) {
        if (Auth::check()) {
            $is_detayi = Sliderlar::find($id);
            $validator = Validator::make($request->all(), [
                        'sirasi' => 'required',
                        'anaresim' => 'required',
                        'adi' => 'required',
                        'sirasi' => 'required',
                        'slideryeri' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            $seo_uyumlu_link = Helpers::seo_uyumlu_link_slug_olusturma($request->adi);
            $turkce_seo_uyumlu_link_slug = str_slug($seo_uyumlu_link);

            if ($request->hasFile('anaresim')) {//Eğer Anaresim yüklenmiş ise
                $imageName = $turkce_seo_uyumlu_link_slug . '-' . time() . '.' . $request->file('anaresim')->getClientOriginalExtension();
                $request->file('anaresim')->move(
                        base_path() . '/public/resimler/', $imageName
                );
            } else {
                $imageName = $is_detayi->resim;
            }
            $request->merge([
                'resim' => $imageName,
            ]);
            Sliderlar::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sosyalaglar() {
        if (Auth::check()) {
            $sosyalaglar = DB::table('social')->where('silinmedurumu', 'Pasif')->get();
            return view('admin/sosyalaglar', compact('sosyalaglar'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sosyalaglarekleme() {
        if (Auth::check()) {
            return view('admin/sosyalaglarekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sosyalaglarinsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'url' => 'required',
                        'sirasi' => 'required',
                        'turu' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Social::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sosyalagduzenleme($id) {
        if (Auth::check()) {
            $sosyalag = Social::find($id);
            return view('admin.sosyalagduzenleme', compact('sosyalag'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function sosyalagupdate(Request $request, $id) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'url' => 'required',
                        'sirasi' => 'required',
                        'turu' => 'required',
                        'durumu' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Social::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function iletisim() {
        if (Auth::check()) {
            $iletisimbilgileri = Iletisim::all();
            return view('admin/iletisim', compact('iletisimbilgileri'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function iletisimekleme() {
        if (Auth::check()) {
            return view('admin/iletisimekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function iletisiminsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'adres' => 'required',
                        'email' => 'required',
                        'phone' => 'required',
                        'aciklama' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Iletisim::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function iletisimduzenleme($id) {
        if (Auth::check()) {
            $iletisim = Iletisim::find($id);
            return view('admin.iletisimduzenleme', compact('iletisim'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function iletisimupdate(Request $request, $id) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'adi' => 'required',
                        'adres' => 'required',
                        'email' => 'required',
                        'phone' => 'required',
                        'aciklama' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Iletisim::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function seo() {
        if (Auth::check()) {
            $kosul = ['silinmedurumu' => 'Pasif'];
            $seo = DB::table('seo')->where($kosul)->get();
            return view('admin/seo', compact('seo'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function seoekleme() {
        if (Auth::check()) {
            return view('admin/seoekleme');
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function seoinsert(Request $request) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'title' => 'required',
                        'metatag' => 'required',
                        'keywords' => 'required',
                        'description' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Seo::create($request->all()); //Başka bir ekleme yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back()->withInput();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function seoduzenleme($id) {
        if (Auth::check()) {
            $seo = Seo::find($id);
            return view('admin.seoduzenleme', compact('seo'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function seoupdate(Request $request, $id) {
        if (Auth::check()) {
            $validator = Validator::make($request->all(), [
                        'title' => 'required',
                        'metatag' => 'required',
                        'keywords' => 'required',
                        'description' => 'required',
            ]);
            if ($validator->fails()) {
                session()->flash('warning', 'Durum Mesajı');
                return redirect()->back()->withInput()->withErrors($validator);
            }
            Seo::find($id)->update($request->all()); //Düzenleme Yöntemi
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function girisyap(Request $request) {
        $validator = Validator::make($request->all(), [
                    'username' => 'required',
                    'password' => 'required',
                    'email' => 'required',
        ]);
        $username = Input::get('username');
        $email = Input::get('email');
        $password = Input::get('password');

        if (Auth::attempt(['username' => $username, 'email' => $email, 'password' => $password])) {
            // return "view('admin.genel');";
            session()->flash('girisbasarili', 'Durum Mesajı');
            return redirect('admin/genel');
        } else {
            session()->flash('kullaniciyok', 'Durum Mesajı');
            return redirect()->back()->withInput()->withErrors($validator);
        }
    }

    public function geridonusum(Request $request) {
        if (Auth::check()) {
            $tabloadi = $request->get('tabloadi');
            $adi = $request->get('adi');
            $tabloid = $request->get('tabloid');
            $silinmedurumuaktif = "Aktif";

            if ($tabloadi == "menulerimiz") {
                $menulerimiz = Menulerimiz::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumuaktif;
                $menulerimiz->save();
            }
            if ($tabloadi == "social") {
                $menulerimiz = Social::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumuaktif;
                $menulerimiz->save();
            }
            if ($tabloadi == "referanslarimiz") {
                $menulerimiz = Referanslarimiz::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumuaktif;
                $menulerimiz->save();
            }
            if ($tabloadi == "gorseller") {
                $menulerimiz = Gorseller::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumuaktif;
                $menulerimiz->save();
            }
            if ($tabloadi == "sliderlar") {
                $menulerimiz = Sliderlar::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumuaktif;
                $menulerimiz->save();
            }
            $geridonusum = new Geridonusum(array(
                'adi' => $adi,
                'tabloadi' => $tabloadi,
                'tabloid' => $tabloid,
            ));
            $geridonusum->save();
            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function geridonusumkutusu() {
        if (Auth::check()) {
            $geridonusumkutusu = Geridonusum::all();
            return view('admin/geridonusumkutusu', compact('geridonusumkutusu'));
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function geriyukle(Request $request) {
        if (Auth::check()) {
            $id = $request->get('id');
            $tabloadi = $request->get('tabloadi');
            $adi = $request->get('adi');
            $tabloid = $request->get('tabloid');
            $silinmedurumupasif = "Pasif";

            if ($tabloadi == "menulerimiz") {
                $menulerimiz = Menulerimiz::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumupasif;
                $menulerimiz->save();
            }
            if ($tabloadi == "social") {
                $menulerimiz = Social::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumupasif;
                $menulerimiz->save();
            }
            if ($tabloadi == "referanslarimiz") {
                $menulerimiz = Referanslarimiz::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumupasif;
                $menulerimiz->save();
            }
            if ($tabloadi == "gorseller") {
                $menulerimiz = Gorseller::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumupasif;
                $menulerimiz->save();
            }
            if ($tabloadi == "sliderlar") {
                $menulerimiz = Sliderlar::find($tabloid);
                $menulerimiz->silinmedurumu = $silinmedurumupasif;
                $menulerimiz->save();
            }
            $model = Geridonusum::find($id);
            $model->delete();

            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function geriyuklesil(Request $request) {
        if (Auth::check()) {
            $id = $request->get('id');
            $tabloadi = $request->get('tabloadi');
            $adi = $request->get('adi');
            $tabloid = $request->get('tabloid');

            if ($tabloadi == "menulerimiz") {
                $model = Menulerimiz::find($tabloid);
                $model->delete();
            }
            if ($tabloadi == "social") {
                $model = Social::find($tabloid);
                $model->delete();
            }
            if ($tabloadi == "referanslarimiz") {
                $model = Referanslarimiz::find($tabloid);
                File::delete('public/resimler/' . $model->resim);
                File::delete('public/resimler/thumb/' . $model->resim);
                $model->delete();
            }
            if ($tabloadi == "gorseller") {
                $model = Gorseller::find($tabloid);
                File::delete('public/resimler/' . $model->resim);
                File::delete('public/resimler/thumb/' . $model->resim);
                $model->delete();
            }
            if ($tabloadi == "sliderlar") {
                $model = Sliderlar::find($tabloid);
                File::delete('public/resimler/' . $model->resim);
                $model->delete();
            }
            $model = Geridonusum::find($id);
            $model->delete();

            session()->flash('success', 'Durum Mesajı');
            return redirect()->back();
        } else {
            return Redirect::to('admin/login');
        }
    }

    public function login() {
//        $user = new User();
//        $user->username = 'Didem Modaevi';
//        $user->email = 'info@didemmodaevi.com';
//        $user->password = bcrypt('DidemModaevi5z7_!');
//        $user->save();
        if (Auth::check()) {
            return Redirect::to('admin/genel');
        } else {
            return view('panel/index');
        }
    }

    public function logout() {
        Auth::logout();
        return Redirect::to('admin/login');
    }

    public function sifremiunuttum() {
        if (Auth::check()) {
            return Redirect::to('admin/genel');
        } else {
            return view('panel/sifremiunuttum');
        }
    }

    public function yenisifregonder(Request $request) {
        $username = $request->get('username');
        $email = $request->get('email');

        $sql_kosullari = ['username' => $username, 'email' => $email];

        $kullanicilar = DB::table('users')->where($sql_kosullari)->count();

        if ($kullanicilar > 0) {//Kullanıcı var ise
            $length = 6;
            $salt = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
            $len = strlen($salt);
            $yenisifre = '';
            mt_srand(10000000 * (double) microtime());
            for ($i = 0; $i < $length; $i++) {
                $yenisifre .= $salt[mt_rand(0, $len - 1)];
            }
            $yenisifrebcrypt = bcrypt($yenisifre);

            $menulerimiz = User::find(1);
            $menulerimiz->password = $yenisifrebcrypt;
            $menulerimiz->save();

            $data = array(
                'yenisifre' => $yenisifre,
            );
            Mail::send('panel.sifremail-yazisi', $data, function($message) {
                $message->to('info@didemmodaevi.com', 'Marka ve Ötesi')->subject('Yeni Şife Talebiniz');
            });
            session()->flash('sifreyenilemebasarili', 'Durum Mesajı');
            return redirect()->back();
        } else {//Kullanıcı yok ise
            session()->flash('sifreyenilemebasarisiz', 'Durum Mesajı');
            return redirect()->back();
        }
    }

    public function sifremidegistir() {
        if (Auth::check()) {
            return Redirect::to('admin/genel');
        } else {
            return view('panel/sifremidegistir');
        }
    }

    public function changepassword(Request $request) {
        $username = Input::get('username');
        $email = Input::get('email');
        $password = Input::get('password');
        $newpassword = Input::get('newpassword');
        $newpasswordc = Input::get('newpasswordc');


        if ($newpassword == $newpasswordc) {
            if (Auth::attempt(['username' => $username, 'email' => $email, 'password' => $password])) {
                $newpasswordbcrypt = bcrypt($newpassword);
                $menulerimiz = User::find(1);
                $menulerimiz->password = $newpasswordbcrypt;
                $menulerimiz->save();
                session()->flash('changepassword', 'Durum Mesajı');
                return redirect()->back();
            } else {
                session()->flash('kullaniciyok', 'Durum Mesajı');
                return redirect()->back();
            }
        } else {
            session()->flash('sifrelereslenmiyor', 'Durum Mesajı');
            return redirect()->back();
        }
    }

}
