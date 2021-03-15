<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageLanguage extends Model
{
    public $table = "sinka_package_language";

    public function package()
    {
        return $this->belongsTo('App\Models\PackageSetting', 'package_id', 'id');
    }
}
