<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('preorders_turn_in', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('preorders_id');
            $table->foreign('preorders_id')->references('id')->on('preorders');
            $table->unsignedBigInteger('users_id');
            $table->foreign('users_id')->references('id')->on('users');
            $table->longText('sign')->nullable();
            $table->longText('video')->nullable();
            $table->longText('description')->nullable();        
            $table->string('status')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('preorders_turn_in');
    }
};
