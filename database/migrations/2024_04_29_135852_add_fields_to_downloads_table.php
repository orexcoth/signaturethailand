<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    
    public function up() {
        Schema::table('downloads', function (Blueprint $table) {
            $table->unsignedBigInteger('sells_id')->nullable();
            $table->unsignedBigInteger('preorders_id')->nullable();
            $table->unsignedBigInteger('post_id')->nullable();
            $table->string('tablename')->nullable();
            $table->string('type')->nullable();
    
            $table->foreign('sells_id')->references('id')->on('sells');
            $table->foreign('preorders_id')->references('id')->on('preorders');
        });
    }

    /**
     * Reverse the migrations.
     */
    
    public function down() {
        Schema::table('downloads', function (Blueprint $table) {
            $table->dropColumn(['sells_id', 'preorders_id', 'post_id', 'tablename', 'type']);
        });
    }
};
