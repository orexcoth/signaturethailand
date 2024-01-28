<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSignsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('signs', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('names_id');
            $table->unsignedBigInteger('users_id');
            $table->unsignedInteger('work');
            $table->unsignedInteger('finance');
            $table->unsignedInteger('love');
            $table->unsignedInteger('health');
            $table->unsignedInteger('fortune');
            $table->longText('description');
            $table->longText('sign');
            $table->longText('video')->nullable();
            $table->longText('feature')->nullable();
            $table->string('lang');
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('names_id')->references('id')->on('names')->onDelete('cascade');
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('signs');
    }
}
