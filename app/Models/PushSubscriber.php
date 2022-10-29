<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PushSubscriber extends Model
{
    use HasFactory;

    protected $fillable = [
        'endpoint',
        'expirationTime',
        'p256dh',
        'authKey'
    ];
}
