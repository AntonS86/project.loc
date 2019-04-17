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
    /******/
    return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/Article/ArticleCreate.js":
/*!***********************************************!*\
  !*** ./resources/js/Article/ArticleCreate.js ***!
  \***********************************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _ImageTitleArticle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./ImageTitleArticle */ "./resources/js/Article/ImageTitleArticle.js");
/* harmony import */ var _custom_quillEditor__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../custom/quillEditor */ "./resources/js/custom/quillEditor.js");
/* harmony import */ var _ImageQuill__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./ImageQuill */ "./resources/js/Article/ImageQuill.js");
/* harmony import */ var _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../custom/ErrorHandler */ "./resources/js/custom/ErrorHandler.js");
/* harmony import */ var _custom_Notify__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! ../custom/Notify */ "./resources/js/custom/Notify.js");


function _slicedToArray(arr, i) { return _arrayWithHoles(arr) || _iterableToArrayLimit(arr, i) || _nonIterableRest(); }

function _nonIterableRest() { throw new TypeError("Invalid attempt to destructure non-iterable instance"); }

function _iterableToArrayLimit(arr, i) { var _arr = []; var _n = true; var _d = false; var _e = undefined; try { for (var _i = arr[Symbol.iterator](), _s; !(_n = (_s = _i.next()).done); _n = true) { _arr.push(_s.value); if (i && _arr.length === i) break; } } catch (err) { _d = true; _e = err; } finally { try { if (!_n && _i["return"] != null) _i["return"](); } finally { if (_d) throw _e; } } return _arr; }

function _arrayWithHoles(arr) { if (Array.isArray(arr)) return arr; }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }







var ArticleCreate =
/*#__PURE__*/
function () {
  function ArticleCreate() {
    _classCallCheck(this, ArticleCreate);

    this._form = document.querySelector('#form-article');
  }

  _createClass(ArticleCreate, [{
    key: "formSend",
    value: function formSend() {
      var _this = this;

      this._form.addEventListener('submit', function (e) {
        e.preventDefault();

        _this._upload(_this._getInputValue());
      });
    }
    /**
     *
     * @private
     * return {Object}
     */

  }, {
    key: "_getInputValue",
    value: function _getInputValue() {
      var inputs = this._getInputName();

      var data = {};
      var _iteratorNormalCompletion = true;
      var _didIteratorError = false;
      var _iteratorError = undefined;

      try {
        for (var _iterator = inputs[Symbol.iterator](), _step; !(_iteratorNormalCompletion = (_step = _iterator.next()).done); _iteratorNormalCompletion = true) {
          var input = _step.value;

          if (this._form[input].value.trim()) {
            data[input] = this._form[input].value.trim();
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

      data.images = this._getImges(data.title);
      data.status = this._getStatus();
      data.text = this._getText();
      data.titleImage = this._getTitleImage();

      for (var k in data) {
        if (data[k] === null) {
          delete data[k];
        }
      }

      return data;
    }
  }, {
    key: "_upload",
    value: function _upload(data) {
      var _this2 = this;

      axios.post(this._form.action, data).then(function (response) {
        _this2._responseHandler(response);
      }).catch(function (error) {
        new _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_3__["default"]().errorNotify(error);
      });
    }
    /**
     *
     * @param {string} alt
     * @return {null|Array}
     * @private
     */

  }, {
    key: "_getImges",
    value: function _getImges(alt) {
      var images = document.querySelectorAll('.ql-editor img');
      var src = [];
      var _iteratorNormalCompletion2 = true;
      var _didIteratorError2 = false;
      var _iteratorError2 = undefined;

      try {
        for (var _iterator2 = images[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
          var img = _step2.value;
          img.classList.add('img-fluid');
          img.classList.add('mx-auto');
          img.classList.add('d-block');
          img.alt = alt;
          img.title = alt;
          src.push(img.src);
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

      return src;
    }
    /**
     *
     * @return {string}
     * @private
     */

  }, {
    key: "_getStatus",
    value: function _getStatus() {
      var status = document.querySelector('#status');
      return status.checked ? 'published' : 'draft';
    }
    /**
     *
     * @param {Object} className
     * @private
     */

  }, {
    key: "_getText",
    value: function _getText() {
      var text = document.querySelector('.ql-editor');

      var _arr = Object.entries(this._textClassName());

      for (var _i = 0; _i < _arr.length; _i++) {
        var _arr$_i = _slicedToArray(_arr[_i], 2),
            needle = _arr$_i[0],
            addClass = _arr$_i[1];

        var classElems = text.getElementsByClassName(needle);
        var _iteratorNormalCompletion3 = true;
        var _didIteratorError3 = false;
        var _iteratorError3 = undefined;

        try {
          for (var _iterator3 = classElems[Symbol.iterator](), _step3; !(_iteratorNormalCompletion3 = (_step3 = _iterator3.next()).done); _iteratorNormalCompletion3 = true) {
            var elem = _step3.value;
            elem.classList.add(addClass);
          }
        } catch (err) {
          _didIteratorError3 = true;
          _iteratorError3 = err;
        } finally {
          try {
            if (!_iteratorNormalCompletion3 && _iterator3.return != null) {
              _iterator3.return();
            }
          } finally {
            if (_didIteratorError3) {
              throw _iteratorError3;
            }
          }
        }
      }

      return text.innerHTML;
    }
  }, {
    key: "_getTitleImage",
    value: function _getTitleImage() {
      var titleImage = document.querySelector('#titleImagePreview');
      return titleImage.dataset.id ? +titleImage.dataset.id : null;
    }
  }, {
    key: "_responseHandler",
    value: function _responseHandler(response) {
      if (response.status !== 200 || response.data.length === 0) {
        new _custom_Notify__WEBPACK_IMPORTED_MODULE_4__["default"]().alertMessage('Ошибка обновления');
        return false;
      }

      ;
      new _custom_Notify__WEBPACK_IMPORTED_MODULE_4__["default"]().infoMessage('Статья обновлена');
    }
    /**
     *
     * @return {string[]}
     * @private
     */

  }, {
    key: "_getInputName",
    value: function _getInputName() {
      return ['_method', 'title', 'desc', 'meta_desc', 'keywords', 'category_id'];
    }
  }, {
    key: "_textClassName",
    value: function _textClassName() {
      return {
        'ql-align-center': 'text-center',
        'ql-align-justify': 'text-justify',
        'ql-align-right': 'text-right'
      };
    }
  }]);

  return ArticleCreate;
}();

new _ImageTitleArticle__WEBPACK_IMPORTED_MODULE_0__["default"]().inputEvent();
new _ImageQuill__WEBPACK_IMPORTED_MODULE_2__["default"](_custom_quillEditor__WEBPACK_IMPORTED_MODULE_1__["quill"]).imageEvent();
new ArticleCreate().formSend();

/***/ }),

/***/ "./resources/js/Article/ImageQuill.js":
/*!********************************************!*\
  !*** ./resources/js/Article/ImageQuill.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ImageQuill; });
/* harmony import */ var _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../custom/ErrorHandler */ "./resources/js/custom/ErrorHandler.js");
/* harmony import */ var _custom_Validation__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../custom/Validation */ "./resources/js/custom/Validation.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var ImageQuill =
/*#__PURE__*/
function () {
  /**
   *
   * @param {Quill} quill
   */
  function ImageQuill(quill) {
    _classCallCheck(this, ImageQuill);

    this.quill = quill;
    this._imgVal = new _custom_Validation__WEBPACK_IMPORTED_MODULE_1__["default"]();
  }
  /**
   *
   */


  _createClass(ImageQuill, [{
    key: "imageEvent",
    value: function imageEvent() {
      var _this = this;

      this.quill.getModule('toolbar').addHandler('image', function () {
        var inputFile = _this._inputFileClick();

        inputFile.addEventListener('change', function (e) {
          var images = e.target.files;

          if (_this._imgVal.imageValidate(images)) {
            _this._upload(_this._buildFormData(images));
          }
        });
      });
    }
    /**
     *
     * @return {HTMLInputElement}
     * @private
     */

  }, {
    key: "_inputFileClick",
    value: function _inputFileClick() {
      var inputFile = document.createElement('input');
      inputFile.setAttribute('type', 'file');
      inputFile.multiple = true;
      inputFile.click();
      return inputFile;
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
     * @param {FormData} formData
     * @private
     */

  }, {
    key: "_upload",
    value: function _upload(formData) {
      var _this2 = this;

      var url = document.querySelector('#form-article').dataset.images_route;
      var progress = document.querySelector('#quill-upl-prog');
      var line = progress.querySelector('#quill-prog-line');
      var config = {
        onUploadProgress: function onUploadProgress(progressEvent) {
          progress.hidden = false;
          var percentCompleted = Math.round(progressEvent.loaded * 100 / progressEvent.total);
          line.style.width = percentCompleted + '%';
        }
      };
      axios.post(url, formData, config).then(function (response) {
        progress.hidden = true;

        _this2._responseHandler(response);
      }).catch(function (error) {
        progress.hidden = true;
        new _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_0__["default"]().errorNotify(error);
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
      if (response.status !== 200 || response.data.length === 0) return false;
      var _iteratorNormalCompletion2 = true;
      var _didIteratorError2 = false;
      var _iteratorError2 = undefined;

      try {
        for (var _iterator2 = response.data[Symbol.iterator](), _step2; !(_iteratorNormalCompletion2 = (_step2 = _iterator2.next()).done); _iteratorNormalCompletion2 = true) {
          var img = _step2.value;
          var range = this.quill.getSelection();
          this.quill.insertEmbed(range.index, 'image', img.asset_path, 'api');
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
  }]);

  return ImageQuill;
}();



/***/ }),

/***/ "./resources/js/Article/ImageTitleArticle.js":
/*!***************************************************!*\
  !*** ./resources/js/Article/ImageTitleArticle.js ***!
  \***************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "default", function() { return ImageTitleArticle; });
/* harmony import */ var _custom_Validation__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../custom/Validation */ "./resources/js/custom/Validation.js");
/* harmony import */ var _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../custom/ErrorHandler */ "./resources/js/custom/ErrorHandler.js");
function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _defineProperties(target, props) { for (var i = 0; i < props.length; i++) { var descriptor = props[i]; descriptor.enumerable = descriptor.enumerable || false; descriptor.configurable = true; if ("value" in descriptor) descriptor.writable = true; Object.defineProperty(target, descriptor.key, descriptor); } }

function _createClass(Constructor, protoProps, staticProps) { if (protoProps) _defineProperties(Constructor.prototype, protoProps); if (staticProps) _defineProperties(Constructor, staticProps); return Constructor; }




var ImageTitleArticle =
/*#__PURE__*/
function () {
  /**
   *
   */
  function ImageTitleArticle() {
    _classCallCheck(this, ImageTitleArticle);

    this._titleImage = document.querySelector('#titleImage');
    this._titleImagePreview = document.querySelector('#titleImagePreview');
    this._imgVal = new _custom_Validation__WEBPACK_IMPORTED_MODULE_0__["default"]();
  }

  _createClass(ImageTitleArticle, [{
    key: "inputEvent",
    value: function inputEvent() {
      var _this = this;

      this._titleImage.addEventListener('change', function (e) {
        var images = e.target.files;

        if (_this._imgVal.imageValidate(images)) {
          _this._upload(_this._buildFormData(images));
        }

        _this._titleImage.value = '';
      });
    }
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
      axios.post(this._titleImage.dataset.route, formData, config).then(function (response) {
        progress.hidden = true;

        _this2._responseHandler(response);
      }).catch(function (error) {
        progress.hidden = true;
        new _custom_ErrorHandler__WEBPACK_IMPORTED_MODULE_1__["default"]().errorNotify(error);
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
      formData.append('image', images[0]);
      return formData;
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
      var imgPreview = document.querySelector('#titleImagePreview');
      imgPreview.src = response.data.asset_path;
      imgPreview.dataset.id = response.data.id;
    }
  }]);

  return ImageTitleArticle;
}();



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

/***/ "./resources/js/custom/quillEditor.js":
/*!********************************************!*\
  !*** ./resources/js/custom/quillEditor.js ***!
  \********************************************/
/*! exports provided: quill */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "quill", function() { return quill; });
function _typeof(obj) { if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

function _classCallCheck(instance, Constructor) { if (!(instance instanceof Constructor)) { throw new TypeError("Cannot call a class as a function"); } }

function _possibleConstructorReturn(self, call) { if (call && (_typeof(call) === "object" || typeof call === "function")) { return call; } return _assertThisInitialized(self); }

function _assertThisInitialized(self) { if (self === void 0) { throw new ReferenceError("this hasn't been initialised - super() hasn't been called"); } return self; }

function _getPrototypeOf(o) { _getPrototypeOf = Object.setPrototypeOf ? Object.getPrototypeOf : function _getPrototypeOf(o) { return o.__proto__ || Object.getPrototypeOf(o); }; return _getPrototypeOf(o); }

function _inherits(subClass, superClass) { if (typeof superClass !== "function" && superClass !== null) { throw new TypeError("Super expression must either be null or a function"); } subClass.prototype = Object.create(superClass && superClass.prototype, { constructor: { value: subClass, writable: true, configurable: true } }); if (superClass) _setPrototypeOf(subClass, superClass); }

function _setPrototypeOf(o, p) { _setPrototypeOf = Object.setPrototypeOf || function _setPrototypeOf(o, p) { o.__proto__ = p; return o; }; return _setPrototypeOf(o, p); }

var Inline = Quill.import('blots/inline');

var BoldBlot =
/*#__PURE__*/
function (_Inline) {
  _inherits(BoldBlot, _Inline);

  function BoldBlot() {
    _classCallCheck(this, BoldBlot);

    return _possibleConstructorReturn(this, _getPrototypeOf(BoldBlot).apply(this, arguments));
  }

  return BoldBlot;
}(Inline);

BoldBlot.blotName = 'bold';
BoldBlot.tagName = 'b';

var ItalicBlot =
/*#__PURE__*/
function (_Inline2) {
  _inherits(ItalicBlot, _Inline2);

  function ItalicBlot() {
    _classCallCheck(this, ItalicBlot);

    return _possibleConstructorReturn(this, _getPrototypeOf(ItalicBlot).apply(this, arguments));
  }

  return ItalicBlot;
}(Inline);

ItalicBlot.blotName = 'italic';
ItalicBlot.tagName = 'i';
Quill.register(BoldBlot);
Quill.register(ItalicBlot);
var quill = new Quill('#editor', {
  theme: 'snow',
  readOnly: false,
  modules: {
    toolbar: [['bold', 'italic', 'underline', 'strike'], // toggled buttons
    ['blockquote', 'code-block'], [{
      'header': 1
    }, {
      'header': 2
    }], [{
      'list': 'ordered'
    }, {
      'list': 'bullet'
    }], [{
      'script': 'sub'
    }, {
      'script': 'super'
    }], // superscript/subscript
    [{
      'indent': '-1'
    }, {
      'indent': '+1'
    }], // outdent/indent
    [{
      'direction': 'rtl'
    }], // text direction
    [{
      'header': [1, 2, 3, 4, 5, 6, false]
    }], [{
      'color': []
    }, {
      'background': []
    }], // dropdown with defaults from theme
    [{
      'align': []
    }], ['link', 'image'], ['clean'] // remove formatting button
    ]
  }
});

/***/ }),

    /***/ 5:
/*!*****************************************************!*\
  !*** multi ./resources/js/Article/ArticleCreate.js ***!
  \*****************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! Z:\OSPanel\domains\proj.loc\resources\js\Article\ArticleCreate.js */"./resources/js/Article/ArticleCreate.js");


/***/ })

/******/ });
