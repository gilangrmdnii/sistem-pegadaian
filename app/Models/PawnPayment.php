<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawnPayment extends Model
{
    use HasFactory;

    protected $fillable = [
        'pawn_transaction_id',
        'payment_date',
        'amount_paid',
    ];

    protected $casts = [
        'payment_date' => 'date',
    ];

    /**
     * Relasi ke Transaksi Gadai
     */
    public function pawnTransaction()
    {
        return $this->belongsTo(PawnTransaction::class);
    }
}
