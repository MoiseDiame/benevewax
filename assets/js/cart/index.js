import Routing from "fos-router"

document.addEventListener("DOMContentLoaded", function () {
	getTotalItemsAjaxCall()
	sendShippingFeesAjax()
	secureCountryChoice()
	updateItemsInCart()

	let selectDestination = $(document).find("#cart_destination")
	let buttonShowSubmitForm = $(document).find("#showSubmitForm")

	selectDestination.on("change", function () {
		sendShippingFeesAjax()
		secureCountryChoice()
	})

	buttonShowSubmitForm.on("click", function () {
		$(this).addClass("d-none")
		$(document).find("#infosPersonnellesLivraison").removeClass("d-none")
	})
})

function secureCountryChoice() {
	let selectDestination = $(document).find("#cart_destination")

	if (selectDestination.val() == "france") {
		$(document).find("#cart_pays").val("FRANCE")
		$(document).find("#cart_pays").attr("readonly", true)
	} else {
		$(document).find("#cart_pays").val("")
		$(document).find("#cart_pays").attr("readonly", false)
	}
}
function sendShippingFeesAjax() {
	let destination = $(document).find("#cart_destination").val()

	let data = $(document).find("#cart_destination").serializeArray(destination)

	$.ajax({
		url: Routing.generate("app_cart"),
		data: data,
	}).done(function (response) {
		$(document)
			.find("#shippingFees")
			.replaceWith($(response).find("#shippingFees"))
		$(document)
			.find("#total_to_pay")
			.replaceWith($(response).find("#total_to_pay"))
	})
}

function updateItemsInCart() {
	let increaseButton = $(document).find(".bi-plus-square-dotted")
	let decreaseButton = $(document).find(".bi-dash-square-dotted")

	increaseButton.add(decreaseButton).on("click", function () {
		getTotalItemsAjaxCall()
	})
}

function getTotalItemsAjaxCall() {
	$.ajax({
		url: Routing.generate("app_cart_totalItems"),
	}).done(function (response) {
		let cartIcon = $(document).find(".cartIcon")
		if (response > 0) {
			cartIcon.html(response)
		}
	})
}
