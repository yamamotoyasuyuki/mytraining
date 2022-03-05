<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PostContent;
use App\Models\BodyPart;
use App\Models\PostCategory;

class TrainingController extends Controller
{
    public function add()
    {
        return view('user.main.record');
    }
    public function create(Request $request)
    {
    $this->validate($request, PostContent::$rules);
    $postcontent = new PostContent;
    $form = $request->all();
    $postcontent->fill($form);
    $postcontent->save();
    return redirect('home/main');
  }
    public function summary(Request $request){
      $cond_title = $request->cond_title;
      if ($cond_title != '') {
          // 検索されたら検索結果を取得する
          $posts = PostContent::where('body_part_id', $cond_title)->get();
      } else {
          // それ以外はすべてのニュースを取得する
          $posts = PostContent::all();
      }
      $bodyparts = BodyPart::all();
      $postcategories = PostCategory::all();
      return view('user.main.record', ['posts' => $posts, 'cond_title' => $cond_title, 'bodyparts' => $bodyparts,'postcategories' => $postcategories]);
  }
    public function top(){
        return view('user.top.index');
    }
}