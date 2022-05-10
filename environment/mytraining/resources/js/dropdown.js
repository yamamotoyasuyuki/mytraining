'use strict';

var $children = $('.children'); //トレーニング種目の要素を変数に入れます。
var original = $children.html(); //後のイベントで、不要なoption要素を削除するため、オリジナルをとっておく
 
//鍛える部位側のselect要素が変更になるとイベントが発生
$('.parent').change(function() {
 
  //選択された部位のvalueを取得し変数に入れる
  var val1 = $(this).val();
 
  //削除された要素をもとに戻すため.html(original)を入れておく
  $children.html(original).find('option').each(function() {
    var val2 = $(this).data('val'); //data-valの値を取得
 
    //valueと異なるdata-valを持つ要素を削除
    if (val1 != val2) {
      $(this).not(':first-child').remove();
    }
 
  });
 
  //部位側のselect要素が未選択の場合、トレーニング種目をdisabledにする
  if ($(this).val() == "") {
    $children.attr('disabled', 'disabled');
  } else {
    $children.removeAttr('disabled');
  }
 
});

//以下は削除リスト表示
$(document).ready(function(){
  $('.delete-list h5').on('click', function(){
    $(this).next().toggleClass('hidden');
  });
});
