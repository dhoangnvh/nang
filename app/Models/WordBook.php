<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WordBook extends Model
{
    public $table = "word_book";

    protected $fillable = [
        'name',
        'user_id',
        'status',
    ];

    public function textTranslates(){
        return $this->hasMany('App\Models\TextTranslate', 'book_id', 'id');
    }
}
