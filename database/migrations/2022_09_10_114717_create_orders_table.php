<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->foreignId('customer_id')->constrained();
            $table->string('order_id')->unique();
            $table->foreignId('product_id')->constrained();
            $table->integer('quantity');
            $table->float('total',8,2);
            $table->string('payment_type');
            $table->enum('payment_status',['unpaid','paid','refunded'])->default('unpaid');
            $table->enum('status' , ['pending','shipped','completed','cancelled'])->default('pending');
            $table->timestamps();
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
};
