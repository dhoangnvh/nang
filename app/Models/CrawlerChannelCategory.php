<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CrawlerChannelCategory extends Model
{
    public $table = "crawler_channel_categories";
    public $incrementing = false;
    public $timestamps = false;
    protected $guarded = [];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category');
    }
}
