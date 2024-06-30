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

module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929","vendors-node_modules_bootstrap_dist_js_bootstrap_esm_js-node_modules_bootstrap-icons_font_boo-fa8835"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7QUFBd0ksZ0VBQXNCLENBQUMsOEdBQU07Ozs7Ozs7Ozs7Ozs7QUNBcks7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQzBCO0FBQ0Y7QUFFeEIsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFRLENBQUM7QUFFM0JBLG1CQUFPLENBQUMsb0VBQVcsQ0FBQztBQUNwQkEsbUJBQU8sQ0FBQyx5R0FBMEMsQ0FBQzs7Ozs7Ozs7Ozs7Ozs7Ozs7Ozs7QUNabkI7QUFFaENFLFFBQVEsQ0FBQ0MsZ0JBQWdCLENBQUMsa0JBQWtCLEVBQUUsWUFBWTtFQUN6REMscUJBQXFCLENBQUMsQ0FBQztBQUN4QixDQUFDLENBQUM7QUFFRixTQUFTQSxxQkFBcUJBLENBQUEsRUFBRztFQUNoQ0wsQ0FBQyxDQUFDTSxJQUFJLENBQUM7SUFDTkMsR0FBRyxFQUFFTCwwREFBZ0IsQ0FBQyxxQkFBcUI7RUFDNUMsQ0FBQyxDQUFDLENBQUNPLElBQUksQ0FBQyxVQUFVQyxRQUFRLEVBQUU7SUFDM0IsSUFBSUMsUUFBUSxHQUFHWCxDQUFDLENBQUNHLFFBQVEsQ0FBQyxDQUFDUyxJQUFJLENBQUMsV0FBVyxDQUFDO0lBQzVDLElBQUlGLFFBQVEsR0FBRyxDQUFDLEVBQUU7TUFDakJDLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDSCxRQUFRLENBQUM7SUFDeEIsQ0FBQyxNQUFNO01BQ05DLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDLEdBQUcsQ0FBQztJQUNuQjtFQUNELENBQUMsQ0FBQztBQUNIOzs7Ozs7Ozs7OztBQ2pCQSIsInNvdXJjZXMiOlsid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvanMvc2hvcC9pbmRleC5qcyIsIndlYnBhY2s6Ly9iZW5ldmV3YXh3ZWJzaXRlLy4vYXNzZXRzL3N0eWxlcy9hcHAuc2Nzcz84ZjU5Il0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSb3V0aW5nIGZyb20gXCJmb3Mtcm91dGVyXCI7aW1wb3J0IHJvdXRlcyBmcm9tIFwiL2hvbWUvbW9pc2UvRG9jdW1lbnRzL0NsaWVudHMvQmVuZXZlV2F4L2JlbmV2ZXdheHdlYnNpdGUvdmFyL2NhY2hlL2Zvc1JvdXRlcy5qc29uXCI7Um91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpOyIsIi8qXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogVGhpcyBmaWxlIHdpbGwgYmUgaW5jbHVkZWQgb250byB0aGUgcGFnZSB2aWEgdGhlIGltcG9ydG1hcCgpIFR3aWcgZnVuY3Rpb24sXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxuICovXG5pbXBvcnQgXCIuL3N0eWxlcy9hcHAuc2Nzc1wiXG5pbXBvcnQgXCIuL2pzL3Nob3AvaW5kZXhcIlxuXG5jb25zdCAkID0gcmVxdWlyZShcImpxdWVyeVwiKVxuXG5yZXF1aXJlKFwiYm9vdHN0cmFwXCIpXG5yZXF1aXJlKFwiYm9vdHN0cmFwLWljb25zL2ZvbnQvYm9vdHN0cmFwLWljb25zLmNzc1wiKVxuIiwiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIlxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbiAoKSB7XG5cdGdldFRvdGFsSXRlbXNBamF4Q2FsbCgpXG59KVxuXG5mdW5jdGlvbiBnZXRUb3RhbEl0ZW1zQWpheENhbGwoKSB7XG5cdCQuYWpheCh7XG5cdFx0dXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXBwX2NhcnRfdG90YWxJdGVtc1wiKSxcblx0fSkuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcblx0XHRsZXQgY2FydEljb24gPSAkKGRvY3VtZW50KS5maW5kKFwiLmNhcnRJY29uXCIpXG5cdFx0aWYgKHJlc3BvbnNlID4gMCkge1xuXHRcdFx0Y2FydEljb24uaHRtbChyZXNwb25zZSlcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y2FydEljb24uaHRtbChcIiBcIilcblx0XHR9XG5cdH0pXG59XG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJSb3V0aW5nIiwiZG9jdW1lbnQiLCJhZGRFdmVudExpc3RlbmVyIiwiZ2V0VG90YWxJdGVtc0FqYXhDYWxsIiwiYWpheCIsInVybCIsImdlbmVyYXRlIiwiZG9uZSIsInJlc3BvbnNlIiwiY2FydEljb24iLCJmaW5kIiwiaHRtbCJdLCJzb3VyY2VSb290IjoiIn0=