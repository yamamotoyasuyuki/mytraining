/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 2);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/graph.js":
/*!*******************************!*\
  !*** ./resources/js/graph.js ***!
  \*******************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

"use strict";
 // hidden1の値を取得

var value = document.getElementById("hidden1").value; //value(JSON形式の文字列)を配列に変換

var jsonArray = JSON.parse(value); // 結果格納用の配列

var resultArray = new Array();
var monthlyArray = new Array();
var monthlyArrayCount = new Array(); // jsonArrayの要素数だけ繰り返す

for (var i = 0; i < jsonArray.length; i++) {
  // jsonArray[i] : 一つ一つ取り出してきた値
  // 一つ一つ取り出してきた値からrmを計算
  var date = new Date(jsonArray[i].trainday);
  var month = date.getMonth();
  month += 1;
  var year = date.getYear();
  year += 1900;
  var rm = jsonArray[i].weight_data * (1 + jsonArray[i].count_data / 40);
  resultArray.push(rm); // 月ごとの合計値を配列から取り出す

  var rmnumber = 0;

  if (monthlyArray["".concat(year).concat(month)]) {
    // 月ごとに集計値が入っている連想配列から値を取り出し、数値に変換する
    rmnumber = parseInt(monthlyArray["".concat(year).concat(month)], 10);
  } // 合計値増加


  rmnumber += rm; // 増加させた内容を新しい値として連想配列に適用

  monthlyArray["".concat(year).concat(month)] = rmnumber; // 月ごとのトレーニング数を配列から取り出す

  var monthlyCount = 0;

  if (monthlyArrayCount["".concat(year).concat(month)]) {
    // 月ごとにカウント数が入っている連想配列から値を取り出し、数値に変換する
    monthlyCount = parseInt(monthlyArrayCount["".concat(year).concat(month)], 10);
  } //カウント数増加


  monthlyCount += 1; // 増加させた内容を新しい値として連想配列に適用

  monthlyArrayCount["".concat(year).concat(month)] = monthlyCount;
}

console.log(monthlyArrayCount);
var averageArray = new Array();

for (var key in monthlyArray) {
  // 各月の合計値をカウント数で割り、各月の平均値を算出
  var monthlyValue = monthlyArray[key];
  var _monthlyCount = monthlyArrayCount[key]; // 各月の平均値を格納する配列に追加

  averageArray.push(monthlyValue / _monthlyCount);
}

var targetPostCategoryName = document.getElementById("hidden2").value;
var labels = ['1ヶ月目', '2ヶ月目', '3ヶ月目', '4ヶ月目', '5ヶ月目', '6ヶ月目', '7ヶ月目', '8ヶ月目', '9ヶ月目', '10ヶ月目', '11ヶ月目', '12ヶ月目'];
var data = {
  labels: labels,
  datasets: [{
    label: targetPostCategoryName,
    backgroundColor: 'rgb(235, 254, 255)',
    borderColor: 'rgb(0, 4, 255)',
    borderWidth: '4',
    data: averageArray
  }]
};
var config = {
  type: 'line',
  data: data,
  options: {}
};
var myChart = new Chart(document.getElementById('myChart'), config);

/***/ }),

/***/ 2:
/*!*************************************!*\
  !*** multi ./resources/js/graph.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/ec2-user/environment/mytraining/resources/js/graph.js */"./resources/js/graph.js");


/***/ })

/******/ });