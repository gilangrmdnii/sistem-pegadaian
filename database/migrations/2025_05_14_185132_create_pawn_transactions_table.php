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
    Schema::create('pawn_transactions', function (Blueprint $table) {
        $table->id();
        $table->foreignId('customer_id')->constrained()->onDelete('cascade');
        $table->foreignId('pawn_item_id')->constrained()->onDelete('cascade');
        $table->date('transaction_date');
        $table->decimal('loan_amount', 12, 2);
        $table->decimal('interest_rate', 5, 2);
        $table->date('due_date');
        $table->string('status')->default('active'); 
        $table->timestamps();
    });
}

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pawn_transactions');
    }
};
