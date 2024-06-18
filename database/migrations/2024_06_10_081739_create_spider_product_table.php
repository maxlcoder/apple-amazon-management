<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSpiderProductTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('spider_product', function (Blueprint $table) {
            $table->id();
            $table->string('name', 60)->default('');
            $table->string('sku', 60)->default('');
            $table->string('url', 200)->default('');
            $table->decimal('min_price', 14, 2)->comment('最低价格');
            $table->tinyInteger('is_watching')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('spider_product');
    }
}
