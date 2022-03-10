<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\BodyPart;


class PostCategory extends Model
{
    public function bodyparts()
    {
       return $this->hasMany('App\Models\BodyPart');
    }
}
