@extends('layouts.main')
@section('title', 'トレーニング編集')

@section('content')
<div class="pagetitle">
　 トレーニングの設定
</div>
<div class="formagg">
    <form class="form1 mt-4" action="{{ action('User\TrainingController@update') }}" method="post" enctype="multipart/form-data">
        <div class="traindayflex">
            <label class="traindaylabel" for="trainday">トレーニング日：</label>
            <input type="date" name="trainday" id="trainday" value="{{ $personalcontents_form->trainday }}">
        </div>    
        @if (count($errors) > 0)
            <ul>
                @foreach($errors->all() as $e)
                <li>{{ $e }}</li>
                @endforeach
            </ul>
        @endif
        <div class="pulldown">
            <div class="bui mb-4 ml-2 mt-3">    
                <p>鍛える部位：<br></p>
                <select class="parent" name="body_part_id">
                    <option value="{{ $personalcontents_form->id }}" selected="selected">
                        {{ $personalcontents_form->bodypart->name }}
                    </option>
                @foreach($bodyparts as $bodypart)
                     <option value="{{ $bodypart->id}}">{{$bodypart->name}}</option>
                @endforeach
                </select>
            </div>
            <div class="shumoku mt-4 ml-2">
                 <p>種目：<br></p>
                 <select class="children" name="post_category_id">
                     <option value="{{ $personalcontents_form->postcategory->id }}" selected="selected">
                         {{ $personalcontents_form->postcategory->name }}
                     </option>
                     @foreach($postcategories as $postcategory)
                         <option value="{{$postcategory->id}}" data-val="{{$postcategory->bodypart->id}}">
                             {{$postcategory->name}}
                         </option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="traincontents">
            <div class="setselect">
                <select class="set-select traincontents-select" name="set_data">
                    <option value="{{ $personalcontents_form->set_data }}" selected="selected">
                        {{ $personalcontents_form->set_data }}
                    </option>
                    @for ($i = 1; $i < 10; $i++)
                        <option value="{{$i}}">{{$i}}</option>
                    @endfor
                </select>
                <label for="set">set</label>
            </div>
            <div class="weight traincontents-select">
                <input class="trainweight" type="text" name="weight_data" value="{{ $personalcontents_form->weight_data }}" maxlength="6">
                <label for="kg">kg</label>
            </div> 
            <div class="traincount traincontents-select">
                <select class="count" name="count_data">
                    <option value="{{ $personalcontents_form->count_data }}" selected="selected">
                        {{ $personalcontents_form->count_data }}
                    </option>
                    @for ($i = 1; $i < 10; $i++)
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
            <input type="hidden" name="id" value="{{ $personalcontents_form->id }}">
            <div class="btn-border-gradient-wrap btn-border-gradient-wrap--gold1 btn-width">
                <button class="btn btn-border-gradient"><span class="btn-text-gradient--gold">保存</span></button>
            </div>
        </div>    
    </form>
</div>
<div class="pagetitle mt-4">
    編集履歴
</div>
<div class="col-md-4 mx-auto mt-4 pagetitle">
    <ul class="list-group">
    @if ($personalcontents_form->histories != NULL)
        @foreach ($personalcontents_form->histories as $history)
        <li class="list-group-item">{{ $history->edited_at }}</li>
        @endforeach
    @endif
    </ul>
</div>
@endsection    