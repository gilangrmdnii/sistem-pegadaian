<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawnItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'item_name',
        'tracking_code',
        'description',
        'status',
    ];

    public function transactions()
    {
        return $this->hasMany(PawnTransaction::class);
    }

    // Relasi ke receipt jika perlu
    public function receipt()
    {
        return $this->hasOne(PawnReceipt::class);
    }
}

