<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Iletisim extends Model
{
    protected  $table = 'iletisim';
    protected $fillable = [
        'adi','aciklama', 'adres','phone','email',
    ];
    public function scopeIletisimbilgilerigetir_getir($query) {
        return $query;
    }
}
