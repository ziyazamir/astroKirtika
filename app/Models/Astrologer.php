<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
class Astrologer extends Model
{
    use HasFactory;
    use Notifiable;
    public function notifications()
    {
        return $this->hasMany(Notification::class);
    }
    // public function membership()
    // {
    //     return $this->hasOne(Membership::class,'id','membership_id');
    // }
    protected $hidden = [
        'user_id',
    ];
}
