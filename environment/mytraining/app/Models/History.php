<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class History extends Model
{
protected $guarded = array('id');

    public static $rules = array(
        'personal_contents_id' => 'required',
        'edited_at' => 'required',
    );
}
