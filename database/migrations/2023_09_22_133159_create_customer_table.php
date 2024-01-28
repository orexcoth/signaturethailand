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
        Schema::create('customer', function (Blueprint $table) {
            $table->id();
            $table->enum('role', ['admin', 'creator', 'other']);
            $table->string('username')->unique()->nullable();
            $table->string('password'); // Make sure to hash the password in your application
            $table->string('firstname')->nullable();
            $table->string('lastname')->nullable();
            $table->string('email')->nullable();
            $table->string('phone')->nullable();
            $table->string('line')->nullable();
            $table->enum('status', ['active', 'inactive'])->default('active');

            // Remove unnecessary columns
            $table->dropColumn('messages');
            $table->dropColumn('browserFingerprint');
            $table->dropColumn('remember');
            $table->dropColumn('image');
            $table->dropColumn('place');
            $table->dropColumn('province');
            $table->dropColumn('map');
            $table->dropColumn('google_map');
            $table->dropColumn('facebook');
            $table->dropColumn('last_action');
            $table->dropColumn('history');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('customer');
    }
};
