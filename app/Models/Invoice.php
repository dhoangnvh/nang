<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Invoice extends Model
{
    public $table = "invoice";

    protected $fillable = [
        'request_id', 'price'
    ];
}
