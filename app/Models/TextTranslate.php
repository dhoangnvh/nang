<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TextTranslate extends Model
{
    public $table = "text_translate";

    protected $fillable = [
        'text', 'book_id'
    ];

    public function languages(){
        return $this->belongsToMany('App\Models\Language', 'text_translate_language', 'text_id', 'lang_id')->withPivot('translate');
    }
}
