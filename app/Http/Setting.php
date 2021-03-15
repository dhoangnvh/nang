<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    protected $table = 'sinka_youtube_settings';

    protected $fillable = [
        'google_sheet_url',
        'google_sheet_name',
        'published_at',
        'subscribers',
        'view_count',
        'avg_view',
        'subscribers_max',
        'view_count_max',
        'avg_view_max',
        'search_conditions',
        'backend_user_id',
        'count_result',
    ];
}
