'use strict';
  // hidden1の値を取得
  const value = document.getElementById("hidden1").value;
  
  //value(JSON形式の文字列)を配列に変換
  const jsonArray = JSON.parse(value);
  // 結果格納用の配列
  var resultArray = new Array();
  var monthlyArray = new Array();
  var monthlyArrayCount = new Array();
  // jsonArrayの要素数だけ繰り返す
  for (let i = 0; i < jsonArray.length; i++) {
    
    // jsonArray[i] : 一つ一つ取り出してきた値
    // 一つ一つ取り出してきた値からrmを計算
    const date = new Date(jsonArray[i].trainday);
    var month = date.getMonth();
    month += 1;
    var year = date.getYear();
    year += 1900;
    const rm = jsonArray[i].weight_data * (1+(jsonArray[i].count_data / 40)); 
    resultArray.push(rm);
    
    // 月ごとの合計値を配列から取り出す
    var rmnumber = 0;
    if (monthlyArray[`${year}${month}`]){
      
    // 月ごとに集計値が入っている連想配列から値を取り出し、数値に変換する
       rmnumber = parseInt(monthlyArray[`${year}${month}`] , 10);
    }
    // 合計値増加
    rmnumber += rm;
    // 増加させた内容を新しい値として連想配列に適用
    monthlyArray[`${year}${month}`] = rmnumber;
    
    // 月ごとのトレーニング数を配列から取り出す
    var monthlyCount = 0;
    
    if (monthlyArrayCount[`${year}${month}`]){
    // 月ごとにカウント数が入っている連想配列から値を取り出し、数値に変換する
       monthlyCount = parseInt(monthlyArrayCount[`${year}${month}`] , 10);
    }
    //カウント数増加
    monthlyCount += 1;
    // 増加させた内容を新しい値として連想配列に適用
    monthlyArrayCount[`${year}${month}`] = monthlyCount;
    
  }
  console.log(monthlyArrayCount);
  const averageArray = new Array();
  for (let key in monthlyArray) {
    // 各月の合計値をカウント数で割り、各月の平均値を算出
    const monthlyValue = monthlyArray[key];
    const monthlyCount = monthlyArrayCount[key];
    // 各月の平均値を格納する配列に追加
    averageArray.push(monthlyValue / monthlyCount);
  }
  
  
  const targetPostCategoryName = document.getElementById("hidden2").value;
  
  const labels = [
    '1月目',
    '2月目',
    '3月目',
    '4月目',
    '5月目',
    '6月目',
    '7月目',
    '8月目',
    '9月目',
    '10月目',
    '11月目',
    '12月目',
  ];
  
  const data = {
    labels: labels,
    datasets: [{
      label: targetPostCategoryName,
      backgroundColor: 'rgb(235, 254, 255)',
      borderColor: 'rgb(0, 4, 255)',
      borderWidth: '4',
      data:averageArray,
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );