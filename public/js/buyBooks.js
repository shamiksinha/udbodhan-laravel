/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId])
/******/ 			return installedModules[moduleId].exports;
/******/
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
/******/ 	// identity function for calling harmony imports with the correct context
/******/ 	__webpack_require__.i = function(value) { return value; };
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, {
/******/ 				configurable: false,
/******/ 				enumerable: true,
/******/ 				get: getter
/******/ 			});
/******/ 		}
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
/******/ 	__webpack_require__.p = "";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 38);
/******/ })
/************************************************************************/
/******/ ({

/***/ 38:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(9);


/***/ }),

/***/ 9:
/***/ (function(module, exports) {

/**
 * 
 */
$.ajaxSetup({
   headers: { 'X-CSRF-Token': $('meta[name=csrf-token]').attr('content') }
});

$("select#numofbooks").click(function () {

   var selectedOption = $("select#numofbooks option:selected").text();
   var selectedValue = $("select#numofbooks").val();
   console.log("Selected value" + selectedOption);
   console.log("Selected value" + selectedValue);
   if (selectedValue != "") {
      var _select = $('<select>');
      var selectYear = $("select#bookstobuy");
      $.ajax({
         type: 'POST',
         url: '/getBookData',
         data: { selectedData: selectedOption },
         success: function success(data) {
            console.log(data);
            console.log(data[0]);
            $.each(data, function (key, val) {
               console.log(key);
               console.log(val['start_book']['book_year']);
               console.log(val['start_book']['book_month']);
               console.log(val['end_book']['book_year']);
               console.log(val['end_book']['book_month']);
               var startBook = val['start_book'];
               var startBookYear = startBook['book_year'];
               var startBookMonth = startBook['book_month'];
               var endBook = val['end_book'];
               var endBookYear = endBook['book_year'];
               var endBookMonth = endBook['book_month'];
               var groupId = val['group_id'];
               var option = new Option(startBookYear + "-" + startBookMonth + " to " + endBookYear + "-" + endBookMonth, groupId);
               _select.append(option);
            });
            console.log("select html" + _select.html());
            selectYear.find('option:not(:first)').remove();
            selectYear.append(_select.html());
            selectYear.find('option:first').attr("selected", "selected");
         }
      });
   }
});

/***/ })

/******/ });