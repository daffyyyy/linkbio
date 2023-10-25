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
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained()->cascadeOnDelete();
            $table->integer('position')->unsigned()->default(1);
            $table->string('title', 32)->required();
            $table->string('description', length: 64)->nullable();
            $table->string('url', 255)->nullable();
            $table->string('icon', 32)->nullable();
            $table->boolean('visible')->default(false);
            $table->bigInteger('clicks')->unsigned()->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('links');
    }
};
