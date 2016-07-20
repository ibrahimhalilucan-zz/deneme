<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateReferanslarimizTable extends Migration
{
    public function up()
    {
         Schema::create('referanslarimiz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resim');
            $table->string('kategorisi');
            $table->string('adi');
            $table->string('baslik');
            $table->string('pagetitle');
            $table->string('sirasi');
            $table->string('tags');
            $table->string('date');
            $table->string('musteri');
            $table->text('aciklama');            
            $table->string('durumu',20);            
            $table->string('slug');
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('referanslarimiz');
    }
}
