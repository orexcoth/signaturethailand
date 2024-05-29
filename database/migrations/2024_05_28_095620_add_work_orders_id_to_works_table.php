<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWorkOrdersIdToWorksTable extends Migration
{
    public function up()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->unsignedBigInteger('work_orders_id')->nullable()->after('commissions_id');
            $table->foreign('work_orders_id')->references('id')->on('work_orders')->onDelete('cascade');
        });
    }

    public function down()
    {
        Schema::table('works', function (Blueprint $table) {
            $table->dropForeign(['work_orders_id']);
            $table->dropColumn('work_orders_id');
        });
    }
}

