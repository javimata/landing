<?php
require_once "php/functions.php";
$config = getConfig();
?><!DOCTYPE html>
<html lang="es">
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<?php if ($config->info->descripcion != ""): ?>
		<meta name="description" content="<?php echo $config->info->descripcion; ?>" />
		<?php endif ?>
		<title><?php echo $config->info->titulo ?></title>

		<!-- Metas OG - Open Graph para contenido compartido en Facebook -->
		<meta property="og:title" content="<?php echo $config->info->titulo ?>"/>
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php echo $config->info->url; ?>"/>
		<meta property="og:site_name" content="<?php echo $config->info->titulo; ?>"/>
		<meta property="og:description" content="<?php echo $config->info->descripcion; ?>"/>
		<meta property="og:image" content="<?php echo $config->info->url; ?><?php echo $config->info->logo ?>"/>

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
		<link rel="icon" href="images/favicon.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900" rel="stylesheet">

		<?php if ( $config->configuracion->revolution == 1 ): ?>
		<!-- Add Revolution Slider -->
	    <link href="uniterevolution/assets/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" />
	    <link href="uniterevolution/assets/rs-plugin/css/dynamic-captions.css" rel="stylesheet" type="text/css" />
		<link href="uniterevolution/assets/rs-plugin/css/static-captions.css" rel="stylesheet" type="text/css" />
		<!-- End Revolution Slider -->
		<?php endif; ?>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css"/>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css"/>

		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
		<link rel="stylesheet" href="assets/css/animate.css">
		<link rel="stylesheet" href="assets/css/aos.css" />
		<link rel="stylesheet" href="assets/css/styles.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php if ( $config->info->fbpixel != "" ): ?>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?php echo $config->info->fbpixel; ?>');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" alt="facebook pixel" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo $config->info->fbpixel; ?>&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<?php endif ?>

		<?php if ( $config->info->analytics != "" ): ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $config->info->analytics; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $config->info->analytics; ?>');
		</script>
		<!-- End Google Analytics -->
		<?php endif ?>

	</head>
	<body>

		<?php if ( $config->configuracion->loading == 1 ): ?>
		<div class="loading"><img src="images/logo.png" alt="Loading" /><br /><p>Cargando...</p></div>
		<?php endif; ?>

		<section id="section-top-bar" class="d-block d-xl-none">
			<div class="container">
				<div class="row">
					<div class="col-9">
						<?php if ( $config->contactos->telefono ): ?>
						<a href="tel:<?php echo cleanString($config->contactos->telefono); ?>" class="link-phone"><i class="fas fa-phone"></i> <?php echo $config->contactos->telefono; ?></a>
						<?php endif; ?>
						<?php if ( $config->contactos->email ): ?>
						<a href="mailto:<?php echo cleanString($config->contactos->email); ?>" class="link-email" target="_blank"><i class="fas fa-envelope ml-2"></i> <span class="email-address"><?php echo $config->contactos->email; ?></span></a>
						<?php endif; ?>
					</div>
					<div class="col-3 text-right">
						<?php foreach ($config->redes as $red): ?>
							<?php if ( $red->icon ):?>
							<a href="<?php echo $red->url; ?>" class=" ml-2"><i class="fab fa-<?php echo $red->icon; ?>"></i></a>
							<?php endif; ?>
						<?php endforeach; ?>
					</div>
				</div>
			</div>
		</section>

		<section id="header">
			
			<div class="container-fluid">
				<div class="row align-items-center">
					<div class="col-9 col-md-4 col-xl-3">
						<a class="navbar-brand p-1" href="#" data-aos="fade-down" data-aos-delay="3000">
							<img src="<?php echo $config->info->logo; ?>" alt="<?php echo $config->info->titulo; ?>" class="img-fluid"/>
						</a>
					</div>
					<div class="col-3 col-md-8 col-xl-6">
						<nav class="navbar navbar-expand-lg float-right float-lg-none p-0">
							<button class="navbar-toggler p-0" type="button" data-toggle="collapse" data-target="#navbarMain2" aria-controls="navbarMain2" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"><i class="fas fa-bars"></i></span>
							</button>
							<div class="collapse navbar-collapse" id="navbarMain">
								<ul class="navbar-nav w-100 justify-content-between align-items-end">
									<?php foreach($config->menu as $key => $menu): ?>
									<li>
									<a href="<?php echo $menu->url; ?>" class="nav-item nav-link"><?php echo $key; ?></a>
									</li>
									<?php endforeach; ?>
								</ul>
							</div>
						</nav>
					</div>
					<div class="d-none d-xl-block col-xl-3 text-right">
						<div class="box-tel-top">
							Pide más información o Cotiza:<br />
							<a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><i class="fas fa-mobile-alt"></i> <?php echo $config->contactos->telefono; ?></a>
						</div>
					</div>
					<div class="col-12 d-xl-none">
						<div class="collapse navbar-collapse" id="navbarMain2">
							<div class="navbar-nav">
								<?php foreach($config->menu as $key => $menu): ?>
								<a href="<?php echo $menu->url; ?>" class="nav-item nav-link"><?php echo $key; ?></a>
								<?php endforeach; ?>
							</div>
						</div>
					</div>
				</div>
			</div>
		
		</section>

		<section id="slider">
			
			<div class="slider-main">
				<img src="images/sliders/slider-01-movil.jpg" alt="" class="img-fluid d-block d-md-none" />
				<img src="images/sliders/slider-01.jpg" alt="" class="img-fluid d-none d-md-block" />
			</div>
	
			<div id="masinformacion" class="box-form" data-aos="fade-up" data-aos-delay="600">
				<header id="header-form">
					<h3>SOLICITA MÁS INFORMACIÓN ó</h3>
					<h2>Obtén tu <br class="d-none d-xl-block"/>Asesoría <strong>Gratuita</strong></h2>
					<p class="text-form">Deja tus datos y nuestros asesores te contactarán a la brevedad con la información para tus necesidades</p>
				</header>
				<div class="box-campos">
					<form action="php/process.php" id="masinfo">
						<div class="form-group">
							<input type="text" name="nombre" placeholder="Nombre Completo *" class="form-control" />
						</div>
						<div class="form-group">
							<input type="email" name="email" placeholder="Email *" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="telefono" placeholder="Teléfono" class="form-control" />
						</div>
						<div class="form-group">
							<input type="text" name="empresa" placeholder="Empresa *" class="form-control" />
						</div>
						<div class="form-group">
							<select name="servicio" id="tipo_servicio" class="form-control">
								<option value="">Tipo de Servicio</option>
								<option value="Disposición de aguas industriales">Disposición de aguas industriales</option>
								<option value="Acopio temporal">Acopio temporal</option>
								<option value="Asesoría legal ambiental">Asesoría legal ambiental</option>
								<option value="Trámites y gestiones ambientales">Trámites y gestiones ambientales</option>
								<option value="Combustibles alternos ecológicos">Combustibles alternos ecológicos</option>
								<option value="Recolección y transporte">Recolección y transporte</option>
								<option value="Manejo de residuos industriales">Manejo de residuos industriales</option>
								<option value="Tratamiento de aguas contaminadas">Tratamiento de aguas contaminadas</option>
								<option value="Otro servicio">Otro servicio</option>
							</select>
						</div>
						<div class="form-group">
							<button class="btn btn-primary btn-full">QUIERO MÁS INFORMACIÓN</button>
						</div>
					</form>
				</div>
			</div>

		</section>

		<section id="autorizaciones">
			
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="box-autorizaciones">
							<h4 class="subtitle">SEGURIDAD GARANTIZADA</h4>
							<h2>Autorizaciones</h2>
							<p>Grupo Verden cuenta con las autorizaciones necesarias para gestionar Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor.</p>
							<p>Más de 15 años de experiencia enean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. </p>
							<img src="images/autorizaciones.png" alt="Autorizaciones" class="img-fluid my-4" data-aos="fade-down" data-aos-delay="600" />
						</div>
					</div>
				</div>
			</div>
		
		</section>

		<section id="servicios">
		
			<div class="container">

				<div class="row">
				
					<header id="header-section" class="text-center mb-5">
						<h4>SOLUCIONES ESPECIALIZADAS PARA CADA NECESIDAD</h4>
						<h2>Servicios</h2>
					</header>
				
				</div>

				<div class="row">
					<div class="col-md-6 col-lg-5" data-aos="fade-left" data-aos-delay="300">
						<div class="box-servicio">
							<h3>Disposición de aguas Industriales</h3>
							<p>Contamos con equipamiento de última generación en instalaciones propias, transformamos un residuo peligroso, como son las aguas contaminadas, en agua que se puede reutilizar para riego en zonas áridas.</p>
						</div>
						<div class="box-servicio">
							<h3>Acopio temporal</h3>
							<p>Disponemos centros de acopio en el estado de San Luis Potosí,  lo que nos permite tener más cobertura en nuestros servicios</p>
						</div>
						<div class="box-servicio">
							<h3>Asesoría legal ambiental</h3>
							<p>Nuestro equipo de expertos lo asesorará con gusto en el tema, permiso, trámite o proyecto ambiental que necesite.</p>
						</div>
						<div class="box-servicio">
							<h3>Trámites y gestiones ambientales</h3>
							<p>Gestionamos por usted procesos y trámites ante autoridades ambientales, tal como el COA (cédula de operación anual).</p>
						</div>
						<div class="box-servicio">
							<h3>Combustibles alternos ecológicos</h3>
							<p>Generamos combustibles alternos ecológicos a la medida, formulados según el equipo y especificaciones de combustión</p>
						</div>

					</div>
					<div class="d-none d-lg-block col-lg-2 text-center" data-aos="fade-down" data-aos-delay="600">
						<img src="images/linea-servicios.png" alt="Servicios" class="img-fluid"/>
					</div>
					<div class="col-md-6 col-lg-5" data-aos="fade-right" data-aos-delay="900">
						<div class="box-servicio">
							<h3>Recolección y transporte</h3>
							<p>Nos especializamos en el manejo, la operación y explotación del servicio de carga especializada de transporte en caminos y puentes de jurisdicción  tanto  estatal  como federal.</p>
							<p>Contamos con vehículos para todas las necesidades de los clientes en lo que se refiere a residuos sólidos, líquidos y semisólidos.</p>
						</div>
						<div class="box-servicio">
							<h3>Manejo de residuos industriales peligrosos y no peligrosos</h3>
							<p>Con el personal mejor capacitado y tecnología de punta, manipulamos residuos peligrosos y no peligrosos para favorecer la conservación del medio ambiente.</p>
						</div>
						<div class="box-servicio">
							<h3>Tratamiento de aguas contaminadas</h3>
							<p>Especializados en el manejo del agua y diversos procesos para tratamiento de aguas contaminadas y reutilización.</p>
							<p>Preocupados por el medio ambiente y el uso adecuado de los recursos naturales, Grupo Verden ha instalado en San Luis Potosí capital, una planta de tratamiento de aguas residuales contaminadas, con una tecnología innovadora en la región, brindando servicio a diversas empresas de la zona así como a clientes de otras áreas del país, interesadas en este proceso.</p>
						</div>

					</div>
				</div>
				<div class="row mt-5">
					<div class="col-12 text-center">
						<h2>¿Quieres saber más?</h2>
						<a href="#masinformacion" class="btn btn-primary mt-4">SOLICITA MÁS INFORMACIÓN</a>
					</div>
				</div>
			</div>

		</section>

		<section id="llamanos">
		
			<div class="box-llamanos w-100 px-5 py-5 text-center">
				<h3 class="mb-3">OBTÉN TU ASESORÍA GRATUITA</h3>
				<h2><i class="fas fa-phone"></i> Llámanos al <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>" class="link-phone"><?php echo $config->contactos->telefono; ?></a></h2>
			</div>
		
		</section>

		<section id="unidades">
		
			<div class="box-unidades-center d-none d-xl-block" data-aos="zoom-in" data-aos-delay="300">
				<img src="images/logo-vertical.png" alt="Grupo Verden" class="img-fluid" />
				<p class="mt-2">UNIDADES DE SERVICIO</p>
				<a href="#masinformacion" class="btn btn-link mt-3">SOLICITA MÁS INFORMACIÓN</a>
			</div>
				

			<div class="container-fluid m-0 p-0">
			
				<div class="row no-gutters">

					<div class="col-md-6 col-unidad box-resimex">
						<div class="box-unidad" data-aos="fade-up-left" data-aos-delay="300">
							<h3 class="mb-3">RESIMEX</h3>
							<p>RESIMEX llevamos a cabo todas las actividades de recolección, manejo y acopio de los residuos industrales</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-verdenagua">
						<div class="box-unidad" data-aos="fade-up-right" data-aos-delay="600">
							<img src="images/logo-verdenagua.png" alt="VerdenAgua" class="img-fluid mb-3" /><br/>
							<p>Disponemos de las aguas industriales contaminadas, especializada en diversos procesos para su tratamiento y reutilización</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-verdenenergia">
						<div class="box-unidad" data-aos="fade-down-left" data-aos-delay="300">
							<img src="images/logo-verdenenergia.png" alt="VerdenEnergía" class="img-fluid mb-3" /><br/>
							<p>Generamos combustibles alternos ecológicos a la medida, formulados según el equipo y especificaciones de combustión</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-carganova">
						<div class="box-unidad" data-aos="fade-down-right" data-aos-delay="600">
							<img src="images/logo-carga-nova.png" alt="Carga Nova" class="img-fluid mb-3" /><br/>
							<p>Somos expertos en el manejo, la operación y transporte del servicio de carga especializada en materiales, residuos peligrosos y de manejo especial, en caminos y puentes de jurisdicción tanto estatal como federal</p>
						</div>
					</div>					
				
				</div>
			
			</div>
		
		</section>

		<section id="nuestros-clientes">
		
			<div class="slider-logos">

				<h4 class="mb-4 text-white text-center">NUESTROS CLIENTES</h4>

				<div class="slide-logos d-flex justify-content-around align-items-center">
					<div><img src="images/logos/estafeta.png" class="img-fluid" alt="Estafeta" /></div>
					<div><img src="images/logos/sabritas.png" class="img-fluid" alt="Sabritas" /></div>
					<div><img src="images/logos/mercedes.png" class="img-fluid" alt="Mercedes Benz" /></div>
					<div><img src="images/logos/chevrolet.png" class="img-fluid" alt="Chevrolet" /></div>
					<div><img src="images/logos/tracsa.png" class="img-fluid" alt="Tracsa" /></div>
					<div><img src="images/logos/arca.png" class="img-fluid" alt="Arca Continental" /></div>
				</div>
			
			</div>
			
		</section>
		

		<footer id="footer">

			<div class="container">
				<div class="row align-items-center text-center mb-xs-5">
					<div class="col-md-3">
						<div class="logo-footer mb-4">
							<img src="images/logo-vertical.png" alt="Grupo Verden" class="img-fluid" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-footer mb-4">
							<h4>CONTACTO</h4>
							<a href="mailto:<?php echo cleanString($config->contactos->email); ?>" class="link-email" target="_blank"><?php echo $config->contactos->email; ?></a>
							<br/><br/>
							<h4>TELÉFONO</h4>
							<a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a><br/>
							<a href="tel:<?php echo cleanString($config->contactos->telefono2); ?>"><?php echo $config->contactos->telefono2; ?></a><br/>
							<a href="#masinformacion" class="btn btn-link my-4 p-0 link-primary">SOLICITA MÁS INFORMACIÓN</a>
						</div>
					</div>
					<div class="col-md-5">
						<div class="box-descarga mb-4">
							<header id="header-form">
								<h3>Descarga el folleto</h3>
							</header>
							<form action="php/process.php">
								<div class="box-campos mt-3">
									<div class="form-group">
										<input type="text" name="nombre" class="form-control" placeholder="Nombre completo *" /> 
									</div>
									<div class="form-group">
										<input type="email" name="email" class="form-control" placeholder="Email *" />
									</div>
									<div class="form-group">
										<button type="submit" class="btn btn-primary btn-full">DESCARGAR PDF</button>
										<div class="caja_error"></div>
									</div>
								</div>							
							</form>
						</div>
					</div>
				</div>
			</div>

		</footer>

		<section id="copy">
			<div class="container">
				<div class="row">
					<div class="col">
						<?php echo replaceString($config->info->copyright); ?> 
					</div>
				</div>
			</div>
		</section>

		<?php if ( $config->configuracion->popup == 1 ): ?>
			<?php include_once "popup.php"; ?>
		<?php endif ?>

		<script type="text/javascript">
			var jam_gotop = '<?php echo $config->configuracion->gotop; ?>';
			var jam_popup = '<?php echo $config->configuracion->popup; ?>';
		</script>

		<?php if ( $config->configuracion->gotop == 1 ): ?>
		<a href="javascript:void(0)" class="scrollup" aria-label="">&nbsp;</a>
		<?php endif ?>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<script src="https://cdn.javimata.com/assets/js/jquery.matchHeight-min.js"></script>

		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>

		<script src="assets/js/aos.js"></script>

		<?php if ( $config->configuracion->revolution == 1 ): ?>
        <script type="text/javascript" src="assets/js/revolution.init.js"></script>
	    <script src="uniterevolution/assets/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
	    <script src="uniterevolution/assets/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
		<?php endif ?>


		<script>
			AOS.init({
				easing: 'ease-out-back',
				duration: 1000,
				once: true
			});
		</script>
		<script src="assets/js/scripts.js"></script>

	</body>
</html>