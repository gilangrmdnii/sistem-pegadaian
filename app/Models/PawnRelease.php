<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PawnRelease extends Model
{
    use HasFactory;

    public function pawnItem()
    {
        return $this->belongsTo(PawnItem::class);
    }

    public function releasedBy()
    {
        return $this->belongsTo(User::class, 'released_by');
    }
}
