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
            $table->string('order_no',255)->nullable();
            $table->datetime('order_date')->nullable();
            $table->string('currency',255)->nullable();
            $table->string('status',100)->nullable();
            $table->string('customer',255)->nullable();
            $table->string('phone',100)->nullable();
            $table->string('country',100)->nullable();
            $table->string('province',100)->nullable();
            $table->string('city',100)->nullable();
            $table->text('address')->nullable();
            $table->string('product_name',255)->nullable();
            $table->float('price')->nullable();
            $table->integer('qty')->nullable();
            $table->string('store',255)->nullable();
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
}
