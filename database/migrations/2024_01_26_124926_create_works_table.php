<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateWorksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('works', function (Blueprint $table) {
            $table->id();
            $table->longText('make')->nullable();
            $table->string('status');
            $table->string('type');
            $table->longText('description')->nullable();
            $table->unsignedBigInteger('users_id');
            $table->unsignedBigInteger('names_id')->nullable();
            $table->unsignedBigInteger('sells_id')->nullable();
            $table->unsignedBigInteger('suggests_id')->nullable();
            $table->unsignedBigInteger('orders_id')->nullable();
            $table->unsignedBigInteger('commissions_id')->nullable();
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationships
            $table->foreign('users_id')->references('id')->on('users')->onDelete('cascade');
            $table->foreign('names_id')->references('id')->on('names')->onDelete('cascade');
            $table->foreign('sells_id')->references('id')->on('sells')->onDelete('cascade');
            $table->foreign('suggests_id')->references('id')->on('suggests')->onDelete('cascade');
            $table->foreign('orders_id')->references('id')->on('orders')->onDelete('cascade');
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
        Schema::dropIfExists('works');
    }
}
