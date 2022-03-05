<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\PostCategory;

class BodyPart extends Model
{
    public function postcategory()
    {
       return $this->belongs('App\Models\PostCategory');
    }
}
