@extends('layouts.main')
@section('title', 'トレーニング作成')

@section('content')
    <div class="pagetitle">
　　    トレーニングの設定
　　</div>
　　<div class="formagg">
        <form class="form1" method="post" action="{{ url('home/post') }}" enctype="multipart/form-data">
            <div class="traindayflex">
                <label class="traindaylabel" for="trainday">トレーニング日：</label>
                <input type="date" name="trainday" id="trainday" value="<?php echo date('Y-m-d'); ?>">
            </div>
        　　@if (count($errors) > 0)
                <ul>
                    @foreach($errors->all() as $e)
                    <li>{{ $e }}</li>
                    @endforeach
                </ul>
       　 　 @endif
            <div class="pulldown">
                <div class="bui mb-4 ml-2">    
                    <p>鍛える部位：<br></p>
                    <select name="body_part_id" class="parent" required>
                      <option value="" selected="selected">鍛える部位を選択</option>
                    　@foreach($bodyparts->unique('name') as $bodypart)
                            <option value="{{ $bodypart->id}}">{{$bodypart->name}}</option>
                    　@endforeach
                    </select>
                </div>
                <div class="shumoku mt-4 ml-2">
                     <p>種目：<br></p>
                     <select class="children" name="post_category_id" disabled>
                       <option value="" selected="selected">種目を選択</option>
                       @foreach($postcategories as $postcategory)
                            @if (!empty($postcategory->bodypart))
                            <option value="{{$postcategory->id}}" data-val="{{$postcategory->bodypart->id}}">{{$postcategory->name}}</option>
                            @endif
                       @endforeach
                    </select>
                </div>
            </div>
            <div class="traincontents">
                <div class="setselect">
                    <select class="set-select traincontents-select" name="set_data">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{$i}}">{{$i}}</option>
                        @endfor
                    </select>
                    <label for="set">set</label>
                </div>
                <div class="weight traincontents-select">
                    <input class="trainweight" type="text" name="weight_data" value="" maxlength="6">
                    <label for="kg">kg</label>
                </div> 
                <div class="traincount traincontents-select">
                    <select class="count" name="count_data">
                        @for ($i = 1; $i <= 10; $i++)
                            <option value="{{$i}}">
                                {{$i}}
                            </option>
                        @endfor
                    </select>
                    <label for="回">回</label>
                </div>
            </div>
                
            {{ csrf_field() }}
            <div class="btnposition">
                <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 btn-width">
                    <button class="btn btn-border-gradient"><span class="btn-text-gradient--gold">登録</span></button>
                </div>
            </div>    
        </form>
    </div>
@endsection
    