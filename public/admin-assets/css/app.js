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
/******/ 	return __webpack_require__(__webpack_require__.s = 91);
/******/ })
/************************************************************************/
/******/ ({

/***/ 13:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
// css base code, injected by the css-loader
module.exports = function() {
	var list = [];

	// return the list of modules as css string
	list.toString = function toString() {
		var result = [];
		for(var i = 0; i < this.length; i++) {
			var item = this[i];
			if(item[2]) {
				result.push("@media " + item[2] + "{" + item[1] + "}");
			} else {
				result.push(item[1]);
			}
		}
		return result.join("");
	};

	// import a list of modules into the list
	list.i = function(modules, mediaQuery) {
		if(typeof modules === "string")
			modules = [[null, modules, ""]];
		var alreadyImportedModules = {};
		for(var i = 0; i < this.length; i++) {
			var id = this[i][0];
			if(typeof id === "number")
				alreadyImportedModules[id] = true;
		}
		for(i = 0; i < modules.length; i++) {
			var item = modules[i];
			// skip already imported module
			// this implementation is not 100% perfect for weird media query combinations
			//  when a module is imported multiple times with different media queries.
			//  I hope this will never occur (Hey this way we have smaller bundles)
			if(typeof item[0] !== "number" || !alreadyImportedModules[item[0]]) {
				if(mediaQuery && !item[2]) {
					item[2] = mediaQuery;
				} else if(mediaQuery) {
					item[2] = "(" + item[2] + ") and (" + mediaQuery + ")";
				}
				list.push(item);
			}
		}
	};
	return list;
};


/***/ }),

/***/ 23:
/***/ (function(module, exports, __webpack_require__) {

// style-loader: Adds some css to the DOM by adding a <style> tag

// load the styles
var content = __webpack_require__(55);
if(typeof content === 'string') content = [[module.i, content, '']];
// add the styles to the DOM
var update = __webpack_require__(60)(content, {});
if(content.locals) module.exports = content.locals;
// Hot Module Replacement
if(false) {
	// When the styles change, update the <style> tags
	if(!content.locals) {
		module.hot.accept("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/sass-loader/lib/loader.js!./app.scss", function() {
			var newContent = require("!!../../../../../../node_modules/css-loader/index.js!../../../../../../node_modules/sass-loader/lib/loader.js!./app.scss");
			if(typeof newContent === 'string') newContent = [[module.id, newContent, '']];
			update(newContent);
		});
	}
	// When the module is disposed, remove the <style> tags
	module.hot.dispose(function() { update(); });
}

/***/ }),

/***/ 55:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(13)();
exports.i(__webpack_require__(56), "");
exports.push([module.i, "/*! normalize.css v3.0.3 | MIT License | github.com/necolas/normalize.css */\n/**\r\n * 1. Set default font family to sans-serif.\r\n * 2. Prevent iOS and IE text size adjust after device orientation change,\r\n *    without disabling user zoom.\r\n */\n\nhtml {\n  font-family: sans-serif;\n  /* 1 */\n  -ms-text-size-adjust: 100%;\n  /* 2 */\n  -webkit-text-size-adjust: 100%;\n  /* 2 */ }\n\n/**\r\n * Remove default margin.\r\n */\nbody {\n  margin: 0; }\n\n/* HTML5 display definitions\r\n   ========================================================================== */\n/**\r\n * Correct `block` display not defined for any HTML5 element in IE 8/9.\r\n * Correct `block` display not defined for `details` or `summary` in IE 10/11\r\n * and Firefox.\r\n * Correct `block` display not defined for `main` in IE 11.\r\n */\narticle,\naside,\ndetails,\nfigcaption,\nfigure,\nfooter,\nheader,\nhgroup,\nmain,\nmenu,\nnav,\nsection,\nsummary {\n  display: block; }\n\n/**\r\n * 1. Correct `inline-block` display not defined in IE 8/9.\r\n * 2. Normalize vertical alignment of `progress` in Chrome, Firefox, and Opera.\r\n */\naudio,\ncanvas,\nprogress,\nvideo {\n  display: inline-block;\n  /* 1 */\n  vertical-align: baseline;\n  /* 2 */ }\n\n/**\r\n * Prevent modern browsers from displaying `audio` without controls.\r\n * Remove excess height in iOS 5 devices.\r\n */\naudio:not([controls]) {\n  display: none;\n  height: 0; }\n\n/**\r\n * Address `[hidden]` styling not present in IE 8/9/10.\r\n * Hide the `template` element in IE 8/9/10/11, Safari, and Firefox < 22.\r\n */\n[hidden],\ntemplate {\n  display: none; }\n\n/* Links\r\n   ========================================================================== */\n/**\r\n * Remove the gray background color from active links in IE 10.\r\n */\na {\n  background-color: transparent; }\n\n/**\r\n * Improve readability of focused elements when they are also in an\r\n * active/hover state.\r\n */\na:active,\na:hover {\n  outline: 0; }\n\n/* Text-level semantics\r\n   ========================================================================== */\n/**\r\n * Address styling not present in IE 8/9/10/11, Safari, and Chrome.\r\n */\nabbr[title] {\n  border-bottom: 1px dotted; }\n\n/**\r\n * Address style set to `bolder` in Firefox 4+, Safari, and Chrome.\r\n */\nb,\nstrong {\n  font-weight: bold; }\n\n/**\r\n * Address styling not present in Safari and Chrome.\r\n */\ndfn {\n  font-style: italic; }\n\n/**\r\n * Address variable `h1` font-size and margin within `section` and `article`\r\n * contexts in Firefox 4+, Safari, and Chrome.\r\n */\nh1 {\n  font-size: 2em;\n  margin: 0.67em 0; }\n\n/**\r\n * Address styling not present in IE 8/9.\r\n */\nmark {\n  background: #ff0;\n  color: #000; }\n\n/**\r\n * Address inconsistent and variable font size in all browsers.\r\n */\nsmall {\n  font-size: 80%; }\n\n/**\r\n * Prevent `sub` and `sup` affecting `line-height` in all browsers.\r\n */\nsub,\nsup {\n  font-size: 75%;\n  line-height: 0;\n  position: relative;\n  vertical-align: baseline; }\n\nsup {\n  top: -0.5em; }\n\nsub {\n  bottom: -0.25em; }\n\n/* Embedded content\r\n   ========================================================================== */\n/**\r\n * Remove border when inside `a` element in IE 8/9/10.\r\n */\nimg {\n  border: 0; }\n\n/**\r\n * Correct overflow not hidden in IE 9/10/11.\r\n */\nsvg:not(:root) {\n  overflow: hidden; }\n\n/* Grouping content\r\n   ========================================================================== */\n/**\r\n * Address margin not present in IE 8/9 and Safari.\r\n */\nfigure {\n  margin: 1em 40px; }\n\n/**\r\n * Address differences between Firefox and other browsers.\r\n */\nhr {\n  box-sizing: content-box;\n  height: 0; }\n\n/**\r\n * Contain overflow in all browsers.\r\n */\npre {\n  overflow: auto; }\n\n/**\r\n * Address odd `em`-unit font size rendering in all browsers.\r\n */\ncode,\nkbd,\npre,\nsamp {\n  font-family: monospace, monospace;\n  font-size: 1em; }\n\n/* Forms\r\n   ========================================================================== */\n/**\r\n * Known limitation: by default, Chrome and Safari on OS X allow very limited\r\n * styling of `select`, unless a `border` property is set.\r\n */\n/**\r\n * 1. Correct color not being inherited.\r\n *    Known issue: affects color of disabled elements.\r\n * 2. Correct font properties not being inherited.\r\n * 3. Address margins set differently in Firefox 4+, Safari, and Chrome.\r\n */\nbutton,\ninput,\noptgroup,\nselect,\ntextarea {\n  color: inherit;\n  /* 1 */\n  font: inherit;\n  /* 2 */\n  margin: 0;\n  /* 3 */ }\n\n/**\r\n * Address `overflow` set to `hidden` in IE 8/9/10/11.\r\n */\nbutton {\n  overflow: visible; }\n\n/**\r\n * Address inconsistent `text-transform` inheritance for `button` and `select`.\r\n * All other form control elements do not inherit `text-transform` values.\r\n * Correct `button` style inheritance in Firefox, IE 8/9/10/11, and Opera.\r\n * Correct `select` style inheritance in Firefox.\r\n */\nbutton,\nselect {\n  text-transform: none; }\n\n/**\r\n * 1. Avoid the WebKit bug in Android 4.0.* where (2) destroys native `audio`\r\n *    and `video` controls.\r\n * 2. Correct inability to style clickable `input` types in iOS.\r\n * 3. Improve usability and consistency of cursor style between image-type\r\n *    `input` and others.\r\n */\nbutton,\nhtml input[type=\"button\"],\ninput[type=\"reset\"],\ninput[type=\"submit\"] {\n  -webkit-appearance: button;\n  /* 2 */\n  cursor: pointer;\n  /* 3 */ }\n\n/**\r\n * Re-set default cursor for disabled elements.\r\n */\nbutton[disabled],\nhtml input[disabled] {\n  cursor: default; }\n\n/**\r\n * Remove inner padding and border in Firefox 4+.\r\n */\nbutton::-moz-focus-inner,\ninput::-moz-focus-inner {\n  border: 0;\n  padding: 0; }\n\n/**\r\n * Address Firefox 4+ setting `line-height` on `input` using `!important` in\r\n * the UA stylesheet.\r\n */\ninput {\n  line-height: normal; }\n\n/**\r\n * It's recommended that you don't attempt to style these elements.\r\n * Firefox's implementation doesn't respect box-sizing, padding, or width.\r\n *\r\n * 1. Address box sizing set to `content-box` in IE 8/9/10.\r\n * 2. Remove excess padding in IE 8/9/10.\r\n */\ninput[type=\"checkbox\"],\ninput[type=\"radio\"] {\n  box-sizing: border-box;\n  /* 1 */\n  padding: 0;\n  /* 2 */ }\n\n/**\r\n * Fix the cursor style for Chrome's increment/decrement buttons. For certain\r\n * `font-size` values of the `input`, it causes the cursor style of the\r\n * decrement button to change from `default` to `text`.\r\n */\ninput[type=\"number\"]::-webkit-inner-spin-button,\ninput[type=\"number\"]::-webkit-outer-spin-button {\n  height: auto; }\n\n/**\r\n * 1. Address `appearance` set to `searchfield` in Safari and Chrome.\r\n * 2. Address `box-sizing` set to `border-box` in Safari and Chrome.\r\n */\ninput[type=\"search\"] {\n  -webkit-appearance: textfield;\n  /* 1 */\n  box-sizing: content-box;\n  /* 2 */ }\n\n/**\r\n * Remove inner padding and search cancel button in Safari and Chrome on OS X.\r\n * Safari (but not Chrome) clips the cancel button when the search input has\r\n * padding (and `textfield` appearance).\r\n */\ninput[type=\"search\"]::-webkit-search-cancel-button,\ninput[type=\"search\"]::-webkit-search-decoration {\n  -webkit-appearance: none; }\n\n/**\r\n * Define consistent border, margin, and padding.\r\n */\nfieldset {\n  border: 1px solid #c0c0c0;\n  margin: 0 2px;\n  padding: 0.35em 0.625em 0.75em; }\n\n/**\r\n * 1. Correct `color` not being inherited in IE 8/9/10/11.\r\n * 2. Remove padding so people aren't caught out if they zero out fieldsets.\r\n */\nlegend {\n  border: 0;\n  /* 1 */\n  padding: 0;\n  /* 2 */ }\n\n/**\r\n * Remove default vertical scrollbar in IE 8/9/10/11.\r\n */\ntextarea {\n  overflow: auto; }\n\n/**\r\n * Don't inherit the `font-weight` (applied by a rule above).\r\n * NOTE: the default cannot safely be changed in Chrome and Safari on OS X.\r\n */\noptgroup {\n  font-weight: bold; }\n\n/* Tables\r\n   ========================================================================== */\n/**\r\n * Remove most spacing between table cells.\r\n */\ntable {\n  border-collapse: collapse;\n  border-spacing: 0; }\n\ntd,\nth {\n  padding: 0; }\n\n.container {\n  margin: 0 auto;\n  max-width: 1302px;\n  width: 90%; }\n\n.container .row {\n  margin-left: -8px;\n  margin-right: -8px; }\n\n.section {\n  padding-top: 1rem;\n  padding-bottom: 1rem; }\n  .section.no-pad {\n    padding: 0; }\n  .section.no-pad-bot {\n    padding-bottom: 0; }\n  .section.no-pad-top {\n    padding-top: 0; }\n\n.row {\n  margin-left: auto;\n  margin-right: auto;\n  margin-bottom: 10px; }\n  .row:after {\n    content: \"\";\n    display: table;\n    clear: both; }\n  .row .col {\n    float: left;\n    box-sizing: border-box;\n    padding: 0 8px; }\n    .row .col.np {\n      padding-left: 0;\n      padding-right: 0; }\n    .row .col[class*=\"push-\"], .row .col[class*=\"pull-\"] {\n      position: relative; }\n    .row .col.s1 {\n      width: 8.33333%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s2 {\n      width: 16.66667%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s3 {\n      width: 25%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s4 {\n      width: 33.33333%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s5 {\n      width: 41.66667%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s6 {\n      width: 50%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s7 {\n      width: 58.33333%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s8 {\n      width: 66.66667%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s9 {\n      width: 75%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s10 {\n      width: 83.33333%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s11 {\n      width: 91.66667%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.s12 {\n      width: 100%;\n      margin-left: auto;\n      left: auto;\n      right: auto; }\n    .row .col.offset-s1 {\n      margin-left: 8.33333%; }\n    .row .col.pull-s1 {\n      right: 8.33333%; }\n    .row .col.push-s1 {\n      left: 8.33333%; }\n    .row .col.offset-s2 {\n      margin-left: 16.66667%; }\n    .row .col.pull-s2 {\n      right: 16.66667%; }\n    .row .col.push-s2 {\n      left: 16.66667%; }\n    .row .col.offset-s3 {\n      margin-left: 25%; }\n    .row .col.pull-s3 {\n      right: 25%; }\n    .row .col.push-s3 {\n      left: 25%; }\n    .row .col.offset-s4 {\n      margin-left: 33.33333%; }\n    .row .col.pull-s4 {\n      right: 33.33333%; }\n    .row .col.push-s4 {\n      left: 33.33333%; }\n    .row .col.offset-s5 {\n      margin-left: 41.66667%; }\n    .row .col.pull-s5 {\n      right: 41.66667%; }\n    .row .col.push-s5 {\n      left: 41.66667%; }\n    .row .col.offset-s6 {\n      margin-left: 50%; }\n    .row .col.pull-s6 {\n      right: 50%; }\n    .row .col.push-s6 {\n      left: 50%; }\n    .row .col.offset-s7 {\n      margin-left: 58.33333%; }\n    .row .col.pull-s7 {\n      right: 58.33333%; }\n    .row .col.push-s7 {\n      left: 58.33333%; }\n    .row .col.offset-s8 {\n      margin-left: 66.66667%; }\n    .row .col.pull-s8 {\n      right: 66.66667%; }\n    .row .col.push-s8 {\n      left: 66.66667%; }\n    .row .col.offset-s9 {\n      margin-left: 75%; }\n    .row .col.pull-s9 {\n      right: 75%; }\n    .row .col.push-s9 {\n      left: 75%; }\n    .row .col.offset-s10 {\n      margin-left: 83.33333%; }\n    .row .col.pull-s10 {\n      right: 83.33333%; }\n    .row .col.push-s10 {\n      left: 83.33333%; }\n    .row .col.offset-s11 {\n      margin-left: 91.66667%; }\n    .row .col.pull-s11 {\n      right: 91.66667%; }\n    .row .col.push-s11 {\n      left: 91.66667%; }\n    .row .col.offset-s12 {\n      margin-left: 100%; }\n    .row .col.pull-s12 {\n      right: 100%; }\n    .row .col.push-s12 {\n      left: 100%; }\n    .row .col.center {\n      float: none;\n      margin-left: auto;\n      margin-right: auto; }\n\n@font-face {\n  font-family: 'Raleway';\n  font-weight: normal;\n  font-style: normal;\n  src: url(\"/admin-assets/fonts//Raleway/Raleway-Regular.ttf\"); }\n\n@font-face {\n  font-family: 'Raleway';\n  src: url(\"/admin-assets/fonts//Raleway/Raleway-Medium.ttf\");\n  font-weight: 500;\n  font-style: normal; }\n\n@font-face {\n  font-family: 'Raleway';\n  src: url(\"/admin-assets/fonts//Raleway/Raleway-Bold.ttf\");\n  font-weight: bold;\n  font-style: normal; }\n\na {\n  text-decoration: none;\n  color: #3f51b5; }\n\n.clear {\n  display: block;\n  clear: both;\n  visibility: hidden; }\n\n.clearfix:after {\n  content: \"\";\n  display: block;\n  clear: both;\n  visibility: hidden; }\n\n.center-block {\n  margin-left: auto;\n  margin-right: auto;\n  display: block; }\n\ni.icon {\n  background-size: contain;\n  background-repeat: no-repeat;\n  display: inline-block;\n  font-family: FontAwesome;\n  font-weight: normal;\n  font-style: normal; }\n  i.icon.icon--point::after {\n    content: \"\\f10c\"; }\n  i.icon.icon--menu::after {\n    content: \"\\f0c9\"; }\n  i.icon.icon--close::after {\n    content: \"\\f00d\"; }\n  i.icon.icon--language::after {\n    content: \"\\f0ac\"; }\n  i.icon.icon--settings::after {\n    content: \"\\f085\"; }\n  i.icon.icon--exit::after {\n    content: \"\\f08b\"; }\n  i.icon.icon--caret::after {\n    content: \"\\f107\"; }\n  i.icon.icon--add::after {\n    content: \"\\f067\"; }\n  i.icon.icon--active-panel-back {\n    background-image: url(\"/admin-assets/img/icons/active-panel-back.svg\"); }\n  i.icon.icon--active-panel-export {\n    background-image: url(\"/admin-assets/img/icons/active-panel-export.svg\"); }\n  i.icon.icon--active-panel-copy {\n    background-image: url(\"/admin-assets/img/icons/active-panel-copy.svg\"); }\n  i.icon.icon--delete::after {\n    content: \"\\f1f8\"; }\n\n.popup-mask {\n  position: fixed;\n  z-index: 9998;\n  top: 0;\n  left: 0;\n  width: 100%;\n  height: 100%;\n  background-color: rgba(0, 0, 0, 0.5);\n  display: table;\n  -webkit-transition: opacity 0.3s ease;\n  -moz-transition: opacity 0.3s ease;\n  -o-transition: opacity 0.3s ease;\n  -ms-transition: opacity 0.3s ease;\n  transition: opacity 0.3s ease; }\n\n.popup-wrapper {\n  display: table-cell;\n  vertical-align: middle; }\n\n.popup-container {\n  width: 300px;\n  margin: 0px auto;\n  padding: 20px 30px;\n  background: #FFF;\n  border-radius: 2px;\n  transition: all .3s ease;\n  position: relative;\n  -webkit-box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);\n  -moz-box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);\n  -ms-box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);\n  -o-box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33);\n  box-shadow: 0 2px 8px rgba(0, 0, 0, 0.33); }\n\n.popup-close {\n  position: absolute;\n  top: 4px;\n  right: 4px;\n  padding: 0;\n  margin: 0;\n  width: 30px;\n  height: 30px;\n  font: 21px/1 Arial,Helvetica Neue,Helvetica,sans-serif;\n  line-height: 30px;\n  color: #888;\n  font-weight: 300;\n  text-align: center;\n  border-radius: 50%;\n  border-width: 0;\n  cursor: pointer;\n  background: #fff;\n  box-sizing: border-box;\n  z-index: 2;\n  will-change: background, color;\n  -webkit-transition: background 0.2s;\n  -moz-transition: background 0.2s;\n  -o-transition: background 0.2s;\n  -ms-transition: background 0.2s;\n  transition: background 0.2s; }\n  .popup-close:hover {\n    color: #555;\n    background: #eee; }\n\npopup {\n  display: none; }\n\n/*\r\n * The following styles are auto-applied to elements with\r\n * transition=\"popup\" when their visibility is toggled\r\n * by Vue.js.\r\n *\r\n * You can easily play with the popup transition by editing\r\n * these styles.\r\n */\n.popup-enter {\n  opacity: 0; }\n\n.popup-leave-active {\n  opacity: 0; }\n\n.popup-enter .popup-container,\n.popup-leave-active .popup-container {\n  -webkit-transform: scale(1.1);\n  -moz-transform: scale(1.1);\n  -ms-transform: scale(1.1);\n  -o-transform: scale(1.1);\n  transform: scale(1.1); }\n\n.button {\n  font-size: 1.5rem;\n  color: #555;\n  border: 1px solid #e6e6e6;\n  border-radius: 2px;\n  background-color: #FFF;\n  padding: 0 2rem;\n  height: 4.2rem;\n  line-height: 4rem;\n  box-sizing: border-box;\n  outline: none;\n  cursor: pointer;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n  .button:focus, .button:hover {\n    background-color: #f7f7f7; }\n\na.button {\n  display: inline-block; }\n\n.button--primary {\n  color: #FFF;\n  background-color: #3f51b5;\n  border-color: #3f51b5; }\n  .button--primary:focus, .button--primary:hover {\n    background-color: #3a4aa6; }\n  .button--primary.button--loading::after {\n    background-color: #FFF; }\n\n.button--success {\n  color: #FFF;\n  background-color: #66BB6A;\n  border-color: #66BB6A; }\n  .button--success:focus, .button--success:hover {\n    background-color: #58b55c; }\n  .button--success.button--loading::after {\n    background-color: #FFF; }\n\n.button--danger {\n  color: #FFF;\n  background-color: #FF6E58;\n  border-color: #FF6E58; }\n  .button--danger:focus, .button--danger:hover {\n    background-color: #ff5c44; }\n  .button--danger.button--loading::after {\n    background-color: #FFF; }\n\n.button--warning {\n  color: #555;\n  background-color: #fff494;\n  border-color: #fff494; }\n  .button--warning:focus, .button--warning:hover {\n    background-color: #fff280; }\n\n.button--info {\n  color: #FFF;\n  background-color: #81D4FA;\n  border-color: #81D4FA; }\n  .button--info:focus, .button--info:hover {\n    background-color: #6dcdf9; }\n  .button--info.button--loading::after {\n    background-color: #FFF; }\n\n.button--loading {\n  position: relative;\n  text-indent: -9999px; }\n  .button--loading::after {\n    content: \"\";\n    position: absolute;\n    width: 8px;\n    height: 8px;\n    background-color: #555;\n    border-radius: 50%;\n    top: 50%;\n    left: 50%;\n    margin: -4px 0 0 -4px;\n    -webkit-animation: loader-flip 2s infinite;\n    -moz-animation: loader-flip 2s infinite;\n    -ms-animation: loader-flip 2s infinite;\n    -o-animation: loader-flip 2s infinite;\n    animation: loader-flip 2s infinite; }\n\n@-webkit-keyframes loader-flip {\n  0%, 25%, 50%, 75%, 100% {\n    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1); }\n  0% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); }\n  25% {\n    -webkit-transform: rotateY(180deg) rotateX(0);\n    transform: rotateY(180deg) rotateX(0); }\n  50% {\n    -webkit-transform: rotateY(180deg) rotateX(180deg);\n    transform: rotateY(180deg) rotateX(180deg); }\n  75% {\n    -webkit-transform: rotateY(0) rotateX(180deg);\n    transform: rotateY(0) rotateX(180deg); }\n  100% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); } }\n\n@-moz-keyframes loader-flip {\n  0%, 25%, 50%, 75%, 100% {\n    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1); }\n  0% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); }\n  25% {\n    -webkit-transform: rotateY(180deg) rotateX(0);\n    transform: rotateY(180deg) rotateX(0); }\n  50% {\n    -webkit-transform: rotateY(180deg) rotateX(180deg);\n    transform: rotateY(180deg) rotateX(180deg); }\n  75% {\n    -webkit-transform: rotateY(0) rotateX(180deg);\n    transform: rotateY(0) rotateX(180deg); }\n  100% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); } }\n\n@-o-keyframes loader-flip {\n  0%, 25%, 50%, 75%, 100% {\n    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1); }\n  0% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); }\n  25% {\n    -webkit-transform: rotateY(180deg) rotateX(0);\n    transform: rotateY(180deg) rotateX(0); }\n  50% {\n    -webkit-transform: rotateY(180deg) rotateX(180deg);\n    transform: rotateY(180deg) rotateX(180deg); }\n  75% {\n    -webkit-transform: rotateY(0) rotateX(180deg);\n    transform: rotateY(0) rotateX(180deg); }\n  100% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); } }\n\n@keyframes loader-flip {\n  0%, 25%, 50%, 75%, 100% {\n    animation-timing-function: cubic-bezier(0, 0.5, 0.5, 1); }\n  0% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); }\n  25% {\n    -webkit-transform: rotateY(180deg) rotateX(0);\n    transform: rotateY(180deg) rotateX(0); }\n  50% {\n    -webkit-transform: rotateY(180deg) rotateX(180deg);\n    transform: rotateY(180deg) rotateX(180deg); }\n  75% {\n    -webkit-transform: rotateY(0) rotateX(180deg);\n    transform: rotateY(0) rotateX(180deg); }\n  100% {\n    -webkit-transform: rotateY(0) rotateX(0);\n    transform: rotateY(0) rotateX(0); } }\n\n.switcher {\n  width: 4rem;\n  height: 2rem;\n  position: relative;\n  display: inline-block;\n  vertical-align: middle; }\n  .switcher input {\n    width: 4rem;\n    height: 2rem;\n    opacity: 0;\n    cursor: pointer;\n    position: absolute;\n    top: 0;\n    left: 0;\n    z-index: 1; }\n    .switcher input:checked + .switcher__lever::after {\n      background-color: #3f51b5;\n      -webkit-transform: translate(2rem, 0);\n      -moz-transform: translate(2rem, 0);\n      -ms-transform: translate(2rem, 0);\n      -o-transform: translate(2rem, 0);\n      transform: translate(2rem, 0); }\n    .switcher input:checked + .switcher__lever::before {\n      background-color: #7280ce; }\n\n.switcher__lever::before {\n  content: \"\";\n  display: block;\n  width: 3rem;\n  height: 1rem;\n  background-color: #e6e6e6;\n  border-radius: 1rem;\n  position: absolute;\n  top: 0;\n  left: 0;\n  margin: 0.5rem;\n  -webkit-transition: background-color ease 0.15s;\n  -moz-transition: background-color ease 0.15s;\n  -o-transition: background-color ease 0.15s;\n  -ms-transition: background-color ease 0.15s;\n  transition: background-color ease 0.15s; }\n\n.switcher__lever::after {\n  content: \"\";\n  display: block;\n  width: 2rem;\n  height: 2rem;\n  background-color: #d9d9d9;\n  border-radius: 50%;\n  position: absolute;\n  top: 0;\n  left: 0;\n  -webkit-transition: transform ease 0.15s;\n  -moz-transition: transform ease 0.15s;\n  -o-transition: transform ease 0.15s;\n  -ms-transition: transform ease 0.15s;\n  transition: transform ease 0.15s; }\n\n.checkbox {\n  height: 1.6rem;\n  width: 1.6rem;\n  font-size: 1rem;\n  position: relative;\n  display: inline-block;\n  vertical-align: middle;\n  cursor: pointer;\n  text-align: left; }\n\n.checkbox__input {\n  opacity: 0;\n  height: 1.6rem;\n  width: 1.6rem;\n  position: absolute;\n  z-index: 1;\n  cursor: pointer; }\n\n.checkbox__label {\n  height: 1.6rem;\n  width: 1.6rem;\n  display: block;\n  border: 1px solid #BBB;\n  background-color: #FFF;\n  border-radius: 2px;\n  box-sizing: border-box;\n  -webkit-user-select: none;\n  -moz-user-select: none;\n  -ms-user-select: none;\n  -o-user-select: none;\n  user-select: none; }\n\n.checkbox__input:checked + .checkbox__label::after {\n  content: \"\\f00c\";\n  font-family: FontAwesome;\n  background-color: #3f51b5;\n  color: #FFF;\n  text-align: center;\n  line-height: 1.6rem;\n  width: 1.6rem;\n  display: block;\n  position: absolute;\n  top: 0;\n  left: 0;\n  border-radius: 2px;\n  font-weight: normal;\n  font-size: 0.95rem;\n  text-indent: -0.05rem; }\n\n.form__group {\n  font-size: 0;\n  margin-bottom: 16px; }\n\n.form__group--toggler .form__group__label {\n  display: inline-block;\n  vertical-align: middle;\n  margin-bottom: 2px;\n  margin-right: 8px;\n  cursor: pointer; }\n\n.form__group__label {\n  font-size: 1.3rem;\n  color: #555;\n  display: block;\n  line-height: 1;\n  margin-bottom: 8px;\n  font-weight: bold; }\n\n.form__group__input {\n  font-size: 1.3rem;\n  color: #555;\n  display: block;\n  width: 100%;\n  max-width: 400px;\n  min-width: 280px;\n  border: 1px solid #e6e6e6;\n  border-radius: 2px;\n  padding: 1rem;\n  height: 3.8rem;\n  line-height: 1;\n  box-sizing: border-box; }\n\n.form__group__input--small {\n  max-width: 120px;\n  min-width: 84px; }\n\n.form__group__input--large {\n  max-width: 800px;\n  min-width: 560px; }\n\n.form__group__input--full {\n  max-width: 100%; }\n\n.form__group__actions {\n  margin-top: 32px;\n  font-size: 0; }\n  .form__group__actions .button + .button {\n    margin-left: 16px; }\n  .form__group__actions .button--back {\n    float: right; }\n\n#alerts {\n  position: absolute;\n  top: 76px;\n  right: 16px;\n  max-width: 20%;\n  overflow: visible;\n  height: 0; }\n\n.alert {\n  font-size: 1.3rem;\n  color: #FFF;\n  border-radius: 2px;\n  background-color: #333;\n  padding: 1.5rem 2rem;\n  box-sizing: border-box;\n  outline: none;\n  cursor: pointer;\n  display: block;\n  margin-bottom: 16px;\n  white-space: nowrap;\n  -webkit-animation: showAlert 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -moz-animation: showAlert 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -ms-animation: showAlert 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -o-animation: showAlert 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  animation: showAlert 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -webkit-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -moz-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -o-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  -ms-transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55);\n  transition: all 0.4s cubic-bezier(0.68, -0.55, 0.27, 1.55); }\n\n.alert--primary {\n  background-color: #3f51b5; }\n\n.alert--success {\n  background-color: #66BB6A; }\n\n.alert--danger {\n  background-color: #FF6E58; }\n\n.alert--warning {\n  background-color: #fff494; }\n\n.alert--info {\n  background-color: #81D4FA; }\n\n.alert--hidden {\n  opacity: 0;\n  -webkit-transform: translate(150%, 0);\n  -moz-transform: translate(150%, 0);\n  -ms-transform: translate(150%, 0);\n  -o-transform: translate(150%, 0);\n  transform: translate(150%, 0);\n  position: absolute;\n  right: 0; }\n\n@-webkit-keyframes showAlert {\n  0% {\n    -webkit-transform: translate(150%, 0);\n    -moz-transform: translate(150%, 0);\n    -ms-transform: translate(150%, 0);\n    -o-transform: translate(150%, 0);\n    transform: translate(150%, 0); }\n  100% {\n    -webkit-transform: translate(0, 0);\n    -moz-transform: translate(0, 0);\n    -ms-transform: translate(0, 0);\n    -o-transform: translate(0, 0);\n    transform: translate(0, 0); } }\n\n@-moz-keyframes showAlert {\n  0% {\n    -webkit-transform: translate(150%, 0);\n    -moz-transform: translate(150%, 0);\n    -ms-transform: translate(150%, 0);\n    -o-transform: translate(150%, 0);\n    transform: translate(150%, 0); }\n  100% {\n    -webkit-transform: translate(0, 0);\n    -moz-transform: translate(0, 0);\n    -ms-transform: translate(0, 0);\n    -o-transform: translate(0, 0);\n    transform: translate(0, 0); } }\n\n@-o-keyframes showAlert {\n  0% {\n    -webkit-transform: translate(150%, 0);\n    -moz-transform: translate(150%, 0);\n    -ms-transform: translate(150%, 0);\n    -o-transform: translate(150%, 0);\n    transform: translate(150%, 0); }\n  100% {\n    -webkit-transform: translate(0, 0);\n    -moz-transform: translate(0, 0);\n    -ms-transform: translate(0, 0);\n    -o-transform: translate(0, 0);\n    transform: translate(0, 0); } }\n\n@keyframes showAlert {\n  0% {\n    -webkit-transform: translate(150%, 0);\n    -moz-transform: translate(150%, 0);\n    -ms-transform: translate(150%, 0);\n    -o-transform: translate(150%, 0);\n    transform: translate(150%, 0); }\n  100% {\n    -webkit-transform: translate(0, 0);\n    -moz-transform: translate(0, 0);\n    -ms-transform: translate(0, 0);\n    -o-transform: translate(0, 0);\n    transform: translate(0, 0); } }\n\n.card {\n  background-color: #FFF;\n  border-radius: 2px;\n  -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -ms-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -o-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); }\n\n.card__header {\n  border-bottom: 1px solid #e6e6e6;\n  min-height: 4rem; }\n  .card__header .select {\n    margin: 0.4rem; }\n\n.card--list .pagination {\n  float: right; }\n\n.card--form {\n  display: inline-block; }\n  .card--form .card__header h2 {\n    margin: 0;\n    line-height: 5rem;\n    font-size: 1.6rem;\n    padding: 0 16px; }\n  .card--form .form {\n    padding: 16px; }\n\n.data-table {\n  width: 100%; }\n  .data-table td {\n    vertical-align: middle; }\n\n.data-table--fixed {\n  table-layout: fixed; }\n\n.data-table__titles {\n  font-weight: bold;\n  border-bottom: 1px solid #e6e6e6; }\n\n.data-table__titles__title {\n  font-size: 1em;\n  height: 4rem; }\n\n.data-table__values__value, .data-table__titles__title {\n  padding: 0 16px; }\n\n/*.data-table__values {\r\n\t&:nth-child(even) td {\r\n\t\tbackground-color: darken($card-background-color, 3%);\r\n\t}\r\n}*/\n.data-table__values__value {\n  font-size: 1em;\n  height: 4rem; }\n\n.data-table__values__value__link {\n  font-weight: bold;\n  font-size: 1.1em;\n  line-height: 2.22222rem;\n  display: inline-block;\n  box-sizing: border-box; }\n  .data-table__values__value__link::after {\n    content: \"\";\n    display: block;\n    border-bottom: 1px solid #3f51b5;\n    width: 0;\n    height: 0;\n    margin-bottom: -1px;\n    -webkit-transition: width 0.15s ease-out;\n    -moz-transition: width 0.15s ease-out;\n    -o-transition: width 0.15s ease-out;\n    -ms-transition: width 0.15s ease-out;\n    transition: width 0.15s ease-out; }\n  .data-table__values__value__link:hover::after {\n    width: 100%; }\n\n.data-table__values--state-block .data-table__values__value {\n  opacity: 0.4; }\n  .data-table__values--state-block .data-table__values__value:last-child {\n    padding-right: 4rem;\n    position: relative; }\n    .data-table__values--state-block .data-table__values__value:last-child::after {\n      content: \"\";\n      background-image: url(\"/admin-assets/img/icons/invisible.svg\");\n      background-repeat: no-repeat;\n      background-size: 1.8rem;\n      background-position: center;\n      width: 4rem;\n      height: 4rem;\n      position: absolute;\n      right: 0;\n      top: 0; }\n\n.data-table__checkbox {\n  width: 4rem;\n  text-align: center;\n  cursor: pointer; }\n\n.pagination {\n  display: flex;\n  align-items: center; }\n\n.pagination__button {\n  width: 4rem;\n  height: 4rem;\n  line-height: 4rem;\n  box-sizing: border-box;\n  display: block;\n  cursor: pointer;\n  color: #333;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n\n.pagination__button--disabled {\n  cursor: default;\n  opacity: 0.4; }\n\n.pagination__button:not(.pagination__button--disabled):hover {\n  background-color: whitesmoke; }\n\n.pagination__button::after {\n  font-family: FontAwesome;\n  text-align: center;\n  display: block;\n  font-size: 1.2rem; }\n\n.pagination__button--prev {\n  margin-left: 16px; }\n\n.pagination__button--prev::after {\n  content: \"\\f053\";\n  text-indent: -1px; }\n\n.pagination__button--next::after {\n  content: \"\\f054\"; }\n\n.select {\n  display: inline-block;\n  position: relative;\n  z-index: 2;\n  -webkit-user-select: none;\n  -moz-user-select: none;\n  -ms-user-select: none;\n  -o-user-select: none;\n  user-select: none; }\n\n.select__input {\n  display: none; }\n\n.select__value, select.select {\n  font-size: 1.3rem;\n  border-radius: 2px;\n  border: 1px solid #e6e6e6;\n  padding: 0 3.2rem 0 1rem;\n  height: 3.2rem;\n  line-height: 3.2rem;\n  cursor: pointer;\n  position: relative;\n  box-sizing: border-box;\n  z-index: 2;\n  -webkit-transition: box-shadow 0.15s ease-out;\n  -moz-transition: box-shadow 0.15s ease-out;\n  -o-transition: box-shadow 0.15s ease-out;\n  -ms-transition: box-shadow 0.15s ease-out;\n  transition: box-shadow 0.15s ease-out; }\n  .select__value::after, select.select::after {\n    content: \"\\f107\";\n    display: block;\n    font-family: FontAwesome;\n    height: 3.2rem;\n    width: 3.2rem;\n    text-align: center;\n    position: absolute;\n    top: 0;\n    right: 0; }\n\n.select__value--active {\n  -webkit-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);\n  -moz-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);\n  -ms-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);\n  -o-box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3);\n  box-shadow: 0 1px 1px rgba(0, 0, 0, 0.3); }\n\nselect.select {\n  width: auto;\n  opacity: 0; }\n\n.select__values {\n  font-size: 1.3rem;\n  border-radius: 2px;\n  border: 1px solid #e6e6e6;\n  position: absolute;\n  top: 100%;\n  left: 0;\n  margin-top: -1px;\n  background-color: #FFF;\n  z-index: 1;\n  max-height: 25.6rem;\n  overflow: auto;\n  box-sizing: border-box;\n  max-width: 250px;\n  display: none; }\n\n.select__values__option {\n  display: block;\n  box-sizing: border-box;\n  width: 100%;\n  white-space: nowrap;\n  text-overflow: ellipsis;\n  overflow: hidden;\n  cursor: pointer;\n  padding: 0 3.2rem 0 1rem;\n  line-height: 3.2rem;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n  .select__values__option:hover {\n    background-color: #f7f7f7; }\n\n.select__values__option--active {\n  font-weight: bold; }\n\n.transition__slide-fade--transition {\n  -webkit-transition: all 0.15s ease;\n  -moz-transition: all 0.15s ease;\n  -o-transition: all 0.15s ease;\n  -ms-transition: all 0.15s ease;\n  transition: all 0.15s ease; }\n\n.transition__slide-fade--leave {\n  transform: translateY(10px);\n  opacity: 0; }\n\n.transition__slide-fade--active {\n  display: block; }\n\n.transition__slide-fade--enter {\n  transform: translateY(0);\n  opacity: 1; }\n\n.active-panel {\n  background-color: #5A69C6;\n  margin: -16px -16px -51px;\n  padding: 32px 16px 83px;\n  color: #FFF;\n  display: flex;\n  align-items: center;\n  justify-content: space-between; }\n\n.active-panel__caption {\n  font-size: 1.8rem;\n  margin: 0 auto 0 0;\n  font-weight: normal; }\n  .active-panel__caption small {\n    font-weight: bold;\n    margin-left: 16px; }\n\n.active-panel__button {\n  width: 40px;\n  height: 40px;\n  cursor: pointer;\n  display: block;\n  margin: -10px 0;\n  border-radius: 2px;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n  .active-panel__button:hover {\n    background-color: #4f5fc2; }\n  .active-panel__button .icon {\n    width: 20px;\n    height: 20px;\n    margin: 10px; }\n\n.active-panel__button + .active-panel__button {\n  margin-left: 16px; }\n\n.active-panel__button:last-child {\n  margin-right: -10px; }\n\n.active-panel__button--back {\n  margin-left: -9px;\n  margin-right: 7px; }\n\nhtml {\n  font-size: 10px; }\n\nbody {\n  display: block;\n  font-family: \"Raleway\", sans-serif;\n  font-size: 1.3rem;\n  color: #333;\n  background-color: #F1F1F1;\n  min-width: 1270px;\n  position: absolute;\n  top: 0;\n  bottom: 0;\n  right: 0;\n  left: 0;\n  overflow-x: hidden;\n  font-feature-settings: 'lnum';\n  -moz-font-feature-settings: 'lnum=1';\n  -ms-font-feature-settings: 'lnum';\n  -webkit-font-feature-settings: 'lnum';\n  -o-font-feature-settings: 'lnum'; }\n\n#app {\n  position: absolute;\n  top: 0;\n  bottom: 0;\n  right: 0;\n  left: 0; }\n  #app:not(.no-sidebar) {\n    padding-left: 26rem; }\n  #app:not(.no-header) {\n    padding-top: 60px; }\n\n#content {\n  padding: 16px; }\n\n#header {\n  position: fixed;\n  top: 0;\n  left: 0;\n  right: 0;\n  background: #FFF;\n  height: 60px;\n  z-index: 99;\n  display: flex;\n  justify-content: flex-end;\n  -webkit-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -moz-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -ms-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  -o-box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);\n  box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1); }\n\n.header__sitename {\n  height: 60px;\n  width: 26rem; }\n  .header__sitename img {\n    margin: 14px;\n    width: 32px;\n    height: 32px;\n    float: left; }\n\n.header__sitename__link {\n  line-height: 60px;\n  display: inline-block;\n  font-weight: bold;\n  font-size: 1.5rem;\n  color: #333;\n  padding-right: 16px; }\n\n.header__translation, .header__settings, .header__exit, .header__language {\n  width: 60px;\n  height: 60px;\n  line-height: 60px;\n  text-align: center;\n  display: block;\n  font-weight: bold;\n  font-size: 1.5rem;\n  color: #333;\n  cursor: pointer;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n  .header__translation:hover, .header__settings:hover, .header__exit:hover, .header__language:hover {\n    background-color: whitesmoke; }\n\n.header__language {\n  width: auto;\n  padding: 0 16px;\n  text-transform: uppercase; }\n\n.header__language__caret {\n  margin-left: 8px; }\n\n.header__user {\n  height: 60px;\n  line-height: 60px;\n  display: block;\n  font-weight: bold;\n  font-size: 1.5rem;\n  color: #333;\n  padding: 0 16px;\n  cursor: default; }\n\n.header__navigation {\n  margin-left: 16px;\n  margin-right: auto;\n  align-self: center; }\n\n.header__path {\n  font-size: 1.3rem;\n  font-weight: 500;\n  text-transform: uppercase;\n  display: inline-block;\n  vertical-align: middle; }\n\n.header__path__item + .header__path__item::before {\n  content: \"\\f105\";\n  font-family: FontAwesome;\n  font-size: 1.6rem;\n  line-height: 1.5rem;\n  display: inline-block;\n  vertical-align: top;\n  margin: 0 6px 0 5px; }\n\n.header__add-item {\n  height: 34px;\n  line-height: 34px;\n  display: inline-block;\n  font-size: 1.3rem;\n  color: #3f51b5;\n  padding: 0 16px;\n  cursor: pointer;\n  border: 1px solid #3f51b5;\n  border-radius: 2px;\n  margin-left: 16px; }\n  .header__add-item .icon {\n    font-weight: normal;\n    margin-left: 10px;\n    display: none; }\n\n.sidebar {\n  width: 6rem;\n  background-color: #282F39;\n  height: 100%;\n  position: fixed;\n  top: 60px;\n  left: 0;\n  bottom: 0; }\n  .sidebar .icon {\n    color: #DDD; }\n\n.sidebar__item {\n  display: block;\n  width: 6rem;\n  height: 6rem;\n  line-height: 6rem;\n  text-align: center;\n  cursor: pointer;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n\n.sidebar__item--active, .sidebar__item:hover {\n  background-color: #3d4857; }\n\n.sidebar__children {\n  width: 20rem;\n  background-color: #31353E;\n  height: 100%;\n  position: fixed;\n  top: 60px;\n  left: 6rem;\n  bottom: 0;\n  display: none; }\n\n.sidebar__item:hover + .sidebar__children {\n  display: block;\n  z-index: 1; }\n\n.sidebar__children:hover {\n  display: block;\n  z-index: 1; }\n\n.sidebar__item--active + .sidebar__children {\n  display: block; }\n\n.sidebar__children__item {\n  display: block;\n  width: 100%;\n  box-sizing: border-box;\n  padding: 0 2rem;\n  height: 6rem;\n  line-height: 6rem;\n  text-align: left;\n  cursor: pointer;\n  color: #FFF;\n  overflow: hidden;\n  text-overflow: ellipsis;\n  white-space: nowrap;\n  -webkit-transition: background-color 0.15s ease-out;\n  -moz-transition: background-color 0.15s ease-out;\n  -o-transition: background-color 0.15s ease-out;\n  -ms-transition: background-color 0.15s ease-out;\n  transition: background-color 0.15s ease-out; }\n  .sidebar__children__item:hover {\n    background-color: #484d5a; }\n\n.login-block {\n  display: flex;\n  width: 100%;\n  height: 100%;\n  align-items: center;\n  justify-content: center; }\n  .login-block .form {\n    max-width: 320px;\n    width: 100%;\n    box-sizing: border-box;\n    background-color: #FFFFFF;\n    padding: 32px;\n    -webkit-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);\n    -moz-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);\n    -ms-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);\n    -o-box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2);\n    box-shadow: 0px 1px 1px rgba(0, 0, 0, 0.2); }\n  .login-block h1 {\n    margin: -32px -32px 32px;\n    padding: 48px 32px 16px;\n    background-color: #3f51b5;\n    color: #FFF;\n    font-size: 2.4rem;\n    font-weight: normal; }\n  .login-block .form__group--toggler {\n    float: right;\n    margin-top: 11px;\n    margin-bottom: 11px; }\n  .login-block .form__group__label {\n    font-weight: normal; }\n\nbody {\n  color: red !important; }\n", ""]);

/***/ }),

/***/ 56:
/***/ (function(module, exports, __webpack_require__) {

exports = module.exports = __webpack_require__(13)();
exports.push([module.i, "/*!\n * Font Awesome Icon Picker\n * https://itsjavi.com/fontawesome-iconpicker/\n *\n * Originally written by (c) 2016 Javi Aguilar\n * Licensed under the MIT License\n * https://github.com/itsjavi/fontawesome-iconpicker/blob/master/LICENSE\n *\n */.iconpicker-popover.popover{position:absolute;top:0;left:0;display:none;max-width:none;padding:1px;text-align:left;width:216px;background:#f7f7f7}.iconpicker-popover.popover.top,.iconpicker-popover.popover.topLeftCorner,.iconpicker-popover.popover.topLeft,.iconpicker-popover.popover.topRight,.iconpicker-popover.popover.topRightCorner{margin-top:-10px}.iconpicker-popover.popover.right,.iconpicker-popover.popover.rightTop,.iconpicker-popover.popover.rightBottom{margin-left:10px}.iconpicker-popover.popover.bottom,.iconpicker-popover.popover.bottomRightCorner,.iconpicker-popover.popover.bottomRight,.iconpicker-popover.popover.bottomLeft,.iconpicker-popover.popover.bottomLeftCorner{margin-top:10px}.iconpicker-popover.popover.left,.iconpicker-popover.popover.leftBottom,.iconpicker-popover.popover.leftTop{margin-left:-10px}.iconpicker-popover.popover.inline{margin:0 0 12px 0;position:relative;display:inline-block;opacity:1;top:auto;left:auto;bottom:auto;right:auto;max-width:100%;box-shadow:none;z-index:auto;vertical-align:top}.iconpicker-popover.popover.inline>.arrow{display:none}.dropdown-menu .iconpicker-popover.inline{margin:0;border:none}.dropdown-menu.iconpicker-container{padding:0}.iconpicker-popover.popover .popover-title{padding:12px;font-size:13px;line-height:15px;border-bottom:1px solid #ebebeb;background-color:#f7f7f7}.iconpicker-popover.popover .popover-title input[type=search].iconpicker-search{margin:0 0 2px 0}.iconpicker-popover.popover .popover-title-text~input[type=search].iconpicker-search{margin-top:12px}.iconpicker-popover.popover .popover-content{padding:0px;text-align:center}.iconpicker-popover .popover-footer{float:none;clear:both;padding:12px;text-align:right;margin:0;border-top:1px solid #ebebeb;background-color:#f7f7f7}.iconpicker-popover .popover-footer:before,.iconpicker-popover .popover-footer:after{content:\" \";display:table}.iconpicker-popover .popover-footer:after{clear:both}.iconpicker-popover .popover-footer .iconpicker-btn{margin-left:10px}.iconpicker-popover .popover-footer input[type=search].iconpicker-search{margin-bottom:12px}.iconpicker-popover.popover>.arrow,.iconpicker-popover.popover>.arrow:after{position:absolute;display:block;width:0;height:0;border-color:transparent;border-style:solid}.iconpicker-popover.popover>.arrow{border-width:11px}.iconpicker-popover.popover>.arrow:after{border-width:10px;content:\"\"}.iconpicker-popover.popover.top>.arrow,.iconpicker-popover.popover.topLeft>.arrow,.iconpicker-popover.popover.topRight>.arrow{left:50%;margin-left:-11px;border-bottom-width:0;border-top-color:#999;border-top-color:rgba(0,0,0,0.25);bottom:-11px}.iconpicker-popover.popover.top>.arrow:after,.iconpicker-popover.popover.topLeft>.arrow:after,.iconpicker-popover.popover.topRight>.arrow:after{content:\" \";bottom:1px;margin-left:-10px;border-bottom-width:0;border-top-color:#fff}.iconpicker-popover.popover.topLeft>.arrow{left:8px;margin-left:0}.iconpicker-popover.popover.topRight>.arrow{left:auto;right:8px;margin-left:0}.iconpicker-popover.popover.right>.arrow,.iconpicker-popover.popover.rightTop>.arrow,.iconpicker-popover.popover.rightBottom>.arrow{top:50%;left:-11px;margin-top:-11px;border-left-width:0;border-right-color:#999;border-right-color:rgba(0,0,0,0.25)}.iconpicker-popover.popover.right>.arrow:after,.iconpicker-popover.popover.rightTop>.arrow:after,.iconpicker-popover.popover.rightBottom>.arrow:after{content:\" \";left:1px;bottom:-10px;border-left-width:0;border-right-color:#fff}.iconpicker-popover.popover.rightTop>.arrow{top:auto;bottom:8px;margin-top:0}.iconpicker-popover.popover.rightBottom>.arrow{top:8px;margin-top:0}.iconpicker-popover.popover.bottom>.arrow,.iconpicker-popover.popover.bottomRight>.arrow,.iconpicker-popover.popover.bottomLeft>.arrow{left:50%;margin-left:-11px;border-top-width:0;border-bottom-color:#999;border-bottom-color:rgba(0,0,0,0.25);top:-11px}.iconpicker-popover.popover.bottom>.arrow:after,.iconpicker-popover.popover.bottomRight>.arrow:after,.iconpicker-popover.popover.bottomLeft>.arrow:after{content:\" \";top:1px;margin-left:-10px;border-top-width:0;border-bottom-color:#fff}.iconpicker-popover.popover.bottomLeft>.arrow{left:8px;margin-left:0}.iconpicker-popover.popover.bottomRight>.arrow{left:auto;right:8px;margin-left:0}.iconpicker-popover.popover.left>.arrow,.iconpicker-popover.popover.leftBottom>.arrow,.iconpicker-popover.popover.leftTop>.arrow{top:50%;right:-11px;margin-top:-11px;border-right-width:0;border-left-color:#999;border-left-color:rgba(0,0,0,0.25)}.iconpicker-popover.popover.left>.arrow:after,.iconpicker-popover.popover.leftBottom>.arrow:after,.iconpicker-popover.popover.leftTop>.arrow:after{content:\" \";right:1px;border-right-width:0;border-left-color:#fff;bottom:-10px}.iconpicker-popover.popover.leftBottom>.arrow{top:8px;margin-top:0}.iconpicker-popover.popover.leftTop>.arrow{top:auto;bottom:8px;margin-top:0}.iconpicker{position:relative;text-align:left;text-shadow:none;line-height:0;display:block;margin:0;overflow:hidden}.iconpicker *{-webkit-box-sizing:content-box;-moz-box-sizing:content-box;box-sizing:content-box;position:relative}.iconpicker:before,.iconpicker:after{content:\" \";display:table}.iconpicker:after{clear:both}.iconpicker .iconpicker-items{position:relative;clear:both;float:none;padding:12px 0 0 12px;background:#fff;margin:0;overflow:hidden;overflow-y:auto;min-height:49px;max-height:246px}.iconpicker .iconpicker-items:before,.iconpicker .iconpicker-items:after{content:\" \";display:table}.iconpicker .iconpicker-items:after{clear:both}.iconpicker .iconpicker-item{float:left;width:14px;height:14px;padding:12px;margin:0 12px 12px 0;text-align:center;cursor:pointer;border-radius:3px;font-size:14px;box-shadow:0 0 0 1px #ddd;color:inherit}.iconpicker .iconpicker-item:hover:not(.iconpicker-selected){background-color:#eee}.iconpicker .iconpicker-item.iconpicker-selected{box-shadow:none;color:#fff}.iconpicker-component{cursor:pointer}", ""]);

/***/ }),

/***/ 60:
/***/ (function(module, exports) {

/*
	MIT License http://www.opensource.org/licenses/mit-license.php
	Author Tobias Koppers @sokra
*/
var stylesInDom = {},
	memoize = function(fn) {
		var memo;
		return function () {
			if (typeof memo === "undefined") memo = fn.apply(this, arguments);
			return memo;
		};
	},
	isOldIE = memoize(function() {
		return /msie [6-9]\b/.test(self.navigator.userAgent.toLowerCase());
	}),
	getHeadElement = memoize(function () {
		return document.head || document.getElementsByTagName("head")[0];
	}),
	singletonElement = null,
	singletonCounter = 0,
	styleElementsInsertedAtTop = [];

module.exports = function(list, options) {
	if(typeof DEBUG !== "undefined" && DEBUG) {
		if(typeof document !== "object") throw new Error("The style-loader cannot be used in a non-browser environment");
	}

	options = options || {};
	// Force single-tag solution on IE6-9, which has a hard limit on the # of <style>
	// tags it will allow on a page
	if (typeof options.singleton === "undefined") options.singleton = isOldIE();

	// By default, add <style> tags to the bottom of <head>.
	if (typeof options.insertAt === "undefined") options.insertAt = "bottom";

	var styles = listToStyles(list);
	addStylesToDom(styles, options);

	return function update(newList) {
		var mayRemove = [];
		for(var i = 0; i < styles.length; i++) {
			var item = styles[i];
			var domStyle = stylesInDom[item.id];
			domStyle.refs--;
			mayRemove.push(domStyle);
		}
		if(newList) {
			var newStyles = listToStyles(newList);
			addStylesToDom(newStyles, options);
		}
		for(var i = 0; i < mayRemove.length; i++) {
			var domStyle = mayRemove[i];
			if(domStyle.refs === 0) {
				for(var j = 0; j < domStyle.parts.length; j++)
					domStyle.parts[j]();
				delete stylesInDom[domStyle.id];
			}
		}
	};
}

function addStylesToDom(styles, options) {
	for(var i = 0; i < styles.length; i++) {
		var item = styles[i];
		var domStyle = stylesInDom[item.id];
		if(domStyle) {
			domStyle.refs++;
			for(var j = 0; j < domStyle.parts.length; j++) {
				domStyle.parts[j](item.parts[j]);
			}
			for(; j < item.parts.length; j++) {
				domStyle.parts.push(addStyle(item.parts[j], options));
			}
		} else {
			var parts = [];
			for(var j = 0; j < item.parts.length; j++) {
				parts.push(addStyle(item.parts[j], options));
			}
			stylesInDom[item.id] = {id: item.id, refs: 1, parts: parts};
		}
	}
}

function listToStyles(list) {
	var styles = [];
	var newStyles = {};
	for(var i = 0; i < list.length; i++) {
		var item = list[i];
		var id = item[0];
		var css = item[1];
		var media = item[2];
		var sourceMap = item[3];
		var part = {css: css, media: media, sourceMap: sourceMap};
		if(!newStyles[id])
			styles.push(newStyles[id] = {id: id, parts: [part]});
		else
			newStyles[id].parts.push(part);
	}
	return styles;
}

function insertStyleElement(options, styleElement) {
	var head = getHeadElement();
	var lastStyleElementInsertedAtTop = styleElementsInsertedAtTop[styleElementsInsertedAtTop.length - 1];
	if (options.insertAt === "top") {
		if(!lastStyleElementInsertedAtTop) {
			head.insertBefore(styleElement, head.firstChild);
		} else if(lastStyleElementInsertedAtTop.nextSibling) {
			head.insertBefore(styleElement, lastStyleElementInsertedAtTop.nextSibling);
		} else {
			head.appendChild(styleElement);
		}
		styleElementsInsertedAtTop.push(styleElement);
	} else if (options.insertAt === "bottom") {
		head.appendChild(styleElement);
	} else {
		throw new Error("Invalid value for parameter 'insertAt'. Must be 'top' or 'bottom'.");
	}
}

function removeStyleElement(styleElement) {
	styleElement.parentNode.removeChild(styleElement);
	var idx = styleElementsInsertedAtTop.indexOf(styleElement);
	if(idx >= 0) {
		styleElementsInsertedAtTop.splice(idx, 1);
	}
}

function createStyleElement(options) {
	var styleElement = document.createElement("style");
	styleElement.type = "text/css";
	insertStyleElement(options, styleElement);
	return styleElement;
}

function createLinkElement(options) {
	var linkElement = document.createElement("link");
	linkElement.rel = "stylesheet";
	insertStyleElement(options, linkElement);
	return linkElement;
}

function addStyle(obj, options) {
	var styleElement, update, remove;

	if (options.singleton) {
		var styleIndex = singletonCounter++;
		styleElement = singletonElement || (singletonElement = createStyleElement(options));
		update = applyToSingletonTag.bind(null, styleElement, styleIndex, false);
		remove = applyToSingletonTag.bind(null, styleElement, styleIndex, true);
	} else if(obj.sourceMap &&
		typeof URL === "function" &&
		typeof URL.createObjectURL === "function" &&
		typeof URL.revokeObjectURL === "function" &&
		typeof Blob === "function" &&
		typeof btoa === "function") {
		styleElement = createLinkElement(options);
		update = updateLink.bind(null, styleElement);
		remove = function() {
			removeStyleElement(styleElement);
			if(styleElement.href)
				URL.revokeObjectURL(styleElement.href);
		};
	} else {
		styleElement = createStyleElement(options);
		update = applyToTag.bind(null, styleElement);
		remove = function() {
			removeStyleElement(styleElement);
		};
	}

	update(obj);

	return function updateStyle(newObj) {
		if(newObj) {
			if(newObj.css === obj.css && newObj.media === obj.media && newObj.sourceMap === obj.sourceMap)
				return;
			update(obj = newObj);
		} else {
			remove();
		}
	};
}

var replaceText = (function () {
	var textStore = [];

	return function (index, replacement) {
		textStore[index] = replacement;
		return textStore.filter(Boolean).join('\n');
	};
})();

function applyToSingletonTag(styleElement, index, remove, obj) {
	var css = remove ? "" : obj.css;

	if (styleElement.styleSheet) {
		styleElement.styleSheet.cssText = replaceText(index, css);
	} else {
		var cssNode = document.createTextNode(css);
		var childNodes = styleElement.childNodes;
		if (childNodes[index]) styleElement.removeChild(childNodes[index]);
		if (childNodes.length) {
			styleElement.insertBefore(cssNode, childNodes[index]);
		} else {
			styleElement.appendChild(cssNode);
		}
	}
}

function applyToTag(styleElement, obj) {
	var css = obj.css;
	var media = obj.media;

	if(media) {
		styleElement.setAttribute("media", media)
	}

	if(styleElement.styleSheet) {
		styleElement.styleSheet.cssText = css;
	} else {
		while(styleElement.firstChild) {
			styleElement.removeChild(styleElement.firstChild);
		}
		styleElement.appendChild(document.createTextNode(css));
	}
}

function updateLink(linkElement, obj) {
	var css = obj.css;
	var sourceMap = obj.sourceMap;

	if(sourceMap) {
		// http://stackoverflow.com/a/26603875
		css += "\n/*# sourceMappingURL=data:application/json;base64," + btoa(unescape(encodeURIComponent(JSON.stringify(sourceMap)))) + " */";
	}

	var blob = new Blob([css], { type: "text/css" });

	var oldSrc = linkElement.href;

	linkElement.href = URL.createObjectURL(blob);

	if(oldSrc)
		URL.revokeObjectURL(oldSrc);
}


/***/ }),

/***/ 91:
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(23);


/***/ })

/******/ });