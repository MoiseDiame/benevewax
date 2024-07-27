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

module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_details":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/details"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_success":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/success"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_order_fail":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/order/fail"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929","vendors-node_modules_bootstrap_dist_js_bootstrap_esm_js-node_modules_bootstrap-icons_font_boo-b74508"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7QUFBd0ksZ0VBQXNCLENBQUMsOEdBQU07Ozs7Ozs7Ozs7Ozs7O0FDQXJLO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUMwQjtBQUNGO0FBQ0M7QUFFekIsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFRLENBQUM7QUFFM0JBLG1CQUFPLENBQUMsb0VBQVcsQ0FBQztBQUNwQkEsbUJBQU8sQ0FBQyx5R0FBMEMsQ0FBQzs7Ozs7Ozs7Ozs7Ozs7QUNidEI7QUFDRDtBQUU1QkQsQ0FBQyxDQUFDRyxRQUFRLENBQUMsQ0FBQ0MsRUFBRSxDQUFDLGtCQUFrQixFQUFFLFlBQU07RUFDeEM7RUFDQSxJQUFNQyxLQUFLLEdBQUcsSUFBSUgsd0NBQUssQ0FBQztJQUN2QkksUUFBUSxFQUFFLElBQUk7SUFDZEMsTUFBTSxFQUFFLElBQUk7SUFDWkMsUUFBUSxFQUFFO01BQ1RDLENBQUMsRUFBRSxPQUFPO01BQ1ZDLENBQUMsRUFBRTtJQUNKLENBQUM7SUFDREMsV0FBVyxFQUFFLElBQUk7SUFDakJDLEtBQUssRUFBRSxDQUNOO01BQ0NDLElBQUksRUFBRSxTQUFTO01BQ2ZDLFNBQVMsRUFBRSxZQUFZO01BQ3ZCQyxJQUFJLEVBQUU7UUFDTEQsU0FBUyxFQUFFLHNDQUFzQztRQUNqREUsT0FBTyxFQUFFLE1BQU07UUFDZkMsSUFBSSxFQUFFO01BQ1AsQ0FBQztNQUNEQyxVQUFVLEVBQUU7SUFDYixDQUFDO0VBRUgsQ0FBQyxDQUFDOztFQUVGO0VBQ0FsQixDQUFDLENBQUMsWUFBWTtJQUNiLElBQUltQixPQUFPLEdBQUduQixDQUFDLENBQUMsZ0JBQWdCLENBQUM7SUFFakNtQixPQUFPLENBQUNDLElBQUksQ0FBQyxVQUFVQyxLQUFLLEVBQUVDLEtBQUssRUFBRTtNQUNwQyxJQUFJQyxLQUFLLEdBQUd2QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLE9BQU8sQ0FBQztNQUNsQyxJQUFJQyxPQUFPLEdBQUd6QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLFNBQVMsQ0FBQztNQUV0QyxJQUFJRCxLQUFLLEtBQUtHLFNBQVMsRUFBRTtRQUN4QnJCLEtBQUssQ0FBQ3NCLElBQUksQ0FBQztVQUNWZCxJQUFJLEVBQUVVLEtBQUs7VUFDWEUsT0FBTyxFQUFFQTtRQUNWLENBQUMsQ0FBQztNQUNIO01BQ0F6QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ00sTUFBTSxDQUFDLENBQUM7SUFDbEIsQ0FBQyxDQUFDO0VBQ0gsQ0FBQyxDQUFDO0FBQ0gsQ0FBQyxDQUFDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQzVDOEI7QUFFaEN6QixRQUFRLENBQUMyQixnQkFBZ0IsQ0FBQyxrQkFBa0IsRUFBRSxZQUFZO0VBQ3pEQyxxQkFBcUIsQ0FBQyxDQUFDO0FBQ3hCLENBQUMsQ0FBQztBQUVGLFNBQVNBLHFCQUFxQkEsQ0FBQSxFQUFHO0VBQ2hDL0IsQ0FBQyxDQUFDZ0MsSUFBSSxDQUFDO0lBQ05DLEdBQUcsRUFBRUosMERBQWdCLENBQUMscUJBQXFCO0VBQzVDLENBQUMsQ0FBQyxDQUFDTSxJQUFJLENBQUMsVUFBVUMsUUFBUSxFQUFFO0lBQzNCLElBQUlDLFFBQVEsR0FBR3JDLENBQUMsQ0FBQ0csUUFBUSxDQUFDLENBQUNtQyxJQUFJLENBQUMsV0FBVyxDQUFDO0lBQzVDLElBQUlGLFFBQVEsR0FBRyxDQUFDLEVBQUU7TUFDakJDLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDSCxRQUFRLENBQUM7SUFDeEIsQ0FBQyxNQUFNO01BQ05DLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDLEdBQUcsQ0FBQztJQUNuQjtFQUNELENBQUMsQ0FBQztBQUNIOzs7Ozs7Ozs7OztBQ2pCQSIsInNvdXJjZXMiOlsid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvanMvbm90eWYvbm90eWYuanMiLCJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8uL2Fzc2V0cy9qcy9zaG9wL2luZGV4LmpzIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzIl0sInNvdXJjZXNDb250ZW50IjpbImltcG9ydCBSb3V0aW5nIGZyb20gXCJmb3Mtcm91dGVyXCI7aW1wb3J0IHJvdXRlcyBmcm9tIFwiL2hvbWUvbW9pc2UvRG9jdW1lbnRzL0NsaWVudHMvQmVuZXZlV2F4L2JlbmV2ZXdheHdlYnNpdGUvdmFyL2NhY2hlL2Zvc1JvdXRlcy5qc29uXCI7Um91dGluZy5zZXRSb3V0aW5nRGF0YShyb3V0ZXMpOyIsIi8qXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXG4gKlxuICogVGhpcyBmaWxlIHdpbGwgYmUgaW5jbHVkZWQgb250byB0aGUgcGFnZSB2aWEgdGhlIGltcG9ydG1hcCgpIFR3aWcgZnVuY3Rpb24sXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxuICovXG5pbXBvcnQgXCIuL3N0eWxlcy9hcHAuc2Nzc1wiXG5pbXBvcnQgXCIuL2pzL3Nob3AvaW5kZXhcIlxuaW1wb3J0IFwiLi9qcy9ub3R5Zi9ub3R5ZlwiXG5cbmNvbnN0ICQgPSByZXF1aXJlKFwianF1ZXJ5XCIpXG5cbnJlcXVpcmUoXCJib290c3RyYXBcIilcbnJlcXVpcmUoXCJib290c3RyYXAtaWNvbnMvZm9udC9ib290c3RyYXAtaWNvbnMuY3NzXCIpXG4iLCJpbXBvcnQgeyBOb3R5ZiB9IGZyb20gXCJub3R5ZlwiXG5pbXBvcnQgXCJub3R5Zi9ub3R5Zi5taW4uY3NzXCJcblxuJChkb2N1bWVudCkub24oXCJET01Db250ZW50TG9hZGVkXCIsICgpID0+IHtcblx0Ly8gSW5pdGlhbGlzYXRpb24gZGUgTm90eWZcblx0Y29uc3Qgbm90eWYgPSBuZXcgTm90eWYoe1xuXHRcdGR1cmF0aW9uOiA0MDAwLFxuXHRcdHJpcHBsZTogdHJ1ZSxcblx0XHRwb3NpdGlvbjoge1xuXHRcdFx0eDogXCJyaWdodFwiLFxuXHRcdFx0eTogXCJ0b3BcIixcblx0XHR9LFxuXHRcdGRpc21pc3NpYmxlOiB0cnVlLFxuXHRcdHR5cGVzOiBbXG5cdFx0XHR7XG5cdFx0XHRcdHR5cGU6IFwic3VjY2Vzc1wiLFxuXHRcdFx0XHRjbGFzc05hbWU6IFwiYmctc3VjY2Vzc1wiLFxuXHRcdFx0XHRpY29uOiB7XG5cdFx0XHRcdFx0Y2xhc3NOYW1lOiBcIm1hdGVyaWFscy1zeW1ib2xzLXJvdW5kZWQgdGV4dC13aGl0ZVwiLFxuXHRcdFx0XHRcdHRhZ05hbWU6IFwic3BhblwiLFxuXHRcdFx0XHRcdHRleHQ6IFwiXCIsXG5cdFx0XHRcdH0sXG5cdFx0XHRcdGJhY2tncm91bmQ6IFwibm9uZVwiLFxuXHRcdFx0fSxcblx0XHRdLFxuXHR9KVxuXG5cdC8vIFV0aWxpc2V6IGNldHRlIGZvbmN0aW9uIHBvdXIgYWZmaWNoZXIgbGVzIG1lc3NhZ2VzIGZsYXNoXG5cdCQoZnVuY3Rpb24gKCkge1xuXHRcdGxldCBmbGFzaGVzID0gJChcIi5mbGFzaC1tZXNzYWdlXCIpXG5cblx0XHRmbGFzaGVzLmVhY2goZnVuY3Rpb24gKGluZGV4LCBmbGFzaCkge1xuXHRcdFx0bGV0IGxhYmVsID0gJChmbGFzaCkuZGF0YShcImxhYmVsXCIpXG5cdFx0XHRsZXQgbWVzc2FnZSA9ICQoZmxhc2gpLmRhdGEoXCJtZXNzYWdlXCIpXG5cblx0XHRcdGlmIChsYWJlbCAhPT0gdW5kZWZpbmVkKSB7XG5cdFx0XHRcdG5vdHlmLm9wZW4oe1xuXHRcdFx0XHRcdHR5cGU6IGxhYmVsLFxuXHRcdFx0XHRcdG1lc3NhZ2U6IG1lc3NhZ2UsXG5cdFx0XHRcdH0pXG5cdFx0XHR9XG5cdFx0XHQkKGZsYXNoKS5yZW1vdmUoKVxuXHRcdH0pXG5cdH0pXG59KVxuIiwiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIlxuXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKFwiRE9NQ29udGVudExvYWRlZFwiLCBmdW5jdGlvbiAoKSB7XG5cdGdldFRvdGFsSXRlbXNBamF4Q2FsbCgpXG59KVxuXG5mdW5jdGlvbiBnZXRUb3RhbEl0ZW1zQWpheENhbGwoKSB7XG5cdCQuYWpheCh7XG5cdFx0dXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXBwX2NhcnRfdG90YWxJdGVtc1wiKSxcblx0fSkuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcblx0XHRsZXQgY2FydEljb24gPSAkKGRvY3VtZW50KS5maW5kKFwiLmNhcnRJY29uXCIpXG5cdFx0aWYgKHJlc3BvbnNlID4gMCkge1xuXHRcdFx0Y2FydEljb24uaHRtbChyZXNwb25zZSlcblx0XHR9IGVsc2Uge1xuXHRcdFx0Y2FydEljb24uaHRtbChcIiBcIilcblx0XHR9XG5cdH0pXG59XG4iLCIvLyBleHRyYWN0ZWQgYnkgbWluaS1jc3MtZXh0cmFjdC1wbHVnaW5cbmV4cG9ydCB7fTsiXSwibmFtZXMiOlsiJCIsInJlcXVpcmUiLCJOb3R5ZiIsImRvY3VtZW50Iiwib24iLCJub3R5ZiIsImR1cmF0aW9uIiwicmlwcGxlIiwicG9zaXRpb24iLCJ4IiwieSIsImRpc21pc3NpYmxlIiwidHlwZXMiLCJ0eXBlIiwiY2xhc3NOYW1lIiwiaWNvbiIsInRhZ05hbWUiLCJ0ZXh0IiwiYmFja2dyb3VuZCIsImZsYXNoZXMiLCJlYWNoIiwiaW5kZXgiLCJmbGFzaCIsImxhYmVsIiwiZGF0YSIsIm1lc3NhZ2UiLCJ1bmRlZmluZWQiLCJvcGVuIiwicmVtb3ZlIiwiUm91dGluZyIsImFkZEV2ZW50TGlzdGVuZXIiLCJnZXRUb3RhbEl0ZW1zQWpheENhbGwiLCJhamF4IiwidXJsIiwiZ2VuZXJhdGUiLCJkb25lIiwicmVzcG9uc2UiLCJjYXJ0SWNvbiIsImZpbmQiLCJodG1sIl0sInNvdXJjZVJvb3QiOiIifQ==