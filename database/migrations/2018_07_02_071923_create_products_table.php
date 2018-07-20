<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

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
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->char('code', 8)->unique();
            $table->string('name')->index();
            $table->text('description');
            $table->float('price');
            $table->integer('quantity_on_hand');
            $table->string('img_default')->nullable();
            $table->boolean('best_seller')->default(0);
            $table->boolean('new_arrival')->default(0);
            $table->boolean('best_deal')->default(0);
            $table->unsignedInteger('category_id')->nullable(); //change back to not null
            $table->foreign('category_id')->references('id')->on('categories');
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
