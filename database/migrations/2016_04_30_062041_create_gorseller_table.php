<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGorsellerTable extends Migration
{
    public function up()
    {
         Schema::create('gorseller', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resim');
            $table->string('referansid'); 
            $table->string('sirasi');           
            $table->string('durumu',20);
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('gorseller');
    }
}
