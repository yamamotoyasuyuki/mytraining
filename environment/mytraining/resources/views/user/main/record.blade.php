@extends('layouts.main')
@section('title', 'トレーニング作成')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 mx-auto">
                <h3>トレーニングメニュー作成</h3>
                <form action="{{ action('User\TrainingController@create') }}" method="post" enctype="multipart/form-data">
                    @if (count($errors) > 0)
                        <ul>
                            @foreach($errors->all() as $e)
                                <li>{{ $e }}</li>
                            @endforeach
                        </ul>
                    @endif
                    <div class="form-group row">
                        <label class="col-md-2" for="body_part_id">部位</label>
                        <div class="col-md-10">
                            <input type="text" class="form-control" name="body_part_id" value="{{ old('body_part_id') }}">
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-md-2" for="post_category_id">種目</label>
                        <div class="col-md-10">
                            <input type="text"  class="form-control" name="post_category_id" value="{{ old('post_category_id') }}">
                        </div>
                    </div>
                    {{ csrf_field() }}
                    <input type="submit" class="btn btn-primary" value="更新">
                </form>
            </div>
        </div>
    </div>
    
    <!--投稿ページを表示させるため追記-->
    <div class="container">
        <div class="row">
            <h2>トレーニング一覧</h2>
        </div>
        <div class="row">
            <div class="col-md-8">
                <form action="{{ action('User\TrainingController@summary') }}" method="get">
                    <div class="form-group row">
                        <label class="col-md-2">部位</label>
                        <div class="col-md-8">
                            <input type="text" class="form-control" name="cond_title" value="{{ $cond_title }}">
                        </div>
                        <div class="col-md-2">
                            {{ csrf_field() }}
                            <input type="submit" class="btn btn-primary" value="検索">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="list-news col-md-12 mx-auto">
                <div class="row">
                    <table class="table table-dark">
                        <thead>
                            <tr>
                                <th width="10%">ID</th>
                                <th width="20%">タイトル</th>
                                <th width="50%">本文</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($posts as $postcontent)
                                <tr>
                                    <th>{{ $postcontent->id }}</th>
                                    <td>{{ \Str::limit($postcontent->body_part_id, 100) }}</td>
                                    <td>{{ \Str::limit($postcontent->post_category_id, 250) }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <p>鍛える部位：<br>
    <select name="bodyparts">
        <option value="" selected="selected">鍛える部位を選択</option>
    @foreach($bodyparts as $bodypart)
         <option value="{{ $bodypart->id}}">{{$bodypart->name}}</option>
    @endforeach
    </select>
   {{-- <p>種目：<br>
     <select name="bodyparts">
    @foreach($bodyparts as $postcategory)
         <option value="{{ $$postcategory->postcategory->id}}">{{$bodypart->postcategory->name}}</option>
    @endforeach
    </select>--}}
    
    @endsection
    