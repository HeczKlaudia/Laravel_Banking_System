<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Crypt;

class Szamlak extends Model
{
    use HasFactory;

    protected $table = 'accounts';

    protected $fillable = [
        'nev',
        'szamlaszam',
        'egyenleg',
        'hitelkeret',
        'tipus',
        'iban',
        'user_id',
        'bank_id'
    ];
    /* 
    protected $hidden = [
        'szamlaszam',
        'egyenleg',
        'hitelkeret',
        'iban',
    ];

    protected $casts = [
        'szamlaszam' => 'encrypted',
        'egyenleg' => 'encrypted',
        'hitelkeret' => 'encrypted',
        'iban' => 'encrypted',
    ]; */

/*     public function setSzamlaszamAttr($value)
    {
        $this->attributes['szamlaszam'] = Crypt::encryptString($value);
    }

    public function setEgyenlegAttr($value)
    {
        $this->attributes['egyenleg'] = Crypt::encryptString($value);
    }

    public function setHitelkeretAttr($value)
    {
        $this->attributes['hitelkeret'] = Crypt::encryptString($value);
    }

    public function setIbanAttr($value)
    {
        $this->attributes['iban'] = Crypt::encryptString($value);
    } */
}
