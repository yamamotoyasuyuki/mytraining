@extends('layouts.main')
@section('title', 'HOME')
@section('content')
<div class="homelayout">
    <div class="calendar-container">
        {{--<h3 class="calendar-heading"><a href="?ym={{$prev}}"><i class="bi bi-caret-left-square-fill"></i></a>
        {{$html_title}} <a href="?ym={{$next}}"><i class="bi bi-caret-right-square-fill"></i></a></h3>--}}
       <div class="calendar-heading btn-border-gradient-wrap btn-border-gradient-wrap--gold calendarbtn-width">
            <a href="?ym={{$prev}}" class="btn btn-border-gradient">
            <span class="btn-text-gradient--gold">◀︎</span></a>
            <h2 class="calendarindex">{{$html_title}}</h2>
            <a href="?ym={{$next}}" class="btn btn-border-gradient"><span class="btn-text-gradient--gold">▶︎</span></a>
        </div>
        <table class="table-width table-bordered">
        <tr>
            <th class="th-c">日</th>
            <th class="th-c">月</th>
            <th class="th-c">火</th>
            <th class="th-c">水</th>
            <th class="th-c">木</th>
            <th class="th-c">金</th>
            <th class="th-c">土</th>
        </tr>
        <?php
            foreach ($weeks as $week) {
                echo $week;
            }
        ?>
        </table>
    </div>
    @foreach($personalcontents as $personalcontent)
    <ul class="display-none">
        <li>{{ $personalcontent->bodypart->name}}</li>
        <li>{{ $personalcontent->postcategory->name}}</li>
        <li>{{ $personalcontent->weight_data }}</li>
        <li>{{ $personalcontent->count_data }}</li>
    </ul>
    @endforeach
    <form>
        <div class="graph-div">
            <div class="pcselectdiv">
                <select class="graph-select" name="post_category_id">
                    <option value="" selected="selected">トレーニングメニュー</option>
                　  @foreach($postcategories as $postcategoryselect)
                       <option value="{{$postcategoryselect->id}}">{{$postcategoryselect->name}}</option>
                　  @endforeach
            　  </select>
                <input type="hidden" name=personalcontents value="{{ $personalcontents ? $personalcontents : "{}"}}" id="hidden1">
                <input type="hidden" name=personalcontents value="{{ $targetPostCategory ? $targetPostCategory->name : ""}}" id="hidden2">
                
              <div class="pcselectbtwidth">
                    <button class="btn btn-border-gradient"><span class="btn-text-gradient--gold">▶︎</span></button>
            　</div>
            </div>    
        </div>
        <canvas id="myChart"></canvas>
    </form>
</div>
<div class="pagetitle mt-4">
　      トレーニング実績
</div>
<table class="table edittable homeachievewidth">
        <thead class="edit-thead">
            <tr>
            <!--<th>ID</th>-->
            <th>鍛える部位</th>
            <th>トレーニング種目</th>
            <th>セット数</th>
            <th>重さ</th>
            <th>回数</th>
            <th>トレーニング実施日</th>
            <th>削除</th>
            </tr>
        </thead>
        <tbody class="edit-tbody">
        　@foreach($personalcontents as $personalcontent)
            <tr>
                <td class="personalfont">{{ $personalcontent->bodypart->name}}</td>
                <td class="personalfont">{{ $personalcontent->postcategory->name}}</td>
                <td class="personalfont">{{ $personalcontent->set_data }}set</td>
                <td class="personalfont">{{ $personalcontent->weight_data }}kg</td>
                <td class="personalfont">{{ $personalcontent->count_data }}回</td>
                <td class="personalfont">
                    <a class="personaledit" href="{{ action('User\TrainingController@edit', ['id' => $personalcontent->id]) }}">
                    {{date('Y/m/d', strtotime($personalcontent->trainday)) }}
                    </a>
                </td>
                <td>
                    <div class="personaldelete-height">
                        <a href="{{ action('User\TrainingController@delete', ['id' => $personalcontent->id]) }}">
                            <i class="bi bi-dash-circle personaldelete"></i>
                        </a>
                    </div>
                </td>    
            </tr>
        　@endforeach
        </tbody>
</table>
@endsection