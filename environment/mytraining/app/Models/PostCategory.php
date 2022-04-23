<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BodyPart;
use Illuminate\Database\Eloquent\SoftDeletes;

class PostCategory extends Model
{
    use SoftDeletes;
    public function bodypart()
    {
       return $this->belongsTo('App\Models\BodyPart','body_part_id');
    }
    protected $dates = ['deleted_at'];
}
