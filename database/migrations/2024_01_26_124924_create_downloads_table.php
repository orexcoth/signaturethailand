<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDownloadsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('downloads', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('signs_id');
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('commissions_id')->nullable();
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('signs_id')->references('id')->on('signs')->onDelete('cascade');
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('commissions_id')->references('id')->on('commissions')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('downloads');
    }
}
