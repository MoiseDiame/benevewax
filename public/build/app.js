"use strict";
(self["webpackChunkbenevewaxwebsite"] = self["webpackChunkbenevewaxwebsite"] || []).push([["app"],{

/***/ "./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!":
/*!***********************************************************************************************************************!*\
  !*** ./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1! ***!
  \***********************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! fos-router */ "./node_modules/fos-router/public/js/router.js");
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(fos_router__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _home_moise_Documents_Clients_BeneveWax_benevewaxwebsite_var_cache_fosRoutes_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./var/cache/fosRoutes.json */ "./var/cache/fosRoutes.json");
fos_router__WEBPACK_IMPORTED_MODULE_0___default().setRoutingData(_home_moise_Documents_Clients_BeneveWax_benevewaxwebsite_var_cache_fosRoutes_json__WEBPACK_IMPORTED_MODULE_1__);

/***/ }),

/***/ "./assets/app.js":
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");
/* harmony import */ var _js_shop_index__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./js/shop/index */ "./assets/js/shop/index.js");
/* harmony import */ var _js_notyf_notyf__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./js/notyf/notyf */ "./assets/js/notyf/notyf.js");
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */



var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! bootstrap */ "./node_modules/bootstrap/dist/js/bootstrap.esm.js");
__webpack_require__(/*! bootstrap-icons/font/bootstrap-icons.css */ "./node_modules/bootstrap-icons/font/bootstrap-icons.css");

/***/ }),

/***/ "./assets/js/notyf/notyf.js":
/*!**********************************!*\
  !*** ./assets/js/notyf/notyf.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var notyf__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! notyf */ "./node_modules/notyf/notyf.es.js");
/* harmony import */ var notyf_notyf_min_css__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! notyf/notyf.min.css */ "./node_modules/notyf/notyf.min.css");
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");


$(document).on("DOMContentLoaded", function () {
  // Initialisation de Notyf
  var notyf = new notyf__WEBPACK_IMPORTED_MODULE_0__.Notyf({
    duration: 4000,
    ripple: true,
    position: {
      x: "right",
      y: "top"
    },
    dismissible: true,
    types: [{
      type: "success",
      className: "bg-success",
      icon: {
        className: "materials-symbols-rounded text-white",
        tagName: "span",
        text: ""
      },
      background: "none"
    }, {
      type: "error",
      className: "bg-danger",
      icon: {
        className: "materials-symbols-rounded text-white",
        tagName: "span",
        text: ""
      },
      background: "none"
    }]
  });

  // Utilisez cette fonction pour afficher les messages flash
  $(function () {
    var flashes = $(".flash-message");
    flashes.each(function (index, flash) {
      var label = $(flash).data("label");
      var message = $(flash).data("message");
      if (label !== undefined) {
        notyf.open({
          type: label,
          message: message
        });
      }
      $(flash).remove();
    });
  });
});

/***/ }),

/***/ "./assets/js/shop/index.js":
/*!*********************************!*\
  !*** ./assets/js/shop/index.js ***!
  \*********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
/* harmony import */ var core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_find_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! fos-router */ "./node_modules/fos-router/public/js/router.js");
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(fos_router__WEBPACK_IMPORTED_MODULE_2__);
/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");



document.addEventListener("DOMContentLoaded", function () {
  getTotalItemsAjaxCall();
});
function getTotalItemsAjaxCall() {
  $.ajax({
    url: fos_router__WEBPACK_IMPORTED_MODULE_2___default().generate("app_cart_totalItems")
  }).done(function (response) {
    var cartIcon = $(document).find(".cartIcon");
    if (response > 0) {
      cartIcon.html(response);
    } else {
      cartIcon.html(" ");
    }
  });
}

/***/ }),

/***/ "./assets/styles/app.scss":
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }),

/***/ "./var/cache/fosRoutes.json":
/*!**********************************!*\
  !*** ./var/cache/fosRoutes.json ***!
  \**********************************/
/***/ ((module) => {

module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_details":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/details"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_approve":{"tokens":[["variable","/","[^/]++","paypalOrderId",true],["variable","/","[^/]++","orderRef",true],["text","/order/approve"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_success":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/success"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_fail":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/fail"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929","vendors-node_modules_bootstrap_dist_js_bootstrap_esm_js-node_modules_bootstrap-icons_font_boo-b74508"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q25CO0VBQ0QsQ0FBQyxDQUFDO0FBQ0g7Ozs7Ozs7Ozs7O0FDakJBIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8iLCJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8uL2Fzc2V0cy9hcHAuanMiLCJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8uL2Fzc2V0cy9qcy9ub3R5Zi9ub3R5Zi5qcyIsIndlYnBhY2s6Ly9iZW5ldmV3YXh3ZWJzaXRlLy4vYXNzZXRzL2pzL3Nob3AvaW5kZXguanMiLCJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3MiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIjtpbXBvcnQgcm91dGVzIGZyb20gXCIvaG9tZS9tb2lzZS9Eb2N1bWVudHMvQ2xpZW50cy9CZW5ldmVXYXgvYmVuZXZld2F4d2Vic2l0ZS92YXIvY2FjaGUvZm9zUm91dGVzLmpzb25cIjtSb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7IiwiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcbiAqIHdoaWNoIHNob3VsZCBhbHJlYWR5IGJlIGluIHlvdXIgYmFzZS5odG1sLnR3aWcuXG4gKi9cbmltcG9ydCBcIi4vc3R5bGVzL2FwcC5zY3NzXCJcbmltcG9ydCBcIi4vanMvc2hvcC9pbmRleFwiXG5pbXBvcnQgXCIuL2pzL25vdHlmL25vdHlmXCJcblxuY29uc3QgJCA9IHJlcXVpcmUoXCJqcXVlcnlcIilcblxucmVxdWlyZShcImJvb3RzdHJhcFwiKVxucmVxdWlyZShcImJvb3RzdHJhcC1pY29ucy9mb250L2Jvb3RzdHJhcC1pY29ucy5jc3NcIilcbiIsImltcG9ydCB7IE5vdHlmIH0gZnJvbSBcIm5vdHlmXCJcbmltcG9ydCBcIm5vdHlmL25vdHlmLm1pbi5jc3NcIlxuXG4kKGRvY3VtZW50KS5vbihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgKCkgPT4ge1xuXHQvLyBJbml0aWFsaXNhdGlvbiBkZSBOb3R5ZlxuXHRjb25zdCBub3R5ZiA9IG5ldyBOb3R5Zih7XG5cdFx0ZHVyYXRpb246IDQwMDAsXG5cdFx0cmlwcGxlOiB0cnVlLFxuXHRcdHBvc2l0aW9uOiB7XG5cdFx0XHR4OiBcInJpZ2h0XCIsXG5cdFx0XHR5OiBcInRvcFwiLFxuXHRcdH0sXG5cdFx0ZGlzbWlzc2libGU6IHRydWUsXG5cdFx0dHlwZXM6IFtcblx0XHRcdHtcblx0XHRcdFx0dHlwZTogXCJzdWNjZXNzXCIsXG5cdFx0XHRcdGNsYXNzTmFtZTogXCJiZy1zdWNjZXNzXCIsXG5cdFx0XHRcdGljb246IHtcblx0XHRcdFx0XHRjbGFzc05hbWU6IFwibWF0ZXJpYWxzLXN5bWJvbHMtcm91bmRlZCB0ZXh0LXdoaXRlXCIsXG5cdFx0XHRcdFx0dGFnTmFtZTogXCJzcGFuXCIsXG5cdFx0XHRcdFx0dGV4dDogXCJcIixcblx0XHRcdFx0fSxcblx0XHRcdFx0YmFja2dyb3VuZDogXCJub25lXCIsXG5cdFx0XHR9LFxuXHRcdFx0e1xuXHRcdFx0XHR0eXBlOiBcImVycm9yXCIsXG5cdFx0XHRcdGNsYXNzTmFtZTogXCJiZy1kYW5nZXJcIixcblx0XHRcdFx0aWNvbjoge1xuXHRcdFx0XHRcdGNsYXNzTmFtZTogXCJtYXRlcmlhbHMtc3ltYm9scy1yb3VuZGVkIHRleHQtd2hpdGVcIixcblx0XHRcdFx0XHR0YWdOYW1lOiBcInNwYW5cIixcblx0XHRcdFx0XHR0ZXh0OiBcIlwiLFxuXHRcdFx0XHR9LFxuXHRcdFx0XHRiYWNrZ3JvdW5kOiBcIm5vbmVcIixcblx0XHRcdH0sXG5cdFx0XSxcblx0fSlcblxuXHQvLyBVdGlsaXNleiBjZXR0ZSBmb25jdGlvbiBwb3VyIGFmZmljaGVyIGxlcyBtZXNzYWdlcyBmbGFzaFxuXHQkKGZ1bmN0aW9uICgpIHtcblx0XHRsZXQgZmxhc2hlcyA9ICQoXCIuZmxhc2gtbWVzc2FnZVwiKVxuXG5cdFx0Zmxhc2hlcy5lYWNoKGZ1bmN0aW9uIChpbmRleCwgZmxhc2gpIHtcblx0XHRcdGxldCBsYWJlbCA9ICQoZmxhc2gpLmRhdGEoXCJsYWJlbFwiKVxuXHRcdFx0bGV0IG1lc3NhZ2UgPSAkKGZsYXNoKS5kYXRhKFwibWVzc2FnZVwiKVxuXG5cdFx0XHRpZiAobGFiZWwgIT09IHVuZGVmaW5lZCkge1xuXHRcdFx0XHRub3R5Zi5vcGVuKHtcblx0XHRcdFx0XHR0eXBlOiBsYWJlbCxcblx0XHRcdFx0XHRtZXNzYWdlOiBtZXNzYWdlLFxuXHRcdFx0XHR9KVxuXHRcdFx0fVxuXHRcdFx0JChmbGFzaCkucmVtb3ZlKClcblx0XHR9KVxuXHR9KVxufSlcbiIsImltcG9ydCBSb3V0aW5nIGZyb20gXCJmb3Mtcm91dGVyXCJcblxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgZnVuY3Rpb24gKCkge1xuXHRnZXRUb3RhbEl0ZW1zQWpheENhbGwoKVxufSlcblxuZnVuY3Rpb24gZ2V0VG90YWxJdGVtc0FqYXhDYWxsKCkge1xuXHQkLmFqYXgoe1xuXHRcdHVybDogUm91dGluZy5nZW5lcmF0ZShcImFwcF9jYXJ0X3RvdGFsSXRlbXNcIiksXG5cdH0pLmRvbmUoZnVuY3Rpb24gKHJlc3BvbnNlKSB7XG5cdFx0bGV0IGNhcnRJY29uID0gJChkb2N1bWVudCkuZmluZChcIi5jYXJ0SWNvblwiKVxuXHRcdGlmIChyZXNwb25zZSA+IDApIHtcblx0XHRcdGNhcnRJY29uLmh0bWwocmVzcG9uc2UpXG5cdFx0fSBlbHNlIHtcblx0XHRcdGNhcnRJY29uLmh0bWwoXCIgXCIpXG5cdFx0fVxuXHR9KVxufVxuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbIiQiLCJyZXF1aXJlIiwiTm90eWYiLCJkb2N1bWVudCIsIm9uIiwibm90eWYiLCJkdXJhdGlvbiIsInJpcHBsZSIsInBvc2l0aW9uIiwieCIsInkiLCJkaXNtaXNzaWJsZSIsInR5cGVzIiwidHlwZSIsImNsYXNzTmFtZSIsImljb24iLCJ0YWdOYW1lIiwidGV4dCIsImJhY2tncm91bmQiLCJmbGFzaGVzIiwiZWFjaCIsImluZGV4IiwiZmxhc2giLCJsYWJlbCIsImRhdGEiLCJtZXNzYWdlIiwidW5kZWZpbmVkIiwib3BlbiIsInJlbW92ZSIsIlJvdXRpbmciLCJhZGRFdmVudExpc3RlbmVyIiwiZ2V0VG90YWxJdGVtc0FqYXhDYWxsIiwiYWpheCIsInVybCIsImdlbmVyYXRlIiwiZG9uZSIsInJlc3BvbnNlIiwiY2FydEljb24iLCJmaW5kIiwiaHRtbCJdLCJzb3VyY2VSb290IjoiIn0=