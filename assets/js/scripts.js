(function ($) {
	
	$(document).ready(function(){

		/*
		$('.slide-logos').slick({
			autoplay: true,
			slidesToShow: 6,
			infinite: true,
			adaptiveHeight: true,
			centerMode: false,
			variableWidth: true
		});
		*/

		/**
		 * Agrega automaticamente la clase por tipo de enlace para agregar los objetivos o acciones necesarias
		 */
		$('a[href^=tel]').addClass("link-phone");
		$('a[href^=mailto]').addClass("link-email").attr("target", "_blank");

		/**
		 * Agrega los eventos de Google Analytics y de Facebook Pixel usando las clases agregadas antes y verificando la función existente para ser usada
		 */
		$('.link-phone').click(function () {
			if (typeof gtag == 'function') {
				gtag('event', 'click', { 'event_category': 'telefono', 'event_label': 'llamada' });
			};
			if (typeof ga == 'function') {
				ga('send', 'event', 'telefono', 'click', 'llamada');
			};
			if (typeof fbq == 'function') {
			}
		});

		$('.link-email').click(function () {
			if (typeof gtag == 'function') {
				gtag('event', 'click', { 'event_category': 'email', 'event_label': 'envio' });
			}
			if (typeof ga == 'function') {
				ga('send', 'event', 'email', 'click', 'envio');
			};
			if (typeof fbq == 'function') {
			}
		});


		/**
		 * Agrega el botón de regresar arriba
		 */
		if( jam_gotop == 1 ){
			$(window).scroll(function(){
				if($(this).scrollTop()>100){
					$('.scrollup').fadeIn();
				}else{
					$('.scrollup').fadeOut(400);
				}
			});
			$('.scrollup').click(function(){
				$("html, body").animate({scrollTop:0},600);
				return false;
			});
		};

		/**
		 * Agrega la navegación scroll de una sola página
		 * Se deben agregar los enlaces con el hash # y el ID de la sección a enlazar
		 * las opciones .not son los negativos a agregar como enlaces de scroll
		 */
		$('a[href*="#"]')
		// Remove links that don't actually link to anything
		.not('[href="#"]')
		.not('[href="#0"]')
		.not('[data-toggle="collapse"]')
		.click(function(event) {
			// On-page links
			if (
			location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') 
			&& 
			location.hostname == this.hostname
			) {
			// Figure out element to scroll to
			var target = $(this.hash);
			target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
			// Does a scroll target exist?
			if (target.length) {
				// Only prevent default if animation is actually gonna happen
				event.preventDefault();
				// var offsetpos = (target.offset().top - 290);
				// alert( target + offsetpos );
				$('html, body').animate({
				scrollTop: target.offset().top
				}, 1000, function() {
				// Callback after animation
				// Must change focus!
				var $target = $(target);
				//$target.focus();
				if ($target.is(":focus")) { // Checking if the target was focused
					return false;
				} else {
					$target.attr('tabindex','-1'); // Adding tabindex for elements not focusable
				//$target.focus(); // Set focus again
				};
				});
			}
			}
		});

		/**
		 * Formularios
		 */
		$("form").on('submit',function(e){
			e.preventDefault();
			
			var $form     = $(this),
			    url       = $(this).attr("action"),
			    id        = $(this).attr("id"),
			    cajaError = $("#" + id + " .caja_error"),
			    errores   = 0;

			cajaError.empty().removeClass("alert alert-info");

			var datosForm = $form.serialize();

			if (errores!=1){

				$("#" + id + " button.btn-primary").attr("disabled","disabled");

				$.ajax({ 
					method: "POST",
					url: url,
					data: datosForm + "&a=1&form="+id,
					dataType: "json",
					success: function( data ) {
						if (parseInt(data.respuesta)==1){
							cajaError.empty().addClass("alert alert-info").append(data.texto_respuesta + "\n" + data.mailchimp_respuesta);
							$("#" + id + " button.btn-primary").removeAttr("disabled");
							$("#" + id)[0].reset();

							if (typeof gtag == 'function') {
								gtag('event', 'click', { 'event_category': 'formulario', 'event_label': id });
							};
							if (typeof ga == 'function') {
								ga('send', 'event', 'formulario', 'click', id);
							};
							if (typeof fbq == 'function') {
							}

						}else{
							alert(data.texto_respuesta);
							$("#" + id + " button.btn-primary").removeAttr("disabled");
						};
					}
				});

				
			}else{
				$("#" + id + " button#btn-enviar").removeAttr("disabled");

			};

		});

		/*
		$("form#descarga").submit(function (e) {
			e.preventDefault();

			var $form     = $(this),
			    url       = $(this).attr("action"),
			    id        = $(this).attr("id")
			    cajaError = $("#" + id + " .caja_error"),
			    errores   = 0;

			cajaError.empty().removeClass("alert alert-info");
			$form.find('.resalta').removeClass('resalta');

			var fnombre = $form.find('input[name="nombre"]').val(),
				femail = $form.find('input[name="email"]').val();

			var emailReg = new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/);

			if (fnombre.length <= 3) {
				$form.find('input[name="nombre"]').addClass('resalta').focus();
				cajaError.empty().prepend("<span class=\"fas fa-exclamation-triangle\"></span> Por favor indica tu nombre");
				return false;
				var errores = 1;
			};

			if (!emailReg.test(femail)) {
				$form.find('input[name="email"]').addClass('resalta').focus();
				cajaError.empty().prepend("<span class=\"fas fa-exclamation-triangle\"></span> Por favor indica tu email");
				return false;
				var errores = 1;
			};


			if (errores != 1) {

				$("#" + id + " button.btn-primary").attr("disabled", "disabled");

				$.post(url, {
					nombre: fnombre,
					email: femail,
					a: 2
				},
					function (data) {
						if (parseInt(data.respuesta) == 1) {
							cajaError.empty().addClass("alert alert-info").append(data.texto_respuesta);
							$("#" + id + " button.btn-primary").removeAttr("disabled");
							$("#" + id)[0].reset();

							if (typeof gtag == 'function') {
								gtag('event', 'click', { 'event_category': 'formulario', 'event_label': id });
							};
							if (typeof ga == 'function') {
								ga('send', 'event', 'formulario', 'click', id);
							};
							if (typeof fbq == 'function') {
							}

						} else {
							alert(data.texto_respuesta);
							$("#" + id + " button.btn-primary").removeAttr("disabled");
						};
					}, "json");


			} else {
				$("#" + id + " button#btn-enviar").removeAttr("disabled");

			};

		});
		*/





		/**
		 * Crea y obtiene cookies
		 * Para crear una cookie se envía la siguiente información
		 * @param {string} cname Nombre de la cookie
		 * @param {string} cvalue Valor de la cookie a crear
		 * @param {number} exdays Dias de vida de la cookie
		 * 
		 * Para obtener una cookie se solicita por su nombre, ejemplo:
		 * getCookie("nombre")
		 */
		function setCookie(cname, cvalue, exdays) {
			var d = new Date();
			d.setTime(d.getTime() + (exdays * 60 * 1000));
			var expires = "expires="+d.toUTCString();
			document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
		}

		function getCookie(cname) {
			var name = cname + "=";
			var ca = document.cookie.split(';');
			for(var i = 0; i < ca.length; i++) {
				var c = ca[i];
				while (c.charAt(0) == ' ') {
					c = c.substring(1);
				}
				if (c.indexOf(name) == 0) {
					return c.substring(name.length, c.length);
				}
			}
			return "";
		}


		/**
		 * Maneja el loading ocultandolo al terminar de cargar el sitio
		 */
		$('.loading').delay(2400).slideUp(600);

	});

})(jQuery);
