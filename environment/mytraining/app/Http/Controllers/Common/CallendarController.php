<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\PersonalContent;

class CallendarController extends Controller
{
 public function callendar()
  {
    $personalcontents = PersonalContent::select('trainday')->get();
     // タイムゾーンを設定
    date_default_timezone_set('Asia/Tokyo');
    // 前月・次月リンクが押された場合は、GETパラメーターから年月を取得
    if (isset($_GET['ym'])) {
      $ym = $_GET['ym'];
    } else {
      // 今月の年月を表示
      $ym = date('Y-m');
    }
    // タイムスタンプを作成し、フォーマットをチェックする
    $timestamp = strtotime($ym . '-01');
    if ($timestamp === false) {
      $ym = date('Y-m');
      $timestamp = strtotime($ym . '-01');
    }
    // 今日の日付 フォーマット　例）2021-06-3
    $today = date('Y-m-j');
    // カレンダーのタイトルを作成　例）2021年6月
    $html_title = date('Y年n月', $timestamp);
    // 前月・次月の年月を取得
    // mktimeを使う mktime(hour,minute,second,month,day,year)
    $prev = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)-1, 1, date('Y', $timestamp)));
    $next = date('Y-m', mktime(0, 0, 0, date('m', $timestamp)+1, 1, date('Y', $timestamp)));
    
    // 該当月の日数を取得
    $day_count = date('t', $timestamp);
    
    // １日が何曜日か　0:日 1:月 2:火 ... 6:土
    $youbi = date('w', mktime(0, 0, 0, date('m', $timestamp), 1, date('Y', $timestamp)));
    // カレンダー作成の準備
    $weeks = [];
    $week = '';
    
    // 第１週目：空のセルを追加
    // 例）１日が火曜日だった場合、日・月曜日の２つ分の空セルを追加する
    $week .= str_repeat('<td class="td-c"></td>', $youbi);
    for ( $day = 1; $day <= $day_count; $day++, $youbi++) {
        // その月の日数分$dayに足し算
        $date = $ym . '-' . $day;
        if ($today == $date) {
          
        // 今日の日付の場合は、class="today"をつける
          $yearmonth = date('Y/m/',strtotime($ym)).$day;
          $add = false;
          foreach($personalcontents as $personal){
            if(date('Y/m/j', strtotime($personal->trainday)) == $yearmonth){
              $week .='<td class="td-c today">' . $day."<a href='/home/main/achievement?traindayview=" .$personal->trainday."'>●</a>";
              $add = true;
              break;
            }
          }
          if(!$add){
            $week .= '<td class="today">' . $day;
          }
        } else {
          $yearmonth = date('Y/m/',strtotime($ym)).$day;
            // weeks配列にtrと$weekを追加する

          $add = false;
          foreach($personalcontents as $personal){
            if(date('Y/m/j', strtotime($personal->trainday)) == $yearmonth){
              $week .='<td class="td-c">' . $day."<a href='/home/main/achievement?traindayview=" .$personal->trainday."'>●</a>".'</td>';
              $add = true;
              break;
            }
          }
          if(!$add){
            $week .= '<td class="td-c">' . $day;
          }
        }
        $week .= '</td>';
        // 週終わり、または、月終わりの場合
        if ($youbi % 7 == 6 || $day == $day_count) {
        
          if ($day == $day_count) {
            // 月の最終日の場合、空セルを追加
            // 例）最終日が水曜日の場合、木・金・土曜日の空セルを追加
            $week .= str_repeat('<td class="td-c"></td>', 6 - $youbi % 7);
          }
          $weeks[] = '<tr>' . $week . '</tr>';
          // weekをリセット
          $week = '';
        }
      }
      return['weeks'=>$weeks,'prev'=>$prev,'html_title'=>$html_title,'next'=>$next,];
  }
}
