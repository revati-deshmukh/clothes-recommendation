<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
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
            $table->string('name');
            $table->string('description');
            $table->integer('brand_id');
            $table->string('brand_name');
            $table->string('company');
            $table->binary('product_image')->nullable();
            $table->string('size');
            $table->string('color');
            $table->integer('quantity');
            $table->decimal('cost_price', $precision = 8, $scale = 2)->default(0.00);
            $table->decimal('selling_price', $precision = 8, $scale = 2)->default(0.00);
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->nullable();
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
};
