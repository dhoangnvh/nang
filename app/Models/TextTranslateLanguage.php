<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextTranslateLanguage extends Model
{
    public $table = "text_translate_book";

    protected $fillable = [
        'text_id',
        'lang_id',
        'translate'
    ];
}
