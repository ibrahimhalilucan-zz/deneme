<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMenulerimizTable extends Migration
{
    public function up()
    {
         Schema::create('menulerimiz', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sayfaturu',20);
            $table->string('adi');
            $table->string('pagetitle');
            $table->string('sirasi',20);
            $table->string('tags');           
            $table->string('durumu',20);
            $table->string('slug');
            $table->string('silinmedurumu')->default('Pasif');
            $table->rememberToken();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('menulerimiz');
    }
}
