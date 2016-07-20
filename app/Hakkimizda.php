<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Hakkimizda extends Model
{
    protected  $table = 'hakkimizda';
    protected $fillable = [
        'resim','adi','aciklama', 'solhizmet','saghizmet','durumu','silinmedurumu','tags','spot'
    ];
    public function scopeHakkimizda_getir($query, $kosul) {
        return $query->where($kosul)->orderBy('sirasi', 'asc');
    }
}
