<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class GroupChannelCategory extends Model
{
    public $table = "group_channel_category";

    protected $fillable = [
        'category_name', 'user_id'
    ];

    public function group_channel()
    {
        return $this->hasMany('App\Models\GroupChannel', 'category_channel_id', 'id');
    }
}
