import { loadScript } from "@paypal/paypal-js"
import Routing from "fos-router"

$(document).on("DOMContentLoaded", async function () {
	let paypal
	try {
		let clientId = $(document).find("#paymentButton").data("clientid")

		paypal = await loadScript({
			clientId: clientId,
			currency: "EUR",
		})
	} catch (error) {
		console.error("failed to load the PayPal JS SDK script", error)
	}

	if (paypal) {
		$.ajax({
			url: Routing.generate("app_order_details", {
				orderRef: $(document).find("#paymentButton").data("orderref"),
			}),
		}).done(async function (response) {
			let orderInfos = JSON.parse(response)
			let orderDetails = orderInfos.orderDetails

			let items = []
			orderDetails.forEach((item) => {
				items.push({
					name: item.product,
					quantity: item.quantity,
					unit_amount: {
						currency_code: "EUR",
						value: item.price / 100,
					},
				})
			})
			// Ajout des frais de livraison
			items.push({
				name: "Livraison",
				quantity: 1,
				unit_amount: {
					currency_code: "EUR",
					value: orderInfos.shippingFees / 100,
				},
			})
			try {
				// console.log(orderInfos.totalToPay / 100)
				await paypal
					.Buttons({
						style: {
							shape: "pill",
						},
						createOrder: (data, actions) => {
							return actions.order.create({
								intent: "capture", // capture or authorize
								purchase_units: [
									{
										items: items,
										amount: {
											value: orderInfos.totalToPay / 100,
											breakdown: {
												item_total: {
													currency_code: "EUR",
													value: orderInfos.totalToPay / 100,
												},
											},
										},
										description: "Commande B&E Wax",
										invoice_id: orderInfos.reference,
										soft_descriptor: "Commande B&E Wax",
									},
								],
								application_context: {
									brand_name: "B&E Wax",
									shipping_preference: "NO_SHIPPING", // if you handle shipping
								},
							})
						},
						// Finalizes the transaction after payer approval
						onApprove: (data) => {
							handlePaypalOnApprove(data, orderInfos)
						},
						// The user closed the window
						onCancel: () => {
							console.log("The user canceled the payment")
						},
						onError: (err) => {
							console.log("Something went wrong", err)
							let failUrl = Routing.generate("app_order_fail", {
								orderRef: $(document).find("#paymentButton").data("orderref"),
							})

							window.location.assign(failUrl)
						},
					})
					.render("#paypalSection")
			} catch (error) {
				console.error("failed to render the PayPal Buttons", error)
			}
		})
	}
})

function getOrderInfos() {
	$.ajax({
		url: Routing.generate("app_order_details", {
			orderRef: $(document).find("#paymentButton").data("orderref"),
		}),
	}).done(function (response) {
		console.log(response)
		return response
	})
}
function handlePaypalOnApprove(data, orderInfos) {
	$.ajax({
		url: Routing.generate("app_order_approve", {
			orderRef: orderInfos.reference,
			paypalOrderId: data.orderID,
		}),
		method: "POST",
	}).done(function (response) {
		console.log(response)
		window.location.assign(response)
	})
}

$(document).on("DOMContentLoaded", function () {
	var paymentButton = $(document).find("#paymentButton")

	paymentButton.on("click", (e) => {
		e.preventDefault()
		console.log("click")
		$(document).find("#paypalSection").removeClass("d-none")
	})
})
