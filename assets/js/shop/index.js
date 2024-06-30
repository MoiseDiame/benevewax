import Routing from "fos-router"

document.addEventListener("DOMContentLoaded", function () {
	getTotalItemsAjaxCall()
})

function getTotalItemsAjaxCall() {
	$.ajax({
		url: Routing.generate("app_cart_totalItems"),
	}).done(function (response) {
		let cartIcon = $(document).find(".cartIcon")
		if (response > 0) {
			cartIcon.html(response)
		} else {
			cartIcon.html(" ")
		}
	})
}
