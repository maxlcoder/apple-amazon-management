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
        Schema::create('admin_apple_request_param', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('admin_id')->default(0)->comment('管理员 ID');
            $table->string('domain', 30)->default('')->comment('域名');
            $table->string('cookies', 2000)->default('[]');
            $table->string('headers', 2000)->default('[]');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_apple_request_param');
    }
};
