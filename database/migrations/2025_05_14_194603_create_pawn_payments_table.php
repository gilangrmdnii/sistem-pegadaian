<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePawnPaymentsTable extends Migration
{
    public function up()
    {
        Schema::create('pawn_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('pawn_transaction_id')->constrained()->onDelete('cascade');
            $table->date('payment_date');
            $table->decimal('amount_paid', 12, 2);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('pawn_payments');
    }
}
