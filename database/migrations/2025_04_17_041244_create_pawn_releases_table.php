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
        Schema::create('pawn_releases', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pawn_item_id')->constrained();
            $table->foreignId('released_by')->constrained('users');
            $table->timestamp('released_at');
            $table->string('receiver_name');
            $table->string('receiver_address');
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pawn_releases');
    }
};
