<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Gorseller extends Model
{
    protected  $table = 'gorseller';
    protected $fillable = [
        'resim','referansid','durumu','silinmedurumu','sirasi'
    ];
    public function scopeDetayresimlerini_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
}
