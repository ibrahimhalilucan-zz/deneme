<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Social extends Model
{
    protected  $table = 'social';
    protected $fillable = [
        'adi','turu', 'url','sirasi','durumu','silinmedurumu',
    ];
    public function scopeSosyalaglari_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
}
