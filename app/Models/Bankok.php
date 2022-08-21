<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bankok extends Model
{
    use HasFactory;

    protected $table = 'banks';

    protected $fillable = [
        'nev',
        'szamlaszam',
        'ugyfelAzon',
        'egyenleg',
    ];
}
