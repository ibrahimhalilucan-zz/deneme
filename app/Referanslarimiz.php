<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Referanslarimiz extends Model
{
    protected  $table = 'referanslarimiz';
    protected $fillable = [
        'resim','kategorisi','adi','baslik', 'sirasi','tags','date','musteri','durumu','aciklama','slug', 'silinmedurumu','pagetitle',
    ];
    public function scopeReferanslarimizi_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
    public function scopeAktif_sayfayi_getir($query, $type) {
        return $query->where('slug', $type);
    }
}
