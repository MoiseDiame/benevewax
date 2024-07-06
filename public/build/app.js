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

module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929","vendors-node_modules_bootstrap_dist_js_bootstrap_esm_js-node_modules_bootstrap-icons_font_boo-b74508"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoiYXBwLmpzIiwibWFwcGluZ3MiOiI7Ozs7Ozs7Ozs7Ozs7QUFBd0ksZ0VBQXNCLENBQUMsOEdBQU07Ozs7Ozs7Ozs7Ozs7O0FDQXJLO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUMwQjtBQUNGO0FBQ0M7QUFFekIsSUFBTUEsQ0FBQyxHQUFHQyxtQkFBTyxDQUFDLG9EQUFRLENBQUM7QUFFM0JBLG1CQUFPLENBQUMsb0VBQVcsQ0FBQztBQUNwQkEsbUJBQU8sQ0FBQyx5R0FBMEMsQ0FBQzs7Ozs7Ozs7Ozs7Ozs7QUNidEI7QUFDRDtBQUU1QkQsQ0FBQyxDQUFDRyxRQUFRLENBQUMsQ0FBQ0MsRUFBRSxDQUFDLGtCQUFrQixFQUFFLFlBQU07RUFDeEM7RUFDQSxJQUFNQyxLQUFLLEdBQUcsSUFBSUgsd0NBQUssQ0FBQztJQUN2QkksUUFBUSxFQUFFLElBQUk7SUFDZEMsTUFBTSxFQUFFLElBQUk7SUFDWkMsUUFBUSxFQUFFO01BQ1RDLENBQUMsRUFBRSxPQUFPO01BQ1ZDLENBQUMsRUFBRTtJQUNKLENBQUM7SUFDREMsV0FBVyxFQUFFLElBQUk7SUFDakJDLEtBQUssRUFBRSxDQUNOO01BQ0NDLElBQUksRUFBRSxTQUFTO01BQ2ZDLFNBQVMsRUFBRSxZQUFZO01BQ3ZCQyxJQUFJLEVBQUU7UUFDTEQsU0FBUyxFQUFFLHNDQUFzQztRQUNqREUsT0FBTyxFQUFFLE1BQU07UUFDZkMsSUFBSSxFQUFFO01BQ1AsQ0FBQztNQUNEQyxVQUFVLEVBQUU7SUFDYixDQUFDO0VBRUgsQ0FBQyxDQUFDOztFQUVGO0VBQ0FsQixDQUFDLENBQUMsWUFBWTtJQUNiLElBQUltQixPQUFPLEdBQUduQixDQUFDLENBQUMsZ0JBQWdCLENBQUM7SUFFakNtQixPQUFPLENBQUNDLElBQUksQ0FBQyxVQUFVQyxLQUFLLEVBQUVDLEtBQUssRUFBRTtNQUNwQyxJQUFJQyxLQUFLLEdBQUd2QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLE9BQU8sQ0FBQztNQUNsQyxJQUFJQyxPQUFPLEdBQUd6QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ0UsSUFBSSxDQUFDLFNBQVMsQ0FBQztNQUV0QyxJQUFJRCxLQUFLLEtBQUtHLFNBQVMsRUFBRTtRQUN4QnJCLEtBQUssQ0FBQ3NCLElBQUksQ0FBQztVQUNWZCxJQUFJLEVBQUVVLEtBQUs7VUFDWEUsT0FBTyxFQUFFQTtRQUNWLENBQUMsQ0FBQztNQUNIO01BQ0F6QixDQUFDLENBQUNzQixLQUFLLENBQUMsQ0FBQ00sTUFBTSxDQUFDLENBQUM7SUFDbEIsQ0FBQyxDQUFDO0VBQ0gsQ0FBQyxDQUFDO0FBQ0gsQ0FBQyxDQUFDOzs7Ozs7Ozs7Ozs7Ozs7Ozs7OztBQzVDOEI7QUFFaEN6QixRQUFRLENBQUMyQixnQkFBZ0IsQ0FBQyxrQkFBa0IsRUFBRSxZQUFZO0VBQ3pEQyxxQkFBcUIsQ0FBQyxDQUFDO0FBQ3hCLENBQUMsQ0FBQztBQUVGLFNBQVNBLHFCQUFxQkEsQ0FBQSxFQUFHO0VBQ2hDL0IsQ0FBQyxDQUFDZ0MsSUFBSSxDQUFDO0lBQ05DLEdBQUcsRUFBRUosMERBQWdCLENBQUMscUJBQXFCO0VBQzVDLENBQUMsQ0FBQyxDQUFDTSxJQUFJLENBQUMsVUFBVUMsUUFBUSxFQUFFO0lBQzNCLElBQUlDLFFBQVEsR0FBR3JDLENBQUMsQ0FBQ0csUUFBUSxDQUFDLENBQUNtQyxJQUFJLENBQUMsV0FBVyxDQUFDO0lBQzVDLElBQUlGLFFBQVEsR0FBRyxDQUFDLEVBQUU7TUFDakJDLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDSCxRQUFRLENBQUM7SUFDeEIsQ0FBQyxNQUFNO01BQ05DLFFBQVEsQ0FBQ0UsSUFBSSxDQUFDLEdBQUcsQ0FBQztJQUNuQjtFQUNELENBQUMsQ0FBQztBQUNIOzs7Ozs7Ozs7OztBQ2pCQSIsInNvdXJjZXMiOlsid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvanMvbm90eWYvbm90eWYuanMiLCJ3ZWJwYWNrOi8vYmVuZXZld2F4d2Vic2l0ZS8uL2Fzc2V0cy9qcy9zaG9wL2luZGV4LmpzIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIjtpbXBvcnQgcm91dGVzIGZyb20gXCIvaG9tZS9tb2lzZS9Eb2N1bWVudHMvQ2xpZW50cy9CZW5ldmVXYXgvYmVuZXZld2F4d2Vic2l0ZS92YXIvY2FjaGUvZm9zUm91dGVzLmpzb25cIjtSb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7IiwiLypcbiAqIFdlbGNvbWUgdG8geW91ciBhcHAncyBtYWluIEphdmFTY3JpcHQgZmlsZSFcbiAqXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcbiAqIHdoaWNoIHNob3VsZCBhbHJlYWR5IGJlIGluIHlvdXIgYmFzZS5odG1sLnR3aWcuXG4gKi9cbmltcG9ydCBcIi4vc3R5bGVzL2FwcC5zY3NzXCJcbmltcG9ydCBcIi4vanMvc2hvcC9pbmRleFwiXG5pbXBvcnQgXCIuL2pzL25vdHlmL25vdHlmXCJcblxuY29uc3QgJCA9IHJlcXVpcmUoXCJqcXVlcnlcIilcblxucmVxdWlyZShcImJvb3RzdHJhcFwiKVxucmVxdWlyZShcImJvb3RzdHJhcC1pY29ucy9mb250L2Jvb3RzdHJhcC1pY29ucy5jc3NcIilcbiIsImltcG9ydCB7IE5vdHlmIH0gZnJvbSBcIm5vdHlmXCJcbmltcG9ydCBcIm5vdHlmL25vdHlmLm1pbi5jc3NcIlxuXG4kKGRvY3VtZW50KS5vbihcIkRPTUNvbnRlbnRMb2FkZWRcIiwgKCkgPT4ge1xuXHQvLyBJbml0aWFsaXNhdGlvbiBkZSBOb3R5ZlxuXHRjb25zdCBub3R5ZiA9IG5ldyBOb3R5Zih7XG5cdFx0ZHVyYXRpb246IDQwMDAsXG5cdFx0cmlwcGxlOiB0cnVlLFxuXHRcdHBvc2l0aW9uOiB7XG5cdFx0XHR4OiBcInJpZ2h0XCIsXG5cdFx0XHR5OiBcInRvcFwiLFxuXHRcdH0sXG5cdFx0ZGlzbWlzc2libGU6IHRydWUsXG5cdFx0dHlwZXM6IFtcblx0XHRcdHtcblx0XHRcdFx0dHlwZTogXCJzdWNjZXNzXCIsXG5cdFx0XHRcdGNsYXNzTmFtZTogXCJiZy1zdWNjZXNzXCIsXG5cdFx0XHRcdGljb246IHtcblx0XHRcdFx0XHRjbGFzc05hbWU6IFwibWF0ZXJpYWxzLXN5bWJvbHMtcm91bmRlZCB0ZXh0LXdoaXRlXCIsXG5cdFx0XHRcdFx0dGFnTmFtZTogXCJzcGFuXCIsXG5cdFx0XHRcdFx0dGV4dDogXCJcIixcblx0XHRcdFx0fSxcblx0XHRcdFx0YmFja2dyb3VuZDogXCJub25lXCIsXG5cdFx0XHR9LFxuXHRcdF0sXG5cdH0pXG5cblx0Ly8gVXRpbGlzZXogY2V0dGUgZm9uY3Rpb24gcG91ciBhZmZpY2hlciBsZXMgbWVzc2FnZXMgZmxhc2hcblx0JChmdW5jdGlvbiAoKSB7XG5cdFx0bGV0IGZsYXNoZXMgPSAkKFwiLmZsYXNoLW1lc3NhZ2VcIilcblxuXHRcdGZsYXNoZXMuZWFjaChmdW5jdGlvbiAoaW5kZXgsIGZsYXNoKSB7XG5cdFx0XHRsZXQgbGFiZWwgPSAkKGZsYXNoKS5kYXRhKFwibGFiZWxcIilcblx0XHRcdGxldCBtZXNzYWdlID0gJChmbGFzaCkuZGF0YShcIm1lc3NhZ2VcIilcblxuXHRcdFx0aWYgKGxhYmVsICE9PSB1bmRlZmluZWQpIHtcblx0XHRcdFx0bm90eWYub3Blbih7XG5cdFx0XHRcdFx0dHlwZTogbGFiZWwsXG5cdFx0XHRcdFx0bWVzc2FnZTogbWVzc2FnZSxcblx0XHRcdFx0fSlcblx0XHRcdH1cblx0XHRcdCQoZmxhc2gpLnJlbW92ZSgpXG5cdFx0fSlcblx0fSlcbn0pXG4iLCJpbXBvcnQgUm91dGluZyBmcm9tIFwiZm9zLXJvdXRlclwiXG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJET01Db250ZW50TG9hZGVkXCIsIGZ1bmN0aW9uICgpIHtcblx0Z2V0VG90YWxJdGVtc0FqYXhDYWxsKClcbn0pXG5cbmZ1bmN0aW9uIGdldFRvdGFsSXRlbXNBamF4Q2FsbCgpIHtcblx0JC5hamF4KHtcblx0XHR1cmw6IFJvdXRpbmcuZ2VuZXJhdGUoXCJhcHBfY2FydF90b3RhbEl0ZW1zXCIpLFxuXHR9KS5kb25lKGZ1bmN0aW9uIChyZXNwb25zZSkge1xuXHRcdGxldCBjYXJ0SWNvbiA9ICQoZG9jdW1lbnQpLmZpbmQoXCIuY2FydEljb25cIilcblx0XHRpZiAocmVzcG9uc2UgPiAwKSB7XG5cdFx0XHRjYXJ0SWNvbi5odG1sKHJlc3BvbnNlKVxuXHRcdH0gZWxzZSB7XG5cdFx0XHRjYXJ0SWNvbi5odG1sKFwiIFwiKVxuXHRcdH1cblx0fSlcbn1cbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyIkIiwicmVxdWlyZSIsIk5vdHlmIiwiZG9jdW1lbnQiLCJvbiIsIm5vdHlmIiwiZHVyYXRpb24iLCJyaXBwbGUiLCJwb3NpdGlvbiIsIngiLCJ5IiwiZGlzbWlzc2libGUiLCJ0eXBlcyIsInR5cGUiLCJjbGFzc05hbWUiLCJpY29uIiwidGFnTmFtZSIsInRleHQiLCJiYWNrZ3JvdW5kIiwiZmxhc2hlcyIsImVhY2giLCJpbmRleCIsImZsYXNoIiwibGFiZWwiLCJkYXRhIiwibWVzc2FnZSIsInVuZGVmaW5lZCIsIm9wZW4iLCJyZW1vdmUiLCJSb3V0aW5nIiwiYWRkRXZlbnRMaXN0ZW5lciIsImdldFRvdGFsSXRlbXNBamF4Q2FsbCIsImFqYXgiLCJ1cmwiLCJnZW5lcmF0ZSIsImRvbmUiLCJyZXNwb25zZSIsImNhcnRJY29uIiwiZmluZCIsImh0bWwiXSwic291cmNlUm9vdCI6IiJ9