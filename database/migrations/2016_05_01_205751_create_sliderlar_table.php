<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSliderlarTable extends Migration
{
    public function up()
    {
         Schema::create('sliderlar', function (Blueprint $table) {
            $table->increments('id');
            $table->string('resim');
            $table->string('adi'); 
            $table->string('slideryeri');
            $table->string('sirasi');           
            $table->string('durumu',20);
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('sliderlar');
    }
}
