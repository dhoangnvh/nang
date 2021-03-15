<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    public $table = "access_log";

    protected $fillable = [
        'user_id', 'ip_address',
    ];
}
