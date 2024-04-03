<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePreordersTable extends Migration
{
    public function up()
    {
        Schema::create('preorders', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('customers_id');
            $table->foreign('customers_id')->references('id')->on('customers');
            $table->string('status');
            $table->longText('number');
            $table->decimal('total', 10, 2);
            $table->string('firstname');
            $table->string('lastname');
            $table->string('email');
            $table->string('phone');
            $table->string('line')->nullable();
            $table->string('shipping_method');
            $table->longText('shipping_detail');
            $table->string('payment_method');
            $table->longText('payment_qr');
            $table->string('payment_status');
            $table->dateTime('payment_date')->nullable();
            $table->longText('ref1')->nullable();
            $table->longText('ref2')->nullable();
            $table->longText('ref3')->nullable();
            $table->string('preorder_type');
            $table->decimal('preorder_price', 10, 2);
            $table->string('firstname_th')->nullable();
            $table->string('lastname_th')->nullable();
            $table->string('firstname_en')->nullable();
            $table->string('lastname_en')->nullable();
            $table->integer('work');
            $table->integer('finance');
            $table->integer('love');
            $table->integer('health');
            $table->integer('fortune');
            $table->longText('TargetPreorder');
            $table->longText('name');
            $table->string('dob');
            $table->string('telephone');
            $table->string('SelectStatus');
            $table->string('occupation');
            $table->string('EverSignature');
            $table->longText('mysignature')->nullable();
            $table->longText('ProblemPreorder')->nullable();
            $table->string('DeliverSignature');
            $table->unsignedBigInteger('names_id')->nullable();
            $table->foreign('names_id')->references('id')->on('names');
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('preorders');
    }
}
