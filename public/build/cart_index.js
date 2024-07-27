"use strict";
(self["webpackChunkbenevewaxwebsite"] = self["webpackChunkbenevewaxwebsite"] || []).push([["cart_index"],{

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

/***/ "./assets/js/cart/index.js":
/*!*********************************!*\
  !*** ./assets/js/cart/index.js ***!
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
  sendShippingFeesAjax();
  secureCountryChoice();
  updateItemsInCart();
  var selectDestination = $(document).find("#cart_destination");
  var buttonShowSubmitForm = $(document).find("#showSubmitForm");
  selectDestination.on("change", function () {
    sendShippingFeesAjax();
    secureCountryChoice();
  });
  buttonShowSubmitForm.on("click", function () {
    $(this).addClass("d-none");
    $(document).find("#infosPersonnellesLivraison").removeClass("d-none");
  });
});
function secureCountryChoice() {
  var selectDestination = $(document).find("#cart_destination");
  if (selectDestination.val() == "france") {
    $(document).find("#cart_pays").val("FRANCE");
    $(document).find("#cart_pays").attr("readonly", true);
  } else {
    $(document).find("#cart_pays").val("");
    $(document).find("#cart_pays").attr("readonly", false);
  }
}
function sendShippingFeesAjax() {
  var destination = $(document).find("#cart_destination").val();
  var data = $(document).find("#cart_destination").serializeArray(destination);
  $.ajax({
    url: fos_router__WEBPACK_IMPORTED_MODULE_2___default().generate("app_cart"),
    data: data
  }).done(function (response) {
    $(document).find("#shippingFees").replaceWith($(response).find("#shippingFees"));
    $(document).find("#total_to_pay").replaceWith($(response).find("#total_to_pay"));
  });
}
function updateItemsInCart() {
  var increaseButton = $(document).find(".bi-plus-square-dotted");
  var decreaseButton = $(document).find(".bi-dash-square-dotted");
  increaseButton.add(decreaseButton).on("click", function () {
    getTotalItemsAjaxCall();
  });
}
function getTotalItemsAjaxCall() {
  $.ajax({
    url: fos_router__WEBPACK_IMPORTED_MODULE_2___default().generate("app_cart_totalItems")
  }).done(function (response) {
    var cartIcon = $(document).find(".cartIcon");
    if (response > 0) {
      cartIcon.html(response);
    }
  });
}

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
/******/ __webpack_require__.O(0, ["vendors-node_modules_fos-router_public_js_router_js-node_modules_jquery_dist_jquery_js-node_m-f4c929"], () => (__webpack_exec__("./node_modules/@bpnetguy/webpack-inject-plugin/dist/webpack-inject-plugin.loader.js?id=webpack-inject-module-1!"), __webpack_exec__("./assets/js/cart/index.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QyxDQUFDZSxRQUFRLENBQUMsQ0FBQ2QsSUFBSSxDQUFDLGVBQWUsQ0FBQyxDQUFDO0VBQ2pELENBQUMsQ0FBQztBQUNIO0FBRUEsU0FBU0gsaUJBQWlCQSxDQUFBLEVBQUc7RUFDNUIsSUFBSW1CLGNBQWMsR0FBR2pCLENBQUMsQ0FBQ1AsUUFBUSxDQUFDLENBQUNRLElBQUksQ0FBQyx3QkFBd0IsQ0FBQztFQUMvRCxJQUFJaUIsY0FBYyxHQUFHbEIsQ0FBQyxDQUFDUCxRQUFRLENBQUMsQ0FBQ1EsSUFBSSxDQUFDLHdCQUF3QixDQUFDO0VBRS9EZ0IsY0FBYyxDQUFDRSxHQUFHLENBQUNELGNBQWMsQ0FBQyxDQUFDZixFQUFFLENBQUMsT0FBTyxFQUFFLFlBQVk7SUFDMURSLHFCQUFxQixDQUFDLENBQUM7RUFDeEIsQ0FBQyxDQUFDO0FBQ0g7QUFFQSxTQUFTQSxxQkFBcUJBLENBQUEsRUFBRztFQUNoQ0ssQ0FBQyxDQUFDVyxJQUFJLENBQUM7SUFDTkMsR0FBRyxFQUFFcEIsMERBQWdCLENBQUMscUJBQXFCO0VBQzVDLENBQUMsQ0FBQyxDQUFDc0IsSUFBSSxDQUFDLFVBQVVDLFFBQVEsRUFBRTtJQUMzQixJQUFJSyxRQUFRLEdBQUdwQixDQUFDLENBQUNQLFFBQVEsQ0FBQyxDQUFDUSxJQUFJLENBQUMsV0FBVyxDQUFDO0lBQzVDLElBQUljLFFBQVEsR0FBRyxDQUFDLEVBQUU7TUFDakJLLFFBQVEsQ0FBQ0MsSUFBSSxDQUFDTixRQUFRLENBQUM7SUFDeEI7RUFDRCxDQUFDLENBQUM7QUFDSCIsInNvdXJjZXMiOlsid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvIiwid2VicGFjazovL2JlbmV2ZXdheHdlYnNpdGUvLi9hc3NldHMvanMvY2FydC9pbmRleC5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJpbXBvcnQgUm91dGluZyBmcm9tIFwiZm9zLXJvdXRlclwiO2ltcG9ydCByb3V0ZXMgZnJvbSBcIi9ob21lL21vaXNlL0RvY3VtZW50cy9DbGllbnRzL0JlbmV2ZVdheC9iZW5ldmV3YXh3ZWJzaXRlL3Zhci9jYWNoZS9mb3NSb3V0ZXMuanNvblwiO1JvdXRpbmcuc2V0Um91dGluZ0RhdGEocm91dGVzKTsiLCJpbXBvcnQgUm91dGluZyBmcm9tIFwiZm9zLXJvdXRlclwiXG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoXCJET01Db250ZW50TG9hZGVkXCIsIGZ1bmN0aW9uICgpIHtcblx0Z2V0VG90YWxJdGVtc0FqYXhDYWxsKClcblx0c2VuZFNoaXBwaW5nRmVlc0FqYXgoKVxuXHRzZWN1cmVDb3VudHJ5Q2hvaWNlKClcblx0dXBkYXRlSXRlbXNJbkNhcnQoKVxuXG5cdGxldCBzZWxlY3REZXN0aW5hdGlvbiA9ICQoZG9jdW1lbnQpLmZpbmQoXCIjY2FydF9kZXN0aW5hdGlvblwiKVxuXHRsZXQgYnV0dG9uU2hvd1N1Ym1pdEZvcm0gPSAkKGRvY3VtZW50KS5maW5kKFwiI3Nob3dTdWJtaXRGb3JtXCIpXG5cblx0c2VsZWN0RGVzdGluYXRpb24ub24oXCJjaGFuZ2VcIiwgZnVuY3Rpb24gKCkge1xuXHRcdHNlbmRTaGlwcGluZ0ZlZXNBamF4KClcblx0XHRzZWN1cmVDb3VudHJ5Q2hvaWNlKClcblx0fSlcblxuXHRidXR0b25TaG93U3VibWl0Rm9ybS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblx0XHQkKHRoaXMpLmFkZENsYXNzKFwiZC1ub25lXCIpXG5cdFx0JChkb2N1bWVudCkuZmluZChcIiNpbmZvc1BlcnNvbm5lbGxlc0xpdnJhaXNvblwiKS5yZW1vdmVDbGFzcyhcImQtbm9uZVwiKVxuXHR9KVxufSlcblxuZnVuY3Rpb24gc2VjdXJlQ291bnRyeUNob2ljZSgpIHtcblx0bGV0IHNlbGVjdERlc3RpbmF0aW9uID0gJChkb2N1bWVudCkuZmluZChcIiNjYXJ0X2Rlc3RpbmF0aW9uXCIpXG5cblx0aWYgKHNlbGVjdERlc3RpbmF0aW9uLnZhbCgpID09IFwiZnJhbmNlXCIpIHtcblx0XHQkKGRvY3VtZW50KS5maW5kKFwiI2NhcnRfcGF5c1wiKS52YWwoXCJGUkFOQ0VcIilcblx0XHQkKGRvY3VtZW50KS5maW5kKFwiI2NhcnRfcGF5c1wiKS5hdHRyKFwicmVhZG9ubHlcIiwgdHJ1ZSlcblx0fSBlbHNlIHtcblx0XHQkKGRvY3VtZW50KS5maW5kKFwiI2NhcnRfcGF5c1wiKS52YWwoXCJcIilcblx0XHQkKGRvY3VtZW50KS5maW5kKFwiI2NhcnRfcGF5c1wiKS5hdHRyKFwicmVhZG9ubHlcIiwgZmFsc2UpXG5cdH1cbn1cbmZ1bmN0aW9uIHNlbmRTaGlwcGluZ0ZlZXNBamF4KCkge1xuXHRsZXQgZGVzdGluYXRpb24gPSAkKGRvY3VtZW50KS5maW5kKFwiI2NhcnRfZGVzdGluYXRpb25cIikudmFsKClcblxuXHRsZXQgZGF0YSA9ICQoZG9jdW1lbnQpLmZpbmQoXCIjY2FydF9kZXN0aW5hdGlvblwiKS5zZXJpYWxpemVBcnJheShkZXN0aW5hdGlvbilcblxuXHQkLmFqYXgoe1xuXHRcdHVybDogUm91dGluZy5nZW5lcmF0ZShcImFwcF9jYXJ0XCIpLFxuXHRcdGRhdGE6IGRhdGEsXG5cdH0pLmRvbmUoZnVuY3Rpb24gKHJlc3BvbnNlKSB7XG5cdFx0JChkb2N1bWVudClcblx0XHRcdC5maW5kKFwiI3NoaXBwaW5nRmVlc1wiKVxuXHRcdFx0LnJlcGxhY2VXaXRoKCQocmVzcG9uc2UpLmZpbmQoXCIjc2hpcHBpbmdGZWVzXCIpKVxuXHRcdCQoZG9jdW1lbnQpXG5cdFx0XHQuZmluZChcIiN0b3RhbF90b19wYXlcIilcblx0XHRcdC5yZXBsYWNlV2l0aCgkKHJlc3BvbnNlKS5maW5kKFwiI3RvdGFsX3RvX3BheVwiKSlcblx0fSlcbn1cblxuZnVuY3Rpb24gdXBkYXRlSXRlbXNJbkNhcnQoKSB7XG5cdGxldCBpbmNyZWFzZUJ1dHRvbiA9ICQoZG9jdW1lbnQpLmZpbmQoXCIuYmktcGx1cy1zcXVhcmUtZG90dGVkXCIpXG5cdGxldCBkZWNyZWFzZUJ1dHRvbiA9ICQoZG9jdW1lbnQpLmZpbmQoXCIuYmktZGFzaC1zcXVhcmUtZG90dGVkXCIpXG5cblx0aW5jcmVhc2VCdXR0b24uYWRkKGRlY3JlYXNlQnV0dG9uKS5vbihcImNsaWNrXCIsIGZ1bmN0aW9uICgpIHtcblx0XHRnZXRUb3RhbEl0ZW1zQWpheENhbGwoKVxuXHR9KVxufVxuXG5mdW5jdGlvbiBnZXRUb3RhbEl0ZW1zQWpheENhbGwoKSB7XG5cdCQuYWpheCh7XG5cdFx0dXJsOiBSb3V0aW5nLmdlbmVyYXRlKFwiYXBwX2NhcnRfdG90YWxJdGVtc1wiKSxcblx0fSkuZG9uZShmdW5jdGlvbiAocmVzcG9uc2UpIHtcblx0XHRsZXQgY2FydEljb24gPSAkKGRvY3VtZW50KS5maW5kKFwiLmNhcnRJY29uXCIpXG5cdFx0aWYgKHJlc3BvbnNlID4gMCkge1xuXHRcdFx0Y2FydEljb24uaHRtbChyZXNwb25zZSlcblx0XHR9XG5cdH0pXG59XG4iXSwibmFtZXMiOlsiUm91dGluZyIsImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsImdldFRvdGFsSXRlbXNBamF4Q2FsbCIsInNlbmRTaGlwcGluZ0ZlZXNBamF4Iiwic2VjdXJlQ291bnRyeUNob2ljZSIsInVwZGF0ZUl0ZW1zSW5DYXJ0Iiwic2VsZWN0RGVzdGluYXRpb24iLCIkIiwiZmluZCIsImJ1dHRvblNob3dTdWJtaXRGb3JtIiwib24iLCJhZGRDbGFzcyIsInJlbW92ZUNsYXNzIiwidmFsIiwiYXR0ciIsImRlc3RpbmF0aW9uIiwiZGF0YSIsInNlcmlhbGl6ZUFycmF5IiwiYWpheCIsInVybCIsImdlbmVyYXRlIiwiZG9uZSIsInJlc3BvbnNlIiwicmVwbGFjZVdpdGgiLCJpbmNyZWFzZUJ1dHRvbiIsImRlY3JlYXNlQnV0dG9uIiwiYWRkIiwiY2FydEljb24iLCJodG1sIl0sInNvdXJjZVJvb3QiOiIifQ==