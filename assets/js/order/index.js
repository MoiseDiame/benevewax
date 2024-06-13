$(document).on("DOMContentLoaded", function () {
	var paymentButton = $(document).find("button")

	console.log(paymentButton)
	console.log("here")

	paymentButton.on("click", function () {
		console.log("clicked")
		$.ajax({
			url: $(this).data("url"),
			method: "POST",
		}).done(function (response) {
			console.log(response)
			buy(response)
		})
	})
})

function buy(resp) {
	new PayTech({})
		.withOption({
			tokenUrl: resp.redirect_url,

			prensentationMode: PayTech.OPEN_IN_POPUP,
		})
		.send()
}
