<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlerChannel extends Model
{
    public $table = "crawler_channel";

    public function dataDaily()
    {
        return $this->hasMany('App\Models\CrawlerChannelData', 'crawler_channel_id', 'id');
    }

    public function categories()
    {
        return $this->hasMany('App\Models\CrawlerChannelCategory', 'channel_youtube_id', 'youtube_channel_id');
    }
}
