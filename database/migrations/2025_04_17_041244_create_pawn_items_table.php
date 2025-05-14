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
        Schema::create('pawn_items', function (Blueprint $table) {
            $table->id();
            $table->string('item_name');
            $table->string('tracking_code')->unique();
            $table->enum('status', ['active', 'completed', 'expired'])->default('active');
            $table->text('description')->nullable();
            $table->timestamps();
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pawn_items');
    }
};
