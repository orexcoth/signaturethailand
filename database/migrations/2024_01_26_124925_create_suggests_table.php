<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSuggestsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('suggests', function (Blueprint $table) {
            $table->id();
            $table->longText('name_th');
            $table->longText('name_en');
            $table->string('email');
            $table->string('phone');
            $table->string('status');
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('names_id');
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('names_id')->references('id')->on('names')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('suggests');
    }
}
