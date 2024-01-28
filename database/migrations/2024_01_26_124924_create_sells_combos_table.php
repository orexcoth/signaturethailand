<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsCombosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells_combos', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('sells_names_id');
            $table->unsignedBigInteger('signs_id');
            $table->text('text');
            $table->string('status');
            $table->longText('description')->nullable();
            $table->longText('sign')->nullable();
            $table->longText('video')->nullable();
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('sells_names_id')->references('id')->on('sells_names')->onDelete('cascade');
            $table->foreign('signs_id')->references('id')->on('signs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells_combos');
    }
}
