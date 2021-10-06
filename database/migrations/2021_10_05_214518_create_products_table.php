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
            $table->increments("id");
            $table->string("name");
            $table->string("inlet");
            $table->string("outlet");

            $table->string("angle_in_deg");
            $table->string("material");
            $table->string("bar");
            $table->string("colour");

            $table->integer("status");
            $table->string("url_key");
            $table->integer("visibility");
            $table->string("clearance");
            $table->string("max_temp");

            $table->longText("description");
            $table->longText("short_description");

            $table->longText("tech_spec_1");
            $table->string("is_featured");
            $table->string("featured_position");
            $table->integer("priority");

            $table->string("price");
            $table->string("special_price");
            $table->integer("stock_status");
            $table->json("categories");
            $table->json("related_products");

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
