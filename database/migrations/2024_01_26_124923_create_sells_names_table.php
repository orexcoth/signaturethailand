<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells_names', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('names_id');
            $table->unsignedBigInteger('sells_id');
            $table->decimal('price', 10, 2); // Assuming price has 2 decimal places
            $table->integer('combo')->default(0);
            $table->longText('remark')->nullable();
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('names_id')->references('id')->on('names')->onDelete('cascade');
            $table->foreign('sells_id')->references('id')->on('sells')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells_names');
    }
}

