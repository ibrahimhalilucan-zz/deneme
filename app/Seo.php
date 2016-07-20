<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Seo extends Model
{
   protected  $table = 'seo';
    protected $fillable = [
        'title','keywords', 'metatag','description','silinmedurumu',
    ];
    public function scopeSeobilgilerini_getir($query) {
        return $query;
    }
}
