<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class VideoTranslate extends Model
{
    public $table = "video_translate";

    public function languages(){
        return $this->belongsToMany('App\Models\Language', 'video_translate_language', 'video_id',  'lang_id')->withPivot('path_caption','title','depscription', 'date_translate_end', 'price_translate', 'translator_id', 'status', 'id', 'path_caption_draft', 'path_title_depscrion', 'status_trans_title');
    }

    public function translateLanguages() {
        return $this->hasMany('App\Models\VideoTranslateLanguage', 'video_id', 'id');
    }

    public function requestTranslate()
    {
        return $this->belongsTo('App\Models\RequestTranslate', 'request_id', 'id');
    }

    public function getTranslateByLanguageId($langId)
    {
        return $this->translateLanguages()->where('lang_id', $langId)->firstOrFail();
    }

    public function isCompleted()
    {
        $videoTranComplete = $this->whereHas("translateLanguages", function($query) {
            $query->whereNotIn('status', [0, 1, 10]);
        })->count();
        $videoTran = $this->translateLanguages()->count();
        if ($videoTranComplete == $videoTran) {
            return true;
        }
        return false;
    }
}
