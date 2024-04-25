<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class offers extends Model
{
    use HasFactory;
    protected $table = 'special_offers';
    protected $fillable = [
        'from_date',
        'to_date',
        'selected_astrologers',
    ];
}
