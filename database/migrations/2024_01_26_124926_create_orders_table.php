<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customers_id');
            $table->unsignedBigInteger('names_id');
            $table->unsignedBigInteger('signs_id');
            $table->longText('set');
            $table->longText('input1')->nullable();
            $table->longText('input2')->nullable();
            $table->longText('input3')->nullable();
            $table->longText('input4')->nullable();
            $table->unsignedInteger('work');
            $table->unsignedInteger('finance');
            $table->unsignedInteger('love');
            $table->unsignedInteger('health');
            $table->unsignedInteger('fortune');
            $table->longText('remark')->nullable();
            $table->string('status');
            $table->longText('order_number');
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

            // Foreign key relationships
            $table->foreign('customers_id')->references('id')->on('customers')->onDelete('cascade');
            $table->foreign('names_id')->references('id')->on('names')->onDelete('cascade');
            $table->foreign('signs_id')->references('id')->on('signs')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
}
