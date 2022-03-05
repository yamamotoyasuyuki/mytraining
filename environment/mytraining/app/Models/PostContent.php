<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PostContent extends Model
{
    protected $guarded = array('id');
    public static $rules = array(
        'body_part_id' => 'required',
        'post_category_id' => 'required',
        );
}
