<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $table = "category";

    protected $fillable = [
        'category_name',
        'parent_id',
    ];
}