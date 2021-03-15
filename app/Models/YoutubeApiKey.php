<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class YoutubeApiKey extends Model
{
    public $table = "sinka_youtube_api_key";

    protected $fillable = [
        'channel_id', 'youtube_api_key', 'youtube_api_key_2', 'youtube_api_key_3', 'youtube_api_key_4', 'youtube_api_key_5', 'disable_key'
    ];
}
