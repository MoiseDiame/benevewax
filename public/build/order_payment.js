(self["webpackChunkbenevewaxwebsite"] = self["webpackChunkbenevewaxwebsite"] || []).push([["order_payment"],{

/***/ "./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!":
/*!***********************************************************************************************************************!*\
  !*** ./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1! ***!
  \***********************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! fos-router */ "./node_modules/fos-router/public/js/router.js");
/* harmony import */ var fos_router__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(fos_router__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _home_moise_Documents_Clients_BeneveWax_benevewaxwebsite_var_cache_fosRoutes_json__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./var/cache/fosRoutes.json */ "./var/cache/fosRoutes.json");
fos_router__WEBPACK_IMPORTED_MODULE_0___default().setRoutingData(_home_moise_Documents_Clients_BeneveWax_benevewaxwebsite_var_cache_fosRoutes_json__WEBPACK_IMPORTED_MODULE_1__);

/***/ }),

/***/ "./assets/js/order/index.js":
/*!**********************************!*\
  !*** ./assets/js/order/index.js ***!
  \**********************************/
/***/ ((__unused_webpack_module, __unused_webpack_exports, __webpack_require__) => {

/* provided dependency */ var $ = __webpack_require__(/*! jquery */ "./node_modules/jquery/dist/jquery.js");
__webpack_require__(/*! core-js/modules/es.array.find.js */ "./node_modules/core-js/modules/es.array.find.js");
__webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
$(document).on("DOMContentLoaded", function () {
  var paymentButton = $(document).find("button");
  console.log(paymentButton);
  console.log("here");
  paymentButton.on("click", function () {
    console.log("clicked");
    // $.ajax({
    // 	url: $(this).data("url"),
    // 	method: "POST",
    // }).done(function (response) {
    // 	console.log(response)
    // 	buy(response)
    // })
  });
});
function buy(resp) {
  new PayTech({}).withOption({
    tokenUrl: resp.redirect_url,
    prensentationMode: PayTech.OPEN_IN_POPUP
  }).send();
}

/***/ }),

/***/ "./var/cache/fosRoutes.json":
/*!**********************************!*\
  !*** ./var/cache/fosRoutes.json ***!
  \**********************************/
/***/ ((module) => {

"use strict";
module.exports = JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');

/***/ })

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/js/order/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,eyJ2ZXJzaW9uIjozLCJmaWxlIjoib3JkZXJfcGF5bWVudC5qcyIsIm1hcHBpbmdzIjoiOzs7Ozs7Ozs7Ozs7O0FBQXdJLGdFQUFzQixDQUFDLDhHQUFNOzs7Ozs7Ozs7Ozs7O0FDQXJLQSxDQUFDLENBQUNDLFFBQVEsQ0FBQyxDQUFDQyxFQUFFLENBQUMsa0JBQWtCLEVBQUUsWUFBWTtFQUM5QyxJQUFJQyxhQUFhLEdBQUdILENBQUMsQ0FBQ0MsUUFBUSxDQUFDLENBQUNHLElBQUksQ0FBQyxRQUFRLENBQUM7RUFFOUNDLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDSCxhQUFhLENBQUM7RUFDMUJFLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDLE1BQU0sQ0FBQztFQUVuQkgsYUFBYSxDQUFDRCxFQUFFLENBQUMsT0FBTyxFQUFFLFlBQVk7SUFDckNHLE9BQU8sQ0FBQ0MsR0FBRyxDQUFDLFNBQVMsQ0FBQztJQUN0QjtJQUNBO0lBQ0E7SUFDQTtJQUNBO0lBQ0E7SUFDQTtFQUNELENBQUMsQ0FBQztBQUNILENBQUMsQ0FBQztBQUVGLFNBQVNDLEdBQUdBLENBQUNDLElBQUksRUFBRTtFQUNsQixJQUFJQyxPQUFPLENBQUMsQ0FBQyxDQUFDLENBQUMsQ0FDYkMsVUFBVSxDQUFDO0lBQ1hDLFFBQVEsRUFBRUgsSUFBSSxDQUFDSSxZQUFZO0lBRTNCQyxpQkFBaUIsRUFBRUosT0FBTyxDQUFDSztFQUM1QixDQUFDLENBQUMsQ0FDREMsSUFBSSxDQUFDLENBQUM7QUFDVCIsInNvdXJjZXMiOlsid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvanMvb3JkZXIvaW5kZXguanMiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0IFJvdXRpbmcgZnJvbSBcImZvcy1yb3V0ZXJcIjtpbXBvcnQgcm91dGVzIGZyb20gXCIvaG9tZS9tb2lzZS9Eb2N1bWVudHMvQ2xpZW50cy9CZW5ldmVXYXgvYmVuZXZld2F4d2Vic2l0ZS92YXIvY2FjaGUvZm9zUm91dGVzLmpzb25cIjtSb3V0aW5nLnNldFJvdXRpbmdEYXRhKHJvdXRlcyk7IiwiJChkb2N1bWVudCkub24oXCJET01Db250ZW50TG9hZGVkXCIsIGZ1bmN0aW9uICgpIHtcblx0dmFyIHBheW1lbnRCdXR0b24gPSAkKGRvY3VtZW50KS5maW5kKFwiYnV0dG9uXCIpXG5cblx0Y29uc29sZS5sb2cocGF5bWVudEJ1dHRvbilcblx0Y29uc29sZS5sb2coXCJoZXJlXCIpXG5cblx0cGF5bWVudEJ1dHRvbi5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblx0XHRjb25zb2xlLmxvZyhcImNsaWNrZWRcIilcblx0XHQvLyAkLmFqYXgoe1xuXHRcdC8vIFx0dXJsOiAkKHRoaXMpLmRhdGEoXCJ1cmxcIiksXG5cdFx0Ly8gXHRtZXRob2Q6IFwiUE9TVFwiLFxuXHRcdC8vIH0pLmRvbmUoZnVuY3Rpb24gKHJlc3BvbnNlKSB7XG5cdFx0Ly8gXHRjb25zb2xlLmxvZyhyZXNwb25zZSlcblx0XHQvLyBcdGJ1eShyZXNwb25zZSlcblx0XHQvLyB9KVxuXHR9KVxufSlcblxuZnVuY3Rpb24gYnV5KHJlc3ApIHtcblx0bmV3IFBheVRlY2goe30pXG5cdFx0LndpdGhPcHRpb24oe1xuXHRcdFx0dG9rZW5Vcmw6IHJlc3AucmVkaXJlY3RfdXJsLFxuXG5cdFx0XHRwcmVuc2VudGF0aW9uTW9kZTogUGF5VGVjaC5PUEVOX0lOX1BPUFVQLFxuXHRcdH0pXG5cdFx0LnNlbmQoKVxufVxuIl0sIm5hbWVzIjpbIiQiLCJkb2N1bWVudCIsIm9uIiwicGF5bWVudEJ1dHRvbiIsImZpbmQiLCJjb25zb2xlIiwibG9nIiwiYnV5IiwicmVzcCIsIlBheVRlY2giLCJ3aXRoT3B0aW9uIiwidG9rZW5VcmwiLCJyZWRpcmVjdF91cmwiLCJwcmVuc2VudGF0aW9uTW9kZSIsIk9QRU5fSU5fUE9QVVAiLCJzZW5kIl0sInNvdXJjZVJvb3QiOiIifQ==