<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGeridonusumTable extends Migration
{
    public function up()
    {
         Schema::create('geridonusum', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');
            $table->string('tabloadi'); 
            $table->string('tabloid');
            $table->string('durumu')->default('Aktif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('geridonusum');
    }
}
