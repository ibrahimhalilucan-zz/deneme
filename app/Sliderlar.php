<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliderlar extends Model
{
    protected  $table = 'sliderlar';
    protected $fillable = [
        'resim','adi', 'sirasi','durumu','silinmedurumu','slideryeri'
    ];
    public function scopeSliderlari_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
}
