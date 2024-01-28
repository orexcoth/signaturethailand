<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSellsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('sells', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->string('status');
            $table->longText('sell_number');
            $table->decimal('total', 10, 2); // Assuming total has 2 decimal places
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('line');
            $table->string('shipping_method');
            $table->longText('shipping_detail');
            $table->string('payment_method');
            $table->longText('payment_qr')->nullable();
            $table->string('payment_status');
            $table->dateTime('payment_date')->nullable();
            $table->string('ref1')->nullable();
            $table->string('ref2')->nullable();
            $table->string('ref3')->nullable();
            // Add any additional columns or modifications as needed
            $table->timestamps();

            // Foreign key relationship
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('sells');
    }
}
