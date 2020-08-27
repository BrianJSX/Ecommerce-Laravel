<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class VpProduct extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('vp_product', function (Blueprint $table) {
            $table->increments('prod_id');
            $table->string('prod_name');
            $table->string('prod_slug');
            $table->integer('prod_price');
            $table->string('pro_img');
            $table->string('prod_warranty');
            $table->string('prod_accessories');
            $table->string('prod_condition');
            $table->string('prod_promotion');
            $table->tinyInteger('prod_status');
            $table->text('prod_description');
            $table->tinyInteger('prod_featured');
            $table->integer('prod_cate')->unsigned();
            $table->integer('prod_brand')->unsigned();
            $table->foreign('prod_cate')
                  ->references('id')
                  ->on('tbl_category_product')
                  ->onDelete('cascade');
            $table->foreign('prod_brand')
                  ->references('id')
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
        Schema::dropIfExists('vp_product');
    }
}
