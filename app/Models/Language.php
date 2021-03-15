<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function users(){
        return $this->belongsToMany('App\User', 'user_language', 'language_id',  'user_id');
    }

    public function languages(){
        return $this->belongsToMany('App\Models\TextTranslate', 'text_translate_language', 'lang_id',  'text_id')->withPivot('translate');
    }

    public function videoTranslateLanguage(){
        return $this->belongsToMany('App\Models\VideoTranslate', 'video_translate_language', 'lang_id',  'video_id')->withPivot('path_caption','title','depscription', 'date_translate_end', 'price_translate', 'translator_id', 'status', 'id');
    }
    public function settings()
    {
        return $this->belongsToMany('App\Models\PackageSetting', 'sinka_package_language', 'language_id', 'package_id');
    }
}
