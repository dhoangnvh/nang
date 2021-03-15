<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    public $table = "sinka_youtube_channel";

    public function hasUpdateDaily()
    {
        $after = $date2=date_create(date('Y-m-d'));
        $before = date_create(date('Y-m-d', strtotime($this->created_at)));
        $diff = date_diff($before, $after)->format("%a");
        if ($diff < 2) return true;
        return false;
    }

    public function videos()
    {
        return $this->hasMany('App\Models\Video', 'channel_id', 'id');
    }

    public function apiKeys()
    {
        return $this->hasOne('App\Models\YoutubeApiKey','channel_id', 'id');
    }
}
