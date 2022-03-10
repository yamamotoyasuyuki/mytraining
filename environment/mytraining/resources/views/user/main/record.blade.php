@extends('layouts.main')
@section('title', 'トレーニング作成')

@section('content')
　　<div class="formagg">
    <form class="form1" method="post" action="{{ url('home/post') }}" enctype="multipart/form-data">
        <div class="pulldown">
            <div class="bui">    
                <p>鍛える部位：<br></p>
                <select class="parent" name="bodypart_name" >
                    <option value="" selected="selected">鍛える部位を選択</option>
                @foreach($bodyparts as $bodypart)
                     <option value="{{ $bodypart->id}}">{{$bodypart->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="shumoku">
                 <p>種目：<br></p>
                 <select class="children" name="training_name" disabled>
                         <option value="" selected="selected">種目を選択</option>
                         <option value="ベンチプレス" data-val="1">ベンチプレス</option>
                         <option value="ペックフライ" data-val="1">ペックフライ</option>
                         <option value="コンバージング・チェスト・プレス" data-val="1">コンバージング・チェスト・プレス</option>
                         <option value="インクラインスミスマシン" data-val="1">インクラインスミスマシン</option>
                         <option value="バーベル・カール" data-val="2">バーベル・カール</option>
                         <option value="ダンベル・カール" data-val="2">ダンベル・カール</option>
                         <option value="ハンマーカール" data-val="2">ハンマーカール</option>
                         <option value="クランチ" data-val="3">クランチ</option>
                         <option value="シットアップ" data-val="3">シットアップ</option>
                         <option value="スクワット" data-val="4">スクワット</option>
                         <option value="レッグ・プレス" data-val="4">レッグ・プレス</option>
                    {{--@foreach($postcategories as $postcategory)
                         {{--<option value="{{$postcategory->id}}"　data-val="{{$postcategory->bodyparts->id}}">-->
                             <!--{{$postcategory->name}}</option>--}}
                             {{--<option value="{{$postcategory->name}}" data-val="{{$postcategory->id}}">{{$postcategory->name}}</option>
                    @endforeach--}}
                </select>
            </div>
        </div>
        <div class="traincontents" id="input_plural">
            <div class="setselect">
                <p>セット</p>
                <select class="set" name="set_data">
                    @for ($i = 0; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label for="set">set</label>
            </div>
            <div class="weight">
                <p>重さ</p>
                <input class="trainweight" type="text" name="weight_data" value="" maxlength="6">
                <label for="kg">kg</label>
            </div> 
            <div class="traincount">
                <p>回数</p>
                <select class="count" name="count_data">
                    @for ($i = 0; $i < 10; $i++)
                    <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label for="回">回</label>
            </div>
            <!--<input type="button" value="－" class="del pluralBtn">-->
            <i type="button" class="bi bi-plus-circle add"></i>
            <i type="button" class="bi bi-dash-circle del"></i>
            </div>
            <!--<input type="button" value="＋" class="add pluralBtn">-->
            
        
        <div class="cloned1"></div>
        {{ csrf_field() }}
        <input type="submit" class="btn btn-primary save-btn" value="保存">
    </form>
    <div class="cloned"></div>
    <form class="form2">
        <!--<input type="button" value="＋" class="pluralBtn addbtn">-->
        <i type="button" class="bi bi-plus-circle addbtn"></i>
        <!--<input type="button" value="－" class="pluralBtn dele">-->
        <i type="button" class="bi bi-dash-circle dele"></i>
    </form>
    </div>
    @endsection
    