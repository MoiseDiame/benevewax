"use strict";(self.webpackChunkbenevewaxwebsite=self.webpackChunkbenevewaxwebsite||[]).push([[629],{6189:(t,e,n)=>{var a=n(6672),o=n.n(a);const s=JSON.parse('{"base_url":"","routes":{"app_cart":{"tokens":[["text","/cart"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_cart_totalItems":{"tokens":[["text","/cart/updateTotalItems"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":[],"schemes":[]},"app_paytech":{"tokens":[["variable","/","[^/]++","orderRef",true],["text","/paytech"]],"defaults":[],"requirements":[],"hosttokens":[],"methods":["POST"],"schemes":[]}},"prefix":"","host":"localhost","port":"","scheme":"http","locale":""}');o().setRoutingData(s)},1665:(t,e,n)=>{n(5728),n(228);var a=n(6672),o=n.n(a),s=n(9755);function d(){"france"==s(document).find("#cart_destination").val()?(s(document).find("#cart_pays").val("FRANCE"),s(document).find("#cart_pays").attr("readonly",!0)):(s(document).find("#cart_pays").val(""),s(document).find("#cart_pays").attr("readonly",!1))}function c(){var t=s(document).find("#cart_destination").val(),e=s(document).find("#cart_destination").serializeArray(t);s.ajax({url:o().generate("app_cart"),data:e}).done((function(t){s(document).find("#shippingFees").replaceWith(s(t).find("#shippingFees")),s(document).find("#total_to_pay").replaceWith(s(t).find("#total_to_pay"))}))}function i(){s.ajax({url:o().generate("app_cart_totalItems")}).done((function(t){var e=s(document).find(".cartIcon");t>0&&e.html(t)}))}document.addEventListener("DOMContentLoaded",(function(){var t,e;i(),c(),d(),t=s(document).find(".bi-plus-square-dotted"),e=s(document).find(".bi-dash-square-dotted"),t.add(e).on("click",(function(){i()}));var n=s(document).find("#cart_destination"),a=s(document).find("#showSubmitForm");n.on("change",(function(){c(),d()})),a.on("click",(function(){s(this).addClass("d-none"),s(document).find("#infosPersonnellesLivraison").removeClass("d-none")}))}))}},t=>{var e=e=>t(t.s=e);t.O(0,[756],(()=>(e(6189),e(1665))));t.O()}]);