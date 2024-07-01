import { Notyf } from "notyf"
import "notyf/notyf.min.css"

$(document).on("DOMContentLoaded", () => {
	// Initialisation de Notyf
	const notyf = new Notyf({
		duration: 4000,
		ripple: true,
		position: {
			x: "right",
			y: "top",
		},
		dismissible: true,
		types: [
			{
				type: "success",
				className: "bg-success",
				icon: {
					className: "materials-symbols-rounded text-white",
					tagName: "span",
					text: "",
				},
				background: "none",
			},
		],
	})

	// Utilisez cette fonction pour afficher les messages flash
	$(function () {
		let flashes = $(".flash-message")

		flashes.each(function (index, flash) {
			let label = $(flash).data("label")
			let message = $(flash).data("message")

			if (label !== undefined) {
				notyf.open({
					type: label,
					message: message,
				})
			}
			$(flash).remove()
		})
	})
})
