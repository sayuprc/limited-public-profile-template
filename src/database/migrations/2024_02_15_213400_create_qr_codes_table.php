<?php

declare(strict_types=1);

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class () extends Migration {
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('qr_codes', function (Blueprint $table) {
            $table->string('qr_code_id', 36);
            $table->string('user_id', 36);
            $table->string('token', 512);
            $table->string('hash', 64);
            $table->dateTime('expired_at');
            $table->timestamps();

            $table->primary('qr_code_id');
            $table->unique(['qr_code_id', 'user_id']);
            $table->foreign('user_id')->references('user_id')->on('users')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('qr_codes');
    }
};
