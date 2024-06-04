<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPreordersIdAndNamesIdToWorkOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('work_orders', function (Blueprint $table) {
            $table->unsignedBigInteger('preorders_id')->nullable();
            $table->unsignedBigInteger('names_id')->nullable();

            // Adding foreign key constraints
            $table->foreign('preorders_id')->references('id')->on('preorders')->onDelete('cascade');
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
        Schema::table('work_orders', function (Blueprint $table) {
            $table->dropForeign(['preorders_id']);
            $table->dropForeign(['names_id']);
            $table->dropColumn(['preorders_id', 'names_id']);
        });
    }
}
