<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;
use Illuminate\Database\Eloquent\SoftDeletes;

class BodyPart extends Model
{
    use SoftDeletes;
    public function postcategory()
    {
       return $this->hasMany('App\Models\PostCategory','id');
    }
    protected $dates = ['deleted_at'];
}
