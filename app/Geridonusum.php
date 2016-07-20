<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Geridonusum extends Model
{
    protected  $table = 'geridonusum';
    protected $fillable = [
        'adi','tabloadi','adi', 'tabloid','durumu',
    ];
}
