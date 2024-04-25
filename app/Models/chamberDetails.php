<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class chamberDetails extends Model
{
    use HasFactory;

    public function chamber()
    {
        return $this->belongsTo(Chamber::class);
    }
}
