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
            $table->string('customer',255)->nullable();
            $table->string('phone',100)->nullable();
            $table->text('tags')->nullable();
            $table->text('address')->nullable();
            $table->text('shipping_address')->nullable();
            $table->string('product_sku',255)->nullable();
            $table->integer('qty')->nullable();
            $table->string('product_name',255)->nullable();
            $table->float('discount')->nullable();
            $table->float('parcial_total')->nullable();
            $table->float('total')->nullable();
            $table->string('payment_status')->nullable();
            $table->text('order_status')->nullable();
            $table->string('order_no',255)->nullable();
            $table->datetime('order_date')->nullable();
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
