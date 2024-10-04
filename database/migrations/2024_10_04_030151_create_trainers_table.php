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
        Schema::create('trainers', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id');
            $table->string('mobile')->nullable()->unique();
            $table->text('image')->nullable();
            $table->string('experience')->nullable();
            $table->longText('description')->nullable();
            $table->string('expertise')->nullable();
            $table->string('availability')->nullable();
            $table->tinyInteger('active_status')->default(0)->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('trainers');
    }
};
