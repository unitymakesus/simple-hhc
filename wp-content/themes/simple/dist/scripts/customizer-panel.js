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
/******/ 	__webpack_require__.p = "/wp-content/themes/simple/dist/";
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 13);
/******/ })
/************************************************************************/
/******/ ({

/***/ 0:
/***/ (function(module, exports) {

module.exports = jQuery;

/***/ }),

/***/ 13:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(14);


/***/ }),

/***/ 14:
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
Object.defineProperty(__webpack_exports__, "__esModule", { value: true });
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery__ = __webpack_require__(0);
/* harmony import */ var __WEBPACK_IMPORTED_MODULE_0_jquery___default = __webpack_require__.n(__WEBPACK_IMPORTED_MODULE_0_jquery__);


wp.customize.bind('ready', function() {
  function hideShowColorOptions() {
    var selectedColor = wp.customize.instance( 'theme_color' ).get(); // eslint-disable-line no-unused-vars
    var neutral = ['sparent', '#000000', '#FFFFFF']
    var themes = {
      'bright'    : ['#2E827C', '#2EC4B6', '#FF9F1C', '#FFBF69', '#FFF7ED'],
      'chrome'    : ['#47474C', '#66666E', '#9999A1', '#C5C5CC', '#F9F9FC'],
      'executive' : ['#001514', '#6B0504', '#A3320B', '#E6AF2E', '#FBFFFE'],
      'grass'     : ['#114B5F', '#1A936F', '#88D498', '#C6DABF', '#F3E9D2'],
      'ocean'     : ['#00171F', '#003459', '#007EA7', '#00A8E8', '#CEE0E8'],
      'sunrise'   : ['#CC5803', '#E2711D', '#FF9505', '#FFB627', '#FFF1DB'],
    }

    __WEBPACK_IMPORTED_MODULE_0_jquery___default()('.o2-color-palette-group label[for*="simple_header"]').each(function() {
      var hex = __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).attr('for').slice(-7);

      if (__WEBPACK_IMPORTED_MODULE_0_jquery___default.a.inArray(hex, themes[selectedColor]) >= 0 || __WEBPACK_IMPORTED_MODULE_0_jquery___default.a.inArray(hex, neutral) >= 0) {
        __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).show();
      } else {
        __WEBPACK_IMPORTED_MODULE_0_jquery___default()(this).hide();
      }
    });
  }

  // Call this function on page load
  hideShowColorOptions();

  // ... and on radio button change
  __WEBPACK_IMPORTED_MODULE_0_jquery___default()( 'input[name="o2_color_palette_simple_theme_color"]' ).on( 'change', hideShowColorOptions );

});


/***/ })

/******/ });
//# sourceMappingURL=customizer-panel.js.map