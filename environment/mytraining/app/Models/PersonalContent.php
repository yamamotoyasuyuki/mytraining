<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PersonalContent extends Model
{
   protected $guarded = array('id');
   public static $rules = [
                            'bodypart_name' =>'required',
                            'training_name' =>'required',
                            'set_data' =>'required',
                            'weight_data' =>'required',
                            'count_data' =>'required',];
public function lendings()
{
  return $this->hasMany('App\Models\BodyPart');
}
}