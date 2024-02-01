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
        Schema::create('hosting_servers', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->enum('hidden', ['on', 'off'])->default('on');
            $table->enum('active', ['on', 'off'])->default('on');
            $table->string('ip');
            $table->string('login');
            $table->string('password');
            $table->json('info');
            $table->string('picture');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosting_servers');
    }
};
