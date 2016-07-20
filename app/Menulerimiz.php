<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menulerimiz extends Model
{
    protected  $table = 'menulerimiz';
    protected $fillable = [
        'sayfaturu','adi', 'sirasi','tags','durumu','slug', 'silinmedurumu','pagetitle'
    ];
    public function scopeMenuleri_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
    public function gorseller() {
        $kosul = ['silinmedurumu' => 'Pasif', 'durumu' => 'Aktif'];
        return $this->hasMany('App\Gorseller', 'referansid', 'id')->where($kosul)->orderBy('sirasi');
    }
    
    
    
}
