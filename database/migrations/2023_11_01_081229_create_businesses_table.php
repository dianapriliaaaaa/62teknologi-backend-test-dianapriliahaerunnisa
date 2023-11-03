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
        Schema::create('businesses', function (Blueprint $table) {
            $table->id();
            $table->string('location')->nullable();
            $table->double('latitude')->nullable();
            $table->double('longitude')->nullable();
            $table->string('term')->nullable();
            $table->integer('radius')->nullable();
            $table->string('categories')->nullable();
            $table->string('locale')->nullable();
            $table->string('price')->nullable();
            $table->boolean('open_now')->nullable();
            $table->integer('open_at')->nullable();
            $table->string('attributes')->nullable();
            $table->string('sort_by')->nullable();
            $table->string('device_platform')->nullable();
            $table->string('reservation_date')->nullable();
            $table->string('reservation_time')->nullable();
            $table->integer('reservation_covers')->nullable();
            $table->boolean('matches_party_size_param')->nullable();
            $table->integer('limit')->nullable();
            $table->integer('offset')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business');
    }
};
