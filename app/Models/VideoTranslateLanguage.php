<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTranslateLanguage extends Model
{
    public $table = "video_translate_language";

    protected $fillable = [
        'video_id', 'lang_id', 'translator_id', 'title', 'depscription', 'path_caption', 'price_translate', 'date_translate_end', 'status'
    ];

    public function users() {
        return $this->belongsTo('App\User', 'translator_id', 'id');
    }

    public function videoTranslate()
    {
        return $this->belongsTo('App\Models\VideoTranslate', 'video_id', 'id');
    }

    public function language()
    {
        return $this->belongsTo('App\Models\Language', 'lang_id', 'id');
    }
}
