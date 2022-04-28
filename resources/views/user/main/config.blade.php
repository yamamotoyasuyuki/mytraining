@extends('layouts.main')
@section('title', 'トレーニング編集')

@section('content')
   <div class="pagetitle">
　　    トレーニング種目の設定
　　</div>
　　<div class="formagg">
        <div class="form2">
            <h5 class="h5bold">鍛える部位の追加</h5>
            <form method="post" action="{{ action('User\TrainingController@bodypartpost') }}" enctype="multipart/form-data">  
                  <div class="bodypartadd-form">
                      <div>
                        <input class="bodypartadd" type="text" name="name" value="" maxlength="30">
                      </div> 
                      <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 addbtndiv">
                        <button class="btn btn-border-gradient addbutton"><span class="btn-text-gradient--gold addspan">追加</span></button>
                      </div>
                      <!--<input type="submit" class="btn btn-primary save-btn2" value="追加">-->
                      {{ csrf_field() }}
                  </div>
            </form>
            <div class="delete-list">
                <h5 class="bodypartdelete-h"><i class="bi bi-dash-circle"></i>鍛える部位の削除</h5>
                <form class="hidden" method="post" action="{{ url('home/main/bodypartdelete')}}" enctype="multipart/form-data">
                    <div class="hiddenboxform2">
                        <ul class="list">
                        @foreach($bodyparts as $bodypart)
                            <li>
                                <label class="pointer" for="{{$bodypart->id}}">
                                <input class="checkbox-space" type="checkbox" id="{{$bodypart->id}}" name="check[]" value="{{$bodypart->id}}">{{$bodypart->name}}
                                </label>    
                            </li>
                        @endforeach
                        {{ csrf_field() }}
                        </ul>
                        <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 addbtndiv deletebtn">
                                <button class="btn btn-border-gradient addbutton"><span class="btn-text-gradient--gold addspan">削除</span></button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="form3">
            <h5 class="h5bold">トレーニング種目の追加</h5>
          　<form method="post" action="{{ action('User\TrainingController@postcategorypost') }}" enctype="multipart/form-data">  
              <div class="postcategory-form">
                  <div>
                     <select class="bodypartchoice" name="body_part_id" >
                         <option value="" selected="selected">編集する部位を選択</option>
                        @foreach($bodyparts as $bodypart)
                             <option value="{{ $bodypart->id}}">{{$bodypart->name}}</option>
                        @endforeach
                     </select>
                     <input class="postocatecoryedit" type="text" name="name" value="" maxlength="80">
                  </div> 
                  <!--<input type="submit" class="btn btn-primary save-btn2" value="追加">-->
                   <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 addbtndiv">
                        <button class="btn btn-border-gradient addbutton"><span class="btn-text-gradient--gold addspan">追加</span></button>
                   </div>
                  {{ csrf_field() }}
              </div>
            </form>
            <div class="delete-list">
                <h5 class="postocatecorydelete-h"><i class="bi bi-dash-circle"></i>トレーニング種目の削除</h5>
                <form class="hidden " method="post" action="{{ url('home/main/postcategorydelete')}}" enctype="multipart/form-data">
                    <div class="hiddenboxform3">
                        <ul class="list">
                            @foreach($postcategories as $postcategory)
                                <li>
                                <label class="pointer" for="{{$postcategory->id}}">
                                <input class="checkbox-space" type="checkbox" id="{{$postcategory->id}}" name="check[]" value="{{$postcategory->id}}">{{$postcategory->name}}
                                </label>    
                                </li>
                            @endforeach
                            {{ csrf_field() }}
                        </ul>
                        <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 addbtndiv deletebtn ml-4">
                            <button class="btn btn-border-gradient addbutton"><span class="btn-text-gradient--gold addspan">削除</span></button>
                       </div>
                    </div>   
                </form>
            </div>
        </div>
    </div>
    @endsection
    