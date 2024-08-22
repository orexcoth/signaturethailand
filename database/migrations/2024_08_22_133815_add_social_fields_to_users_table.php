<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddSocialFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->text('description')->nullable()->after('photo');
            $table->string('facebook')->nullable()->after('description');
            $table->string('line')->nullable()->after('facebook');
            $table->string('ig')->nullable()->after('line');
            $table->string('twitter')->nullable()->after('ig');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('description');
            $table->dropColumn('facebook');
            $table->dropColumn('line');
            $table->dropColumn('ig');
            $table->dropColumn('twitter');
        });
    }
}
