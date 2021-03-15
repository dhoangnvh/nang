<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextTranslateBook extends Model
{
    public $table = "text_translate_book";

    protected $fillable = [
        'text_id',
        'book_id'
    ];
}
