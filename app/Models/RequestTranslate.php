<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Classes\StatusRequest;

class RequestTranslate extends Model
{
    use SoftDeletes;

    public $table = "request_translate";

    protected $fillable = [
        'name', 'auto_upload', 'refresh_token', 'user_request_id', 'word_book', 'request_translate_type_id'
    ];

    public function videos(){
        return $this->hasMany('App\Models\VideoTranslate', 'request_id', 'id');
    }

    public function requests(){
        return $this->belongsTo('App\User', 'user_request_id', 'id');
    }

    public function invoice()
    {
        return $this->hasOne('App\Models\Invoice', 'request_id', 'id');
    }

    public function requestType(){
        return $this->belongsTo('App\Models\RequestTranslateType', 'request_translate_type_id', 'id');
    }

    public function translateSetting()
    {
        return $this->hasOne('App\Models\TranslateSetting', 'user_id', 'id');
    }

    public function videoLanguages()
    {
        return $this->hasManyThrough(
            'App\Models\VideoTranslateLanguage',
            'App\Models\VideoTranslate',
            'request_id', // Foreign key on VideoTranslate table...
            'video_id', // Foreign key on VideoTranslateLanguage table...
            'id', // Local key on request table...
            'id' // Local key on VideoTranslate table...
        );
    }

    public function isCompleted()
    {
        $notCompleted = $this->whereHas("videos.translateLanguages", function($query) {
            $query->whereIn('status', [0, 1, 10]);
        })->pluck('id')->toArray();
        if (in_array($this->id, $notCompleted)) {
            return false;
        }
        return true;
    }

    public function getVideoTranslateIncompleteByTranslatorId($translatorId)
    {
        $videos = $this->videos()->whereHas('translateLanguages', function($query) use ($translatorId) {
            $query->whereIn('status', [StatusRequest::FEEDBACK, StatusRequest::NEW_REQUEST, StatusRequest::DONE])
                ->where('translator_id', $translatorId);
        })->get();

        return $videos;
    }
}
