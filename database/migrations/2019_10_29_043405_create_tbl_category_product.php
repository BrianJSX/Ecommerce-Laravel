<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTblCategoryProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tbl_category_product', function (Blueprint $table) {
            $table->Increments('category_id');
            $table->string('category_name')->unique();
            $table->string('category_slug')->unique();
            $table->text('category_desc');
            $table->integer('category_status');
            $table->interger('category_brand')->unsigned();

            $table->foreign('category_brand')
                    ->references('brand_id')
                    ->on('tbl_brand')
                    ->onDelete('cascade');

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
        Schema::dropIfExists('tbl_category_product');
    }
}
