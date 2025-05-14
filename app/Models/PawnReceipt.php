<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawnReceipt extends Model
{
    use HasFactory;

    protected $fillable = [
        'pawn_item_id',
        'received_by',
        'received_at',
        'notes',
    ];

    public function pawnItem()
    {
        return $this->belongsTo(PawnItem::class);
    }

    public function receivedBy()
    {
        return $this->belongsTo(User::class, 'received_by');
    }
}
