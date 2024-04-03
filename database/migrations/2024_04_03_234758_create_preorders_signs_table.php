<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreordersSignsTable extends Migration
{
    public function up()
    {
        Schema::create('preorders_signs', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->integer('work');
            $table->integer('finance');
            $table->integer('love');
            $table->integer('health');
            $table->integer('fortune');
            $table->longText('description')->nullable();
            $table->longText('sign')->nullable();
            $table->longText('video')->nullable();
            $table->longText('feature')->nullable();
            $table->string('lang');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preorders_signs');
    }
}
