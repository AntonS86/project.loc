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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/WorkMessage/ImageWorkMessage.js":
/*!******************************************************!*\
  !*** ./resources/js/WorkMessage/ImageWorkMessage.js ***!
  \******************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ImageWorkMessage; });
/* harmony import */ var _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../custom/ErrorHandler */ "./resources/js/custom/ErrorHandler.js");
/* harmony import */ var _custom_Validation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../custom/Validation */ "./resources/js/custom/Validation.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var ImageWorkMessage =
/*#__PURE__*/
function () {
  /**
   *
   * @param {string} selector
   */
  function ImageWorkMessage(selector) {
    _classCallCheck(this, ImageWorkMessage);

    this._inputFile = document.querySelector(selector);
    this._imgVal = new _custom_Validation__WEBPACK_IMPORTED_MODULE_1__["default"]();
  }
  /**
   *
   */


  _createClass(ImageWorkMessage, [{
    key: "send",
    value: function send() {
      this._imageDelete();

      this._inputEvent();
    }
    /**
     *
     * @private
     */

  }, {
    key: "_inputEvent",
    value: function _inputEvent() {
      var _this = this;

      this._inputFile.addEventListener('change', function (e) {
        var images = e.target.files;

        if (_this._imgVal.imageValidate(images)) {
          _this._upload(_this._buildFormData(images));
        }

        _this._inputFile.value = '';
      });
    }
    /**
     *
     * @param {FormData} formData
     * @private
     */

  }, {
    key: "_upload",
    value: function _upload(formData) {
      var _this2 = this;

      var progress = document.querySelector('#upload-progress');
      var line = progress.querySelector('#progress-line');
      var config = {
        onUploadProgress: function onUploadProgress(progressEvent) {
          progress.hidden = false;
          var percentCompleted = Math.round(progressEvent.loaded * 100 / progressEvent.total);
          line.style.width = percentCompleted + '%';
        }
      };
      axios.post(this._inputFile.dataset.route, formData, config).then(function (response) {
        progress.hidden = true;

        _this2._responseHandler(response);
      }).catch(function (error) {
        progress.hidden = true;
        new _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_0__["default"]().errorNotify(error);
      });
    }
    /**
     *
     * @param {FileList} images
     * @return {FormData}
     * @private
     */

  }, {
    key: "_buildFormData",
    value: function _buildFormData(images) {
      var formData = new FormData();
      var i = 0;
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = images[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var image = _step.value;
          formData.append('images[' + i + ']', image);
          i++;
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      return formData;
    }
    /**
     *
     * @param {number} id
     * @param {string} url
     * @return {string}
     * @private
     */

  }, {
    key: "_buildUploadImage",
    value: function _buildUploadImage(id, url) {
      return "<div class=\"uploader-images border rounded\"\n                 style=\"background-image: url('".concat(url, "');\" data-image=\"").concat(id, "\">\n                <a href=\"#\" class=\"close text-danger\" aria-label=\"Close\">\n                    <i class=\"fa fa-times-circle\" aria-hidden=\"true\"></i>\n                </a>\n            </div>");
    }
    /**
     *
     * @param {Object} response
     * @return {boolean}
     * @private
     */

  }, {
    key: "_responseHandler",
    value: function _responseHandler(response) {
      if (response.status !== 200 || response.data.length === 0) return false;
      var block = document.querySelector('#uploaded-photo');
      block.hidden = false;
      var _iteratorNormalCompletion2 = true;
      var _didIteratorError2 = false;
      var _iteratorError2 = undefined;

      try {
        for (var _iterator2 = response.data[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
          var img = _step2.value;
          block.insertAdjacentHTML('beforeend', this._buildUploadImage(img.id, img.asset_thumbs_path));
        }
      } catch (err) {
        _didIteratorError2 = true;
        _iteratorError2 = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion2 && _iterator2.return != null) {
            _iterator2.return();
          }
        } finally {
          if (_didIteratorError2) {
            throw _iteratorError2;
          }
        }
      }
    }
    /**
     *
     * @private
     */

  }, {
    key: "_imageDelete",
    value: function _imageDelete() {
      document.querySelector('#uploaded-photo').addEventListener('click', function (e) {
        e.preventDefault();
        var link = e.target.closest('a');
        if (!link) return false;
        var parentLink = link.parentElement;
        var block = parentLink.parentElement;
        block.removeChild(parentLink);

        if (block.children.length === 0) {
          block.hidden.true;
        }
      });
    }
  }]);

  return ImageWorkMessage;
}();



/***/ }),

/***/ "./resources/js/WorkMessage/WorkMessageHandler.js":
/*!********************************************************!*\
  !*** ./resources/js/WorkMessage/WorkMessageHandler.js ***!
  \********************************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageWorkMessage__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageWorkMessage */ "./resources/js/WorkMessage/ImageWorkMessage.js");
/* harmony import */ var _custom_Validation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../custom/Validation */ "./resources/js/custom/Validation.js");
/* harmony import */ var _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../custom/ErrorHandler */ "./resources/js/custom/ErrorHandler.js");
/* harmony import */ var _custom_Notify__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../custom/Notify */ "./resources/js/custom/Notify.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }






var WorkMessageHandler =
/*#__PURE__*/
function () {
  /**
   *
   */
  function WorkMessageHandler() {
    _classCallCheck(this, WorkMessageHandler);

    this._form = document.querySelector('#form-work-message');
    this._val = new _custom_Validation__WEBPACK_IMPORTED_MODULE_1__["default"]();
    this._notify = new _custom_Notify__WEBPACK_IMPORTED_MODULE_3__["default"]();
  }
  /**
   *
   */


  _createClass(WorkMessageHandler, [{
    key: "send",
    value: function send() {
      var _this = this;

      this._form.addEventListener('submit', function (e) {
        e.preventDefault();

        var data = _this._inputValue();

        if (!data) return false;

        _this._request(data);
      });
    }
    /**
     *
     * @return {boolean|object}
     * @private
     */

  }, {
    key: "_inputValue",
    value: function _inputValue() {
      var work_id = this._form.querySelector('select[name="work_id"]').value;

      var name = this._form.querySelector('input[name="name"]').value;

      var phone = this._form.querySelector('input[name="phone"]').value;

      var message = this._form.querySelector('textarea[name="message"]').value;

      var images = this._collectImages();

      var data = {};
      data.work_id = this._val.intValidate(work_id, 'Выберите пункт из списка') ? work_id : null;
      data.name = this._val.stringValidate(name, 2, 30, 'Имя от 2 до 30 символов') ? name : null;
      data.message = this._val.stringValidate(message, 2, 500, 'Сообщение от 5 до 500 символов') ? message : null;
      data.phone = this._val.phoneValidate(phone, 'Введите номер по шаблону') ? phone : null;
      if (images != null && images.length > 0) data.images = images;

      if (!(data.work_id && data.name && data.message && data.phone)) {
        this._notify.alertMessage('Поля имя, телефон и сообщение обязательны для заполнения');

        return false;
      }

      return data;
    }
    /**
     *
     * @return {null|Array}
     * @private
     */

  }, {
    key: "_collectImages",
    value: function _collectImages() {
      var imagesBlock = document.querySelector('#uploaded-photo');
      if (imagesBlock.children.length === 0) return null;
      var images = [];
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = imagesBlock.children[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var elem = _step.value;
          images.push(elem.dataset.image);
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      return images;
    }
  }, {
    key: "_request",
    value: function _request(data) {
      var _this2 = this;

      axios.post(this._form.action, data).then(function (response) {
        _this2._responseHandler(response);
      }).catch(function (error) {
        new _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_2__["default"]().errorNotify(error);
      });
    }
    /**
     *
     * @param {Object} response
     * @return {boolean}
     * @private
     */

  }, {
    key: "_responseHandler",
    value: function _responseHandler(response) {
      if (!(response.status === 200 && response.data === true)) {
        this._notify.alertMessage('Проблемы на сервере, попробуйте позже');

        return false;
      }

      this._notify.infoMessage('Спасибо за сообщение, мы вам перезвоним');

      this._form.querySelector('input[name="name"]').value = '';
      this._form.querySelector('input[name="phone"]').value = '';
      this._form.querySelector('textarea[name="message"]').value = '';
      var blockImage = document.querySelector('#uploaded-photo');

      if (blockImage.children.length > 0) {
        blockImage.innerHTML = '';
      }

      blockImage.hidden = true;
    }
  }]);

  return WorkMessageHandler;
}();

new WorkMessageHandler().send();
new _ImageWorkMessage__WEBPACK_IMPORTED_MODULE_0__["default"]('#images-uploader').send();

/***/ }),

/***/ "./resources/js/custom/ErrorHandler.js":
/*!*********************************************!*\
  !*** ./resources/js/custom/ErrorHandler.js ***!
  \*********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ErrorHandler; });
/* harmony import */ var _Notify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Notify */ "./resources/js/custom/Notify.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var ErrorHandler =
/*#__PURE__*/
function () {
  function ErrorHandler() {
    _classCallCheck(this, ErrorHandler);

    this._notify = new _Notify__WEBPACK_IMPORTED_MODULE_0__["default"]();
  }

  _createClass(ErrorHandler, [{
    key: "errorNotify",
    value: function errorNotify(error) {
      var _this = this;

      if (error.response && error.response.status === 422) {
        var errors = error.response.data.errors;

        for (var key in errors) {
          errors[key].forEach(function (element) {
            _this._notify.alertMessage(element);
          });
        }
      } else {
        this._notify.alertMessage('Ошибка на сервере, попробуйте позже');
      }
    }
  }]);

  return ErrorHandler;
}();



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

/***/ "./resources/js/custom/Validation.js":
/*!*******************************************!*\
  !*** ./resources/js/custom/Validation.js ***!
  \*******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return Validation; });
/* harmony import */ var _Notify__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./Notify */ "./resources/js/custom/Notify.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }



var Validation =
/*#__PURE__*/
function () {
  function Validation() {
    _classCallCheck(this, Validation);

    this._notify = new _Notify__WEBPACK_IMPORTED_MODULE_0__["default"]();
    this._imageRegexp = /^image\/(jpeg|jpg|png|gif)$/;
    this._imageNameRegexp = /^[0-9a-zA-Zа-яА-яёЁ_-]*\.(jpeg|jpg|png|gif)$/i;
    this._phoneRegexp = /^(\+7|7|8)?[0-9]{10}$/;
  }
  /**
   *
   * @param {FileList} images
   * @returns {boolean}
   */


  _createClass(Validation, [{
    key: "imageValidate",
    value: function imageValidate(images) {
      if (!images) return false;
      if (!images instanceof FileList || images.length === 0) return false;
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = images[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var image = _step.value;

          if (!this._imageRegexp.test(image.type) && !this._imageNameRegexp.test(image.name)) {
            this._notify.alertMessage('Файл должен быть изображением');

            return false;
          }
        }
      } catch (err) {
        _didIteratorError = true;
        _iteratorError = err;
      } finally {
        try {
          if (!_iteratorNormalCompletion && _iterator.return != null) {
            _iterator.return();
          }
        } finally {
          if (_didIteratorError) {
            throw _iteratorError;
          }
        }
      }

      return true;
    }
    /**
     *
     * @param str
     * @param min
     * @param max
     * @param message
     * @returns {boolean}
     */

  }, {
    key: "stringValidate",
    value: function stringValidate(str, min, max, message) {
      str = str.trim();
      if (str.length >= min && str.length <= max) return true;

      this._notify.alertMessage(message);

      return false;
    }
    /**
     *
     * @param phone
     * @param message
     * @returns {boolean}
     */

  }, {
    key: "phoneValidate",
    value: function phoneValidate(phone, message) {
      if (this._phoneRegexp.test(phone)) return true;

      this._notify.alertMessage(message);

      return false;
    }
    /**
     *
     * @param {int} int
     * @param {string} message
     * @returns {boolean}
     */

  }, {
    key: "intValidate",
    value: function intValidate(int, message) {
      if (/^[1-9]\d*$/.test(int)) return true;

      this._notify.alertMessage(message);

      return false;
    }
  }]);

  return Validation;
}();



/***/ }),

/***/ 5:
/*!**************************************************************!*\
  !*** multi ./resources/js/WorkMessage/WorkMessageHandler.js ***!
  \**************************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! Z:\OSPanel\domains\proj.loc\resources\js\WorkMessage\WorkMessageHandler.js */"./resources/js/WorkMessage/WorkMessageHandler.js");


/***/ })

/******/ });