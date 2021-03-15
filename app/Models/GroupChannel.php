<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupChannel extends Model
{
    public $table = "group_channel";

    protected $fillable = [
        'crawler_channel_id',
        'category_channel_id',
    ];

    public function channel_crawler()
    {
        return $this->belongsTo('App\Model\ChannelCrawler', 'crawler_channel_id');
    }

    public function channel_crawler_data()
    {
        return $this->belongsTo('App\Model\ChannelCrawlerData', 'crawler_channel_id');
    }
}
