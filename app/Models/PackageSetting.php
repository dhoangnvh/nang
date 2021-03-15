<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PackageSetting extends Model
{
    public $table = "sinka_package_setting";

    public function languages()
    {
        return $this->belongsToMany('App\Models\Language', 'sinka_package_language', 'package_id', 'language_id')->withPivot('price');
    }

    public function packagelanguages()
    {
        return $this->hasMany('App\Models\PackageLanguage', 'package_id', 'id');
    }
}
