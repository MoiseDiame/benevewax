import Routing from "fos-router"

document.addEventListener("DOMContentLoaded", function () {
	sendShippingFeesAjax()

	let selectDestination = $(document).find("#cartSubmitFormSelect")

	selectDestination.on("change", function () {
		sendShippingFeesAjax()
	})
})

function sendShippingFeesAjax() {
	let destination = $(document).find("#cartSubmitFormSelect").val()

	let data = $(document)
		.find("#cartSubmitFormSelect")
		.serializeArray(destination)

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
