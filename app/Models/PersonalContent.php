<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalContent extends Model
{
  protected $guarded = array('id');
  public static $rules = [  'body_part_id' =>'required',
                            'post_category_id' =>'required',
                            'set_data' =>'required',
                            'weight_data' => ['required', 'integer', 'between:1,1000'],
                            'count_data' =>'required',
                            ];

    public function histories()
    {
        return $this->hasMany('App\Models\History');

    }
    
    public function bodypart()
    {
        return $this->belongsTo('App\Models\BodyPart','body_part_id')->withTrashed();

    }
    public function postcategory()
    {
        return $this->belongsTo('App\Models\PostCategory','post_category_id')->withTrashed();

    }
}