<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Common\CallendarController;
use App\Http\Controllers\Common\GraphController;
use App\Models\PersonalContent;
use App\Models\BodyPart;
use App\Models\PostCategory;
use App\Models\History;
use Carbon\Carbon;


class TrainingController extends Controller
{
    public function top()
    {
      return view('user.top.index');
    }
    
    public function home(Request $request)
    {
      //ホーム画面の表示
      $callendercontroller = new CallendarController;
      $params = $callendercontroller->callendar();
      if($request->post_category_id){
          $personalcontents = PersonalContent::where('user_id',Auth::id())->where('post_category_id', $request->post_category_id)->get();
      }else{
          $personalcontents = array();
      }
      $postcategories = PostCategory::where('user_id',Auth::id())->get();
      $targetPostCategory = PostCategory::where('id',$request->post_category_id)->first();
      return view('home',
      ['weeks'=> $params["weeks"],'prev'=> $params["prev"],
      'html_title'=> $params["html_title"],'next'=> $params["next"],'personalcontents'=>$personalcontents,
      'postcategories' => $postcategories,'targetPostCategory' => $targetPostCategory]);
    }
    
    public function summary(Request $request)
    {
      //トレーニング登録画面の表示
      $bodyparts = BodyPart::where('user_id',Auth::id())->get();
      $postcategories = PostCategory::where('user_id',Auth::id())->get();
      return view('user.main.record', ['bodyparts' => $bodyparts,'postcategories' => $postcategories]);
    }
    
    public function post(Request $request)
    {
      //トレーニング実施項目の保存  
      $this->validate($request, PersonalContent::$rules);
      $personalcontent = new PersonalContent();
      $form = $request->all();
      unset($form['_token']);
      $personalcontent->user_id = Auth::id();
      $personalcontent->fill($form)->save();
      return redirect('home/main/achievement');
    }
    
    public function config(Request $riquesut)
    {
      // トレーニング種目編集画面の表示
      $bodyparts = BodyPart::where('user_id',Auth::id())->get();
      $postcategories = PostCategory::where('user_id',Auth::id())->get();
      return view('user.main.config', ['bodyparts' => $bodyparts,'postcategories' => $postcategories]);
    }
    
    public function bodypartpost(Request $request) 
    {
      //トレーニング実施項目登録時の鍛える部位の追加
      $bodypart = new BodyPart();
      $bodypart->name = $request->name;
      $bodypart->user_id = Auth::id();
      $bodypart->save();
      return redirect()->back();
    }
    public function bodypartdelete(Request $request)
    {
      //トレーニング実施項目登録時の鍛える部位の削除
      BodyPart::destroy($request->check);
      return redirect()->back();
    }
    public function postcategorypost(Request $request)
    {
      //トレーニング実施項目登録時のトレーニング種目の編集
      $postcategory = new PostCategory();
      $postcategory->name = $request->name;
      $postcategory->user_id = Auth::id();
      $postcategory->body_part_id = $request->body_part_id;
      $postcategory->save();
      return redirect()->back();
    }
    public function postcategorydelete(Request $request)
    {
      //トレーニング実施項目登録時のトレーニング種目の削除
      PostCategory::destroy($request->check);
      return redirect()->back();
    }
        
    public function show(Request $request)
    {
      //トレーニング実績の表示
     $callendercontoller = new CallendarController;
     $params = $callendercontoller->callendar();
     $traindayview = $request->traindayview;
     if ($traindayview != ''){
        // 検索されたら検索結果を取得する
        $traincontents = PersonalContent::where('trainday', $traindayview)->get();
     }else{
        $traincontents = PersonalContent::where('user_id',Auth::id())->get();
     }
     
      return view('user.main.achievement', ['traincontents'=>$traincontents,
      'weeks'=> $params["weeks"],'prev'=> $params["prev"],
      'html_title'=> $params["html_title"],'next'=> $params["next"]]);
    }
  
    public function edit(Request $request)
    {
      //トレーニング登録実績の編集画面
      $personalcontents = PersonalContent::find($request->id);
      $bodyparts = BodyPart::where('user_id',Auth::id())->get();
      $postcategories = PostCategory::where('user_id',Auth::id())->get();
      // dd($postcategories);
      return view('user.main.edit', ['bodyparts' => $bodyparts,'postcategories' => $postcategories,'personalcontents_form' => $personalcontents]);
    }

    public function update(Request $request)
    {
      //トレーニング登録実績の編集保存
      $this->validate($request, PersonalContent::$rules);
      $personalcontents = PersonalContent::find($request->id);
      $personalcontents_form = $request->all();
      unset($personalcontents_form['remove']);
      unset($personalcontents_form['_token']);
      $personalcontents->fill($personalcontents_form)->update();
      $history = new History();
      $history->personal_content_id = $personalcontents->id;
      $history->edited_at = Carbon::now();
      $history->save();
      return redirect('home/main/achievement');
    }
    
    public function delete(Request $request)
    {
      //トレーニング登録実績の削除
      $personalcontents = PersonalContent::find($request->id);
      $personalcontents->delete();
      return redirect()->back();
    }
}