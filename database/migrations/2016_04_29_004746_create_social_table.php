<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocialTable extends Migration
{
    public function up()
    {
        Schema::create('social', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi'); 
            $table->string('turu');            
            $table->string('url');
            $table->string('sirasi');
            $table->string('durumu');     
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('social');
    }
}
