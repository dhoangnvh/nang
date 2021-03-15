<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TranslateSetting extends Model
{
    protected $table = 'sinka_translate_setting';

    protected $fillable = ['gg_publish_key','gg_secret_key'];
}
