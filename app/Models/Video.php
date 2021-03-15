<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    public $table = "sinka_youtube_video";

    public function sns_share()
    {
        return $this->hasOne('App\Models\SnsShareVideo', 'video_id', 'id');
    }

    public function data_daily()
    {
        return $this->hasMany('App\Models\DataVideo', 'video_id', 'id');
    }

    public function thumbnail_title()
    {
        return $this->hasMany('App\Models\ThumbnailTitle', 'video_id', 'id');
    }

    public function view_schedule()
    {
        return $this->hasMany('App\Models\DataTimeSchedule', 'video_id', 'id');
    }

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language', 'sinka_youtube_video_language', 'video_id', 'language_id')->withPivot('title', 'description', 'path_caption', 'modified_at', 'path_caption_draft', 'video_youtube_id', 'status');
    }

    public function hasUpdateDaily()
    {
        $after = date_create(date('Y-m-d'));
        $before = date_create(date('Y-m-d', strtotime($this->created_at)));
        $diff = date_diff($before, $after)->format("%a");
        if ($diff < 2) return false;
        return true;
    }

    public function hasPendingData()
    {
        $after = date_create(date('Y-m-d'));
        $before = date_create(date('Y-m-d', strtotime($this->created_at)));
        $diff = date_diff($before, $after)->format("%a");
        if ($diff < 3) return true;
        return false;
    }

}
