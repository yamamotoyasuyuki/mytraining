<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalContent;
use App\Models\BodyPart;
use App\Models\PostCategory;

class TrainingController extends Controller
{
    public function add()
    {
        return view('user.main.record');
    }
    public function post(Request $request) {

        $personalcontent = new PersonalContent();
        $personalcontent->bodypart_name = $request->bodypart_name;
        $personalcontent->training_name = $request->training_name;
        $personalcontent->set_data = $request->set_data;
        $personalcontent->weight_data = $request->weight_data;
        $personalcontent->count_data = $request->count_data;
        $personalcontent->save();

        return redirect()->back();
    }
    public function summary(Request $request){
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = PersonalContent::where('body_part_id', $cond_title)->get();
      } else {
          $posts = PersonalContent::all();
      }
      $bodyparts = BodyPart::all();
      $postcategories = PostCategory::all();
        return view('user.main.record', ['posts' => $posts, 
                                         'cond_title' => $cond_title,
                                         'bodyparts' => $bodyparts,
                                         'postcategories' => $postcategories]);
  }
    public function show(Request $request){
      $bodyparts = BodyPart::find($request->body_part_id);
      $postcategory = $bodypart ->postcategories;
       return view('user.main.record',['postcategory' =>$postcategory]);
    }
    public function top(){
        return view('user.top.index');
    }
}