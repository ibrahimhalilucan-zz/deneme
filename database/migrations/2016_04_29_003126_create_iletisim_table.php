<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateIletisimTable extends Migration
{
    public function up()
    {
        Schema::create('iletisim', function (Blueprint $table) {
            $table->increments('id');
            $table->string('adi');    
            $table->text('aciklama');             
            $table->text('adres');
            $table->string('phone');
            $table->string('email')->unique();
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('iletisim');
    }
}
