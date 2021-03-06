/******/ (() => { // webpackBootstrap
/******/ 	var __webpack_modules__ = ({

/***/ "./src/js/clock/index.js":
/*!*******************************!*\
  !*** ./src/js/clock/index.js ***!
  \*******************************/
/***/ (() => {

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

/**
 * This works with the public function widget() at class-clock-widget.php
 */
(function () {
  var Clock = /*#__PURE__*/function () {
    /**
     * Constructor
     */
    function Clock() {
      _classCallCheck(this, Clock);

      this.initializeClock();
    }
    /**
     * initializeClock
     */


    _createClass(Clock, [{
      key: "initializeClock",
      value: function initializeClock() {
        var _this = this;

        setInterval(function () {
          return _this.time();
        }, 1000);
      }
      /**
       * Numpad
       *
       * @param {String} str String
       *
       * @return {string} String
       */

    }, {
      key: "numPad",
      value: function numPad(str) {
        var cStr = str.toString();

        if (2 > cStr.length) {
          str = 0 + cStr;
        }

        return str;
      }
      /**
       * Time
       */

    }, {
      key: "time",
      value: function time() {
        var clockTime = document.getElementById("clock-time");
        var clockAmpm = document.getElementById("clock-ampm");
        var clockTimeEmoji = document.getElementById("clock-time-emoji");
        if (!clockTime | !clockAmpm | !clockTimeEmoji) return null;
        var currDate = new Date();
        var currSec = currDate.getSeconds();
        var currMin = currDate.getMinutes();
        var curr24Hr = currDate.getHours();
        var ampm = 12 <= curr24Hr ? "pm" : "am";
        var currHr = curr24Hr % 12;
        currHr = currHr ? currHr : 12;
        var stringTime = currHr + ":" + this.numPad(currMin) + ":" + this.numPad(currSec);

        if (5 <= curr24Hr && 17 >= curr24Hr) {
          clockTimeEmoji.innerHTML = "????";
        } else {
          clockTimeEmoji.innerHTML = "????";
        }

        clockTime.innerHTML = stringTime;
        clockAmpm.innerHTML = ampm;
      }
    }]);

    return Clock;
  }();

  new Clock();
})();

/***/ }),

/***/ "./src/img/sofa.jpg":
/*!**************************!*\
  !*** ./src/img/sofa.jpg ***!
  \**************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ("../../src/img/sofa.jpg");

/***/ }),

/***/ "./src/sass/main.scss":
/*!****************************!*\
  !*** ./src/sass/main.scss ***!
  \****************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ })

/******/ 	});
/************************************************************************/
/******/ 	// The module cache
/******/ 	var __webpack_module_cache__ = {};
/******/ 	
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/ 		// Check if module is in cache
/******/ 		var cachedModule = __webpack_module_cache__[moduleId];
/******/ 		if (cachedModule !== undefined) {
/******/ 			return cachedModule.exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = __webpack_module_cache__[moduleId] = {
/******/ 			// no module.id needed
/******/ 			// no module.loaded needed
/******/ 			exports: {}
/******/ 		};
/******/ 	
/******/ 		// Execute the module function
/******/ 		__webpack_modules__[moduleId](module, module.exports, __webpack_require__);
/******/ 	
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/ 	
/************************************************************************/
/******/ 	/* webpack/runtime/compat get default export */
/******/ 	(() => {
/******/ 		// getDefaultExport function for compatibility with non-harmony modules
/******/ 		__webpack_require__.n = (module) => {
/******/ 			var getter = module && module.__esModule ?
/******/ 				() => (module['default']) :
/******/ 				() => (module);
/******/ 			__webpack_require__.d(getter, { a: getter });
/******/ 			return getter;
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/define property getters */
/******/ 	(() => {
/******/ 		// define getter functions for harmony exports
/******/ 		__webpack_require__.d = (exports, definition) => {
/******/ 			for(var key in definition) {
/******/ 				if(__webpack_require__.o(definition, key) && !__webpack_require__.o(exports, key)) {
/******/ 					Object.defineProperty(exports, key, { enumerable: true, get: definition[key] });
/******/ 				}
/******/ 			}
/******/ 		};
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/hasOwnProperty shorthand */
/******/ 	(() => {
/******/ 		__webpack_require__.o = (obj, prop) => (Object.prototype.hasOwnProperty.call(obj, prop))
/******/ 	})();
/******/ 	
/******/ 	/* webpack/runtime/make namespace object */
/******/ 	(() => {
/******/ 		// define __esModule on exports
/******/ 		__webpack_require__.r = (exports) => {
/******/ 			if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 				Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 			}
/******/ 			Object.defineProperty(exports, '__esModule', { value: true });
/******/ 		};
/******/ 	})();
/******/ 	
/************************************************************************/
var __webpack_exports__ = {};
// This entry need to be wrapped in an IIFE because it need to be in strict mode.
(() => {
"use strict";
/*!************************!*\
  !*** ./src/js/main.js ***!
  \************************/
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _clock__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./clock */ "./src/js/clock/index.js");
/* harmony import */ var _clock__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_clock__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _img_sofa_jpg__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../img/sofa.jpg */ "./src/img/sofa.jpg");
/* harmony import */ var _sass_main_scss__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../sass/main.scss */ "./src/sass/main.scss");
 //images

 //sass


console.log('Hola desde main.js');
})();

/******/ })()
;
//# sourceMappingURL=main.js.map