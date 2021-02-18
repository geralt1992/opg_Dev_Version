<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateReviewesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reviews', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedInteger('user_id')->index();
            $table->unsignedInteger('firm_id')->index();
            $table->string('title')->nullable();
            $table->string('review_content')->nullable();
            $table->string('service_rating')->nullable();
            $table->string('price_rating')->nullable();
            $table->string('quality_rating')->nullable();
            $table->string('overall_rating')->nullable();
            $table->string('redommendation')->nullable();
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
        Schema::dropIfExists('reviews');
    }
}
