<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BodyPartPostCategory extends Model
{
    protected $guarded = array('body_part_name','post_category_name');
    public static $rules = array(
        'body_part_name' => 'required',
        'post_category_name' => 'required',
        );
}
