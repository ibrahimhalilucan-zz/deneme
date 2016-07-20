<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSeoTable extends Migration
{
    public function up()
    {
         Schema::create('seo', function (Blueprint $table) {
            $table->increments('id');
            $table->text('title');
            $table->text('keywords');
            $table->text('metatag'); 
            $table->text('description'); 
            $table->string('silinmedurumu')->default('Pasif');
            $table->timestamps();
        });
    }
    public function down()
    {
        Schema::drop('seo');
    }
}
