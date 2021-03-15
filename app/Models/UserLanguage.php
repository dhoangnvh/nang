<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserLanguage extends Model
{
    public $table = "user_language";

    protected $fillable = [
        'language_id', 'user_id'
    ];
}
