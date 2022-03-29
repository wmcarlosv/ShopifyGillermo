<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProductsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->string('title',255)->nullable();
            $table->string('sku',100)->nullable();
            $table->text('description')->nullable();
            $table->string('store',100)->nullable();
            $table->text('image')->nullable();
            $table->text('labels')->nullable();
            $table->string('status',255)->nullable();
            $table->float('price')->nullable();
            $table->string('shopify_product_id',255)->nullable();
            $table->string('variant_id',255)->nullable();
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
        Schema::dropIfExists('products');
    }
}
