"use strict";
(self["webpackChunkbenevewaxwebsite"] = self["webpackChunkbenevewaxwebsite"] || []).push([["shop_index"],{

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

/***/ "./var/cache/fosRoutes.json":
/*!**********************************!*\
  !*** ./var/cache/fosRoutes.json ***!
  \**********************************/
/***/ ((module) => {

module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/js/shop/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoic2hvcF9pbmRleC5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7O0FBQXdJLGdFQUFzQixDQUFDLDhHQUFNOzs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQ0FySTtBQUVoQ0MsUUFBUSxDQUFDQyxnQkFBZ0IsQ0FBQyxrQkFBa0IsRUFBRSxZQUFZO0VBQ3pEQyxxQkFBcUIsQ0FBQyxDQUFDO0FBQ3hCLENBQUMsQ0FBQztBQUVGLFNBQVNBLHFCQUFxQkEsQ0FBQSxFQUFHO0VBQ2hDQyxDQUFDLENBQUNDLElBQUksQ0FBQztJQUNOQyxHQUFHLEVBQUVOLDBEQUFnQixDQUFDLHFCQUFxQjtFQUM1QyxDQUFDLENBQUMsQ0FBQ1EsSUFBSSxDQUFDLFVBQVVDLFFBQVEsRUFBRTtJQUMzQixJQUFJQyxRQUFRLEdBQUdOLENBQUMsQ0FBQ0gsUUFBUSxDQUFDLENBQUNVLElBQUksQ0FBQyxXQUFXLENBQUM7SUFDNUMsSUFBSUYsUUFBUSxHQUFHLENBQUMsRUFBRTtNQUNqQkMsUUFBUSxDQUFDRSxJQUFJLENBQUNILFFBQVEsQ0FBQztJQUN4QixDQUFDLE1BQU07TUFDTkMsUUFBUSxDQUFDRSxJQUFJLENBQUMsR0FBRyxDQUFDO0lBQ25CO0VBQ0QsQ0FBQyxDQUFDO0FBQ0giLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly9iZW5ldmV3YXh3ZWJzaXRlLyIsIndlYnBhY2s6Ly9iZW5ldmV3YXh3ZWJzaXRlLy4vYXNzZXRzL2pzL3Nob3AvaW5kZXguanMiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIjtpbXBvcnQgcm91dGVzIGZyb20gXCIvaG9tZS9tb2lzZS9Eb2N1bWVudHMvQ2xpZW50cy9CZW5ldmVXYXgvYmVuZXZld2F4d2Vic2l0ZS92YXIvY2FjaGUvZm9zUm91dGVzLmpzb25cIjtSb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7IiwiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIlxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbiAoKSB7XG5cdGdldFRvdGFsSXRlbXNBamF4Q2FsbCgpXG59KVxuXG5mdW5jdGlvbiBnZXRUb3RhbEl0ZW1zQWpheENhbGwoKSB7XG5cdCQuYWpheCh7XG5cdFx0dXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXBwX2NhcnRfdG90YWxJdGVtc1wiKSxcblx0fSkuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcblx0XHRsZXQgY2FydEljb24gPSAkKGRvY3VtZW50KS5maW5kKFwiLmNhcnRJY29uXCIpXG5cdFx0aWYgKHJlc3BvbnNlID4gMCkge1xuXHRcdFx0Y2FydEljb24uaHRtbChyZXNwb25zZSlcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y2FydEljb24uaHRtbChcIiBcIilcblx0XHR9XG5cdH0pXG59XG4iXSwibmFtZXMiOlsiUm91dGluZyIsImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImdldFRvdGFsSXRlbXNBamF4Q2FsbCIsIiQiLCJhamF4IiwidXJsIiwiZ2VuZXJhdGUiLCJkb25lIiwicmVzcG9uc2UiLCJjYXJ0SWNvbiIsImZpbmQiLCJodG1sIl0sInNvdXJjZVJvb3QiOiIifQ==