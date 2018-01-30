<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Cform extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
             Schema::create('cforms', function(Blueprint $table){

            $table->string('cimage')-> default('default.jpg');
            $table->string('s_id')->unique();
            $table->string('position');
            $table->string('cgpa');
            $table->string('planguage');
            $table->string('cproject');
            $table->string('event');
            $table->string('reason');
            $table->string('docs')->nullable();
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
        //
        Schema::drop('cforms');
    }
}
