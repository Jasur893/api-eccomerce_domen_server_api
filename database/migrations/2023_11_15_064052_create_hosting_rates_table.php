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
        Schema::create('hosting_rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->bigInteger('server_id');
            $table->enum('offering', ['on', 'off'])->default('off');
            $table->enum('active', ['on', 'off'])->default('on');
            $table->enum('free', ['on', 'off'])->default('off');
            $table->text('about')->nullable();
            $table->json('price');
            $table->json('parametrs');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('hosting_rates');
    }
};
