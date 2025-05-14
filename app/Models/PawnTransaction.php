<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PawnTransaction extends Model
{
    use HasFactory;

    protected $fillable = [
        'customer_id',
        'pawn_item_id',
        'transaction_date',
        'loan_amount',
        'interest_rate',
        'due_date',
        'status',
    ];

    public function customer()
    {
        return $this->belongsTo(Customer::class);
    }

    public function pawnItem()
    {
        return $this->belongsTo(PawnItem::class);
    }

    public function payments()
    {
        return $this->hasMany(PawnPayment::class);
    }

    public function getStatusLabelAttribute()
    {
        $totalPaid = $this->payments()->sum('amount_paid');
        $totalDue = $this->loan_amount + ($this->loan_amount * $this->interest_rate / 100);

        if ($totalPaid >= $totalDue) {
            return 'Lunas';
        }

        if (now()->gt($this->due_date)) {
            return 'Jatuh Tempo';
        }

        return 'Belum Lunas';
    }
}
