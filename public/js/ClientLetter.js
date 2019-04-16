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
/******/ 	return __webpack_require__(__webpack_require__.s = 1);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/custom/ClientLetter.js":
/*!*********************************************!*\
  !*** ./resources/js/custom/ClientLetter.js ***!
  \*********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _Notify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Notify */ "./resources/js/custom/Notify.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var ClientLetter =
/*#__PURE__*/
function () {
  /**
   *
   * @param {string} id
   */
  function ClientLetter(id) {
    _classCallCheck(this, ClientLetter);

    this.form = document.querySelector(id);

    if (this.form == null) {
      throw new Error('Form not found / ${id}');
    }

    this.notify = new _Notify__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this.button = this.form.querySelector('input[type="submit"]');
    this.url = this.form.action;
    this.name;
    this.phone;
    this.message;
  }

  _createClass(ClientLetter, [{
    key: "run",
    value: function run() {
      var _this = this;

      this.form.addEventListener('submit', function (event) {
        event.preventDefault();

        _this._handler();

        if (!_this._checkValue()) {
          return _this.notify.alertMessage('Все поля обязательны для заполнения');
        }

        _this._send();
      });
    }
    /**
     *
     * @private
     */

  }, {
    key: "_handler",
    value: function _handler() {
      var name = this.form.querySelector('input[name="name"]').value;
      var phone = this.form.querySelector('input[name="phone"]').value;
      var message = this.form.querySelector('textarea[name="message"]').value;
      this.name = this._stringLength(name, 2, 30, 'Имя от 2 до 30 символов');
      this.message = this._stringLength(message, 5, 300, 'Сообщение от 5 до 300 символов');
      this.phone = this._validPhone(phone, 'Номер, только цифры');
    }
    /**
     *
     * @param {string} str
     * @param {int} min
     * @param {int} max
     * @param {string} message
     * @returns {string|null}
     * @private
     */

  }, {
    key: "_stringLength",
    value: function _stringLength(str, min, max, message) {
      if (str.length >= min && str.length <= max) return str;
      this.notify.alertMessage(message);
      return null;
    }
    /**
     *
     * @param {string} phone
     * @param {string} message
     * @returns {string|null}
     * @private
     */

  }, {
    key: "_validPhone",
    value: function _validPhone(phone, message) {
      if (/^(\+7|7|8)?[0-9]{10}$/.test(phone)) return phone;
      this.notify.alertMessage(message);
      return null;
    }
    /**
     *
     * @returns {boolean}
     * @private
     */

  }, {
    key: "_checkValue",
    value: function _checkValue() {
      return this.name && this.phone && this.message;
    }
    /**
     * send email
     * @private
     */

  }, {
    key: "_send",
    value: function _send() {
      this.button.disabled = true;
      var self = this;
      axios.post(this.url, {
        name: this.name,
        phone: this.phone,
        message: this.message
      }).then(function (response) {
        self.notify.infoMessage('Ваше сообщение успешно отправленно');

        self._inputClean();

        self.button.disabled = false;
      }).catch(function (error) {
        if (error.response.status == 422) {
          var errors = error.response.data.errors;

          for (var key in errors) {
            errors[key].forEach(function (element) {
              self.notify.alertMessage(element);
            });
          }
        } else {
          self.notify.alertMessage('Ошибка на сервере, попробуйте позже');
        }

        self.button.disabled = false;
      });
    }
    /**
     *
     * @private
     */

  }, {
    key: "_inputClean",
    value: function _inputClean() {
      this.form.querySelector('input[name="name"]').value = '';
      this.form.querySelector('input[name="phone"]').value = '';
      this.form.querySelector('textarea[name="message"]').value = '';
    }
  }]);

  return ClientLetter;
}();

var letter = new ClientLetter('#sendmail');
letter.run();

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

/***/ 1:
/*!***************************************************!*\
  !*** multi ./resources/js/custom/ClientLetter.js ***!
  \***************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! Z:\OSPanel\domains\proj.loc\resources\js\custom\ClientLetter.js */"./resources/js/custom/ClientLetter.js");


/***/ })

/******/ });