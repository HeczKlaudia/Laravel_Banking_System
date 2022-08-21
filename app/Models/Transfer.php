<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Transfer extends Model
{
    use HasFactory;

    protected $table = "transactions";

    protected $fillable = [
        'sender_id',
        'sender_first_name',
        'sender_last_name',
        'sender_account_id',

        'receiver_first_name',
        'receiver_last_name',
        'receiver_account',
        'receiver_id',
        'amount',
        'text'
    ];
}
