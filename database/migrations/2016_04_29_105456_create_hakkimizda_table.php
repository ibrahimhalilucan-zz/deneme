<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateHakkimizdaTable extends Migration
{
    public function up()
    {
         Schema::create('hakkimizda', function (Blueprint $table) {
            $table->increments('id');
            $table->string('anaresim');
            $table->string('adi');
            $table->string('sirasi');
            $table->text('aciklama');
            $table->string('tags');
            $table->string('spot');
            $table->text('solhizmet');             
            $table->text('saghizmet');            
            $table->string('durumu',20);
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('hakkimizda');
    }
}
