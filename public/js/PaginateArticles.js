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
/******/ 	return __webpack_require__(__webpack_require__.s = 3);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/Article/PaginateArticles.js":
/*!**************************************************!*\
  !*** ./resources/js/Article/PaginateArticles.js ***!
  \**************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _custom_Notify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../custom/Notify */ "./resources/js/custom/Notify.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var PaginateArticles =
/*#__PURE__*/
function () {
  function PaginateArticles() {
    _classCallCheck(this, PaginateArticles);

    this._notify = new _custom_Notify__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this._main = document.querySelector('.main');
    if (!this._main) throw new Error('Pagination error');
    this._link;
  }

  _createClass(PaginateArticles, [{
    key: "paginate",
    value: function paginate() {
      var _this = this;

      this._main.addEventListener('click', function (event) {
        _this._link = event.target.closest('#pagination a');

        if (_this._link && _this._link.tagName == 'A') {
          _this._request();

          event.preventDefault();
        }
      });
    }
  }, {
    key: "_request",
    value: function _request() {
      var self = this;
      axios.get(this._link.href).then(function (response) {
        self._builder(response.data.articles);
      }).catch(function (error) {
        console.log(error);

        self._notify.alertMessage('Технические работы на сервере');
      });
    }
  }, {
    key: "_builder",
    value: function _builder(response) {
      var oldArticles = this._main.querySelector('#articles');

      this._uplift(oldArticles.offsetTop);

      var template = document.createElement('template');
      template.innerHTML = response.trim();
      var articles = template.content.querySelector('#articles');
      oldArticles.parentElement.replaceChild(articles, oldArticles);
    }
  }, {
    key: "_uplift",
    value: function _uplift(y) {
      //window.scrollTo(0, y);
      $('html, body').animate({
        scrollTop: y
      }, 'slow');
    }
  }]);

  return PaginateArticles;
}();

new PaginateArticles().paginate();

/***/ }),

/***/ "./resources/js/custom/Notify.js":
/*!***************************************!*\
  !*** ./resources/js/custom/Notify.js ***!
  \***************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Notify; });
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }

var Notify =
/*#__PURE__*/
function () {
  function Notify() {
    _classCallCheck(this, Notify);

    this.delay = 4000;
    this.x = 20;
    this.y = 100;
  }

  _createClass(Notify, [{
    key: "infoMessage",
    value: function infoMessage(message) {
      $.notify({
        message: message
      }, {
        type: 'info',
        delay: this.delay,
        offset: {
          y: this.y,
          x: this.x
        }
      });
    }
  }, {
    key: "alertMessage",
    value: function alertMessage(message) {
      jQuery.notify({
        message: message
      }, {
        type: 'danger',
        delay: this.delay,
        offset: {
          y: this.y,
          x: this.x
        }
      });
    }
  }]);

  return Notify;
}();



/***/ }),

/***/ 3:
/*!********************************************************!*\
  !*** multi ./resources/js/Article/PaginateArticles.js ***!
  \********************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! Z:\OSPanel\domains\proj.loc\resources\js\Article\PaginateArticles.js */"./resources/js/Article/PaginateArticles.js");


/***/ })

/******/ });