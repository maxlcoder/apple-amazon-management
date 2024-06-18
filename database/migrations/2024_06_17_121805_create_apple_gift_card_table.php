<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('apple_gift_card', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->default(0)->comment('管理员 ID');
            $table->string('gift_card_number', 30)->default('')->unique()->comment('卡号');
            $table->string('currency', 10)->default('')->comment('货币');
            $table->decimal('balance', 10, 2)->default(0)->comment('金额');
            $table->tinyInteger('is_checked')->default(0)->comment('是否已查询');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('apple_gift_card');
    }
};
