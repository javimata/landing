(function ($) {
	
	$(document).ready(function(){

		$('#popup_cotiza').on('show.bs.modal', function (event) {
		var button = $(event.relatedTarget) // Button that triggered the modal
		var producto = button.data('producto') // Extract info from data-* attributes
		var modal = $(this)
		modal.find('span.nombre-producto').empty().text(producto)
		modal.find('input[name="producto"]').val(producto)
		});

		$('.link-phone').click(function(){

			gtag('event', 'click', {'event_category': 'telefono','event_label': 'llamada'});

		});

		$('.link-email').click(function(){

			gtag('event', 'click', {'event_category': 'email','event_label': 'envio'});

		});

		if( jam_popup == 1 ) {
			$('#popup_home').modal('show');
		}

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

		// Select all links with hashes
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

		$("#masinfo").submit(function(e){
			e.preventDefault();
			
			var $form = $(this);
			var url   = $(this).attr("action");

			$(".caja_error").empty().removeClass("alert alert-info");

			var fnombre 	= $form.find('input[name="nombre"]').val(),
				femail      = $form.find('input[name="email"]').val(),
				ftelefono	= $form.find('input[name="telefono"]').val(),
				fciudad     = $form.find('input[name="ciudad"]').val(),
				faviso      = $form.find('input[name="aviso"]').val();

			var emailReg 	= new RegExp(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/);

			if ( fnombre.length <=3 ) {
				$form.find('input[name="nombre"]').addClass('resalta').focus();
				$(".caja_error").empty().prepend("<span class=\"glyphicon glyphicon-exclamation-sign\"></span> Por favor indica tu nombre");
				return false;
				var errores=1;
			};

			if ( ftelefono.length < 3 ) {
				$form.find('input[name="telefono"]').addClass('resalta').focus();
				$(".caja_error").empty().prepend("<span class=\"glyphicon glyphicon-exclamation-sign\"></span> Por favor indica tu teléfono");
				return false;
				var errores=1;
			};	

			if ( !emailReg.test(femail) ) {
				$form.find('input[name="email"]').addClass('resalta').focus();
				$(".caja_error").empty().prepend("<span class=\"glyphicon glyphicon-exclamation-sign\"></span> Por favor indica tu email");
				return false;
				var errores=1;
			};	

			if ( !$form.find('input[name="aviso"]').prop('checked') ) {
				$(".caja_error").empty().prepend("<span class=\"glyphicon glyphicon-exclamation-sign\"></span> Es necesario aceptar el aviso de privacidad");
				return false;
				var errores=1;
			}


			if (errores!=1){

				$("#masinfo button.btn-primary").attr("disabled","disabled");

				$.post( url, { 
					nombre:fnombre,
					email:femail,
					telefono:ftelefono,
					ciudad:fciudad,
					a:1
					}, 
					function( data ) {
						if (parseInt(data.respuesta)==1){
							$(".caja_error").empty().addClass("alert alert-info").append(data.texto_respuesta);
							$("#masinfo")[0].reset();
							gtag('event', 'click', {'event_category': 'formulario','event_label': 'masinfo'});
						}else{
							alert(data.texto_respuesta);
							$("#masinfo button.btn-primary").removeAttr("disabled");
						};
				}, "json");

				
			}else{
				$("#masinfo button#btn-enviar").removeAttr("disabled");

			};

		});


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

		function checkCookie() {
			var user = getCookie("username");
			if (user != "") {
				alert("Welcome again " + user);
			} else {
				user = prompt("Please enter your name:", "");
				if (user != "" && user != null) {
					setCookie("username", user, 365);
				}
			}
		}

	});

})(jQuery);
