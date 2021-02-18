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
            $table->bigIncrements('id');
            $table->unsignedInteger('firm_id')->index();
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('product_measure')->nullable();
            $table->string('product_category_owner')->nullable();
            $table->string('product_category_app')->nullable();
            $table->string('product_avatar')->nullable();
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
