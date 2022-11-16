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
            $table->integer('product_id')->autoIncrement();
            $table->string('product_name', 50);
            $table->tinyInteger('category_id')->unsigned()->nullable();
            $table->tinyInteger('brand_id')->unsigned()->nullable();
            $table->text('product_image');
            $table->integer('product_price_buy');
            $table->integer('product_price_sell');
            $table->integer('product_amount');
            $table->integer('product_sale');
            $table->text('product_attribute');
            $table->text('product_detail');
            $table->text('product_keyword');
            $table->text('product_description');
            $table->foreign('category_id')->references('category_id')->on('categorys')->onDelete('set null');
            $table->foreign('brand_id')->references('brand_id')->on('brands')->onDelete('set null');
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
