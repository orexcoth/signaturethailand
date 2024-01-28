<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateNamesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('names', function (Blueprint $table) {
            $table->id();
            $table->longText('name_th')->nullable();
            $table->longText('name_en')->nullable();
            $table->decimal('price_th', 10, 2); // Assuming prices have 2 decimal places
            $table->decimal('price_en', 10, 2); // Assuming prices have 2 decimal places
            // Add any additional columns or modifications as needed
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
        Schema::dropIfExists('names');
    }
}
