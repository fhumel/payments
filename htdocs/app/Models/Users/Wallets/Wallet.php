<?php

namespace App\Models\Users\Wallets;

use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $table = 'wallets';

    protected $fillable = [
        'id', 'money', 'type'
    ];
}
