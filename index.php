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
		<meta name="description" content="<?php echo $config->info->descripcion; ?>">
		<?php endif; ?>
		<title><?php echo $config->info->titulo ?></title>

		<?php if( $config->configuracion->openGraph == 1 ): ?>
		<!-- Metas OG - Open Graph para contenido compartido en Facebook -->
		<meta property="og:title" content="<?php echo $config->info->titulo ?>">
		<meta property="og:type" content="article"/>
		<meta property="og:url" content="<?php echo validateUrl($config->info->url); ?>">
		<meta property="og:site_name" content="<?php echo $config->info->titulo; ?>">
		<meta property="og:description" content="<?php echo $config->info->descripcion; ?>">
		<meta property="og:image" content="<?php echo $config->info->url; ?><?php echo $config->info->logo ?>"/>
		<?php endif; ?>

		<!-- FAVICONS -->
		<link rel="shortcut icon" href="images/favicon.png" type="image/x-icon">
		<link rel="icon" href="images/favicon.png" type="image/x-icon">

		<!-- GOOGLE FONT -->
		<?php foreach( $config->configuracion->fonts as $key => $fonts ): ?> 
		<link href="https://fonts.googleapis.com/css?family=<?php echo str_replace(" ","+",$key); ?><?php if ( $fonts->weight != "") { echo ":" . str_replace(" ","",$fonts->weight); } ?>" rel="stylesheet">
		<?php endforeach; ?>

		<?php if ( $config->configuracion->revolution == 1 ): ?>
		<!-- Add Revolution Slider -->
	    <link href="uniterevolution/assets/rs-plugin/css/settings.css" rel="stylesheet" type="text/css">
	    <link href="uniterevolution/assets/rs-plugin/css/dynamic-captions.css" rel="stylesheet" type="text/css">
		<link href="uniterevolution/assets/rs-plugin/css/static-captions.css" rel="stylesheet" type="text/css">
		<!-- End Revolution Slider -->
		<?php endif; ?>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

		<?php if ( $config->configuracion->assets->slick == 1 ): ?>
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.css">
		<link rel="stylesheet" type="text/css" href="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick-theme.css">
		<?php endif; ?>

		<?php if ( $config->configuracion->assets->fontawesome == 1 ): ?>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css">
		<?php endif; ?>

		<?php if ( $config->configuracion->assets->animate == 1 ): ?>
		<link rel="stylesheet" href="assets/css/animate.css">
		<?php endif; ?>
		<?php if ( $config->configuracion->assets->aos == 1 ): ?>
		<link rel="stylesheet" href="assets/css/aos.css">
		<?php endif; ?>

		<link rel="stylesheet" href="assets/css/styles.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<?php if ( $config->info->fbPixel != "" ): ?>
		<!-- Facebook Pixel Code -->
		<script>
		!function(f,b,e,v,n,t,s){if(f.fbq)return;n=f.fbq=function(){n.callMethod?
		n.callMethod.apply(n,arguments):n.queue.push(arguments)};if(!f._fbq)f._fbq=n;
		n.push=n;n.loaded=!0;n.version='2.0';n.queue=[];t=b.createElement(e);t.async=!0;
		t.src=v;s=b.getElementsByTagName(e)[0];s.parentNode.insertBefore(t,s)}(window,
		document,'script','https://connect.facebook.net/en_US/fbevents.js');
		fbq('init', '<?php echo $config->info->fbPixel; ?>');
		fbq('track', 'PageView');
		</script>
		<noscript><img height="1" width="1" alt="facebook pixel" style="display:none"
		src="https://www.facebook.com/tr?id=<?php echo $config->info->fbPixel; ?>&ev=PageView&noscript=1"
		/></noscript>
		<!-- End Facebook Pixel Code -->
		<?php endif ?>

		<?php if ( $config->info->googleAnalytics != "" ): ?>
		<!-- Global site tag (gtag.js) - Google Analytics -->
		<script async src="https://www.googletagmanager.com/gtag/js?id=<?php echo $config->info->googleAnalytics; ?>"></script>
		<script>
		  window.dataLayer = window.dataLayer || [];
		  function gtag(){dataLayer.push(arguments);}
		  gtag('js', new Date());

		  gtag('config', '<?php echo $config->info->googleAnalytics; ?>');
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
						<a class="navbar-brand p-1" href="#" data-aos="fade-down" data-aos-delay="0">
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
							Haz tu reservación ahora:<br />
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

			<?php include_once ('slider.php'); ?>
			
			<div id="masinformacion" class="box-form" data-aos="fade-up" data-aos-delay="600">
				<header id="header-form">
					<h3>¡OBTÉN EL MEJOR PRECIO SOLO HOY!</h3>
					<h2>Reserva ahora <br class="d-none d-xl-block"/>al mejor <strong>Precio</strong></h2>
					<p class="text-form">Deja tus datos y nuestros asesores te contactarán a la brevedad con la información para tus necesidades</p>
				</header>
				<div class="box-campos">
					<form action="php/process.php" id="masinfo">
					<div class="row">
						<div class="form-group col-12">
							<input type="text" name="nombre" placeholder="Nombre Completo *" class="form-control" />
						</div>
						<div class="form-group col-12">
							<input type="email" name="email" placeholder="Email *" class="form-control" />
						</div>
						<div class="form-group col-12">
							<input type="text" name="telefono" placeholder="Teléfono" class="form-control" />
						</div>
						<div class="form-group col-md-6">
							<label>Entrada</label>
							<input type="date" name="entrada" class="form-control" />
						</div>
						<div class="form-group col-md-6">
							<label>Salida</label>
							<input type="date" name="salida" class="form-control" />
						</div>
						<div class="form-group col-md-6">
							<select name="servicio" id="tipo_servicio" class="form-control">
								<option value="">Adultos</option>
							</select>
						</div>
						<div class="form-group col-md-6">
							<select name="servicio" id="tipo_servicio" class="form-control">
								<option value="">Menores</option>
							</select>
						</div>						
						<div class="form-group col-12">
							<button class="btn btn-primary btn-full">QUIERO MÁS INFORMACIÓN</button>
						</div>
					</div>
					</form>
				</div>
			</div>

		</section>

		<section id="nosotros">
			
			<div class="container">
				<div class="row">
					<div class="col-lg-6">
						<div class="box-autorizaciones">
							<h4 class="subtitle">NOSOTROS</h4>
							<h2>HOTEL DEL REY</h2>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, adipisci nemo. Magnam possimus blanditiis provident, repellat eos nobis, adipisci rem vero facilis at non odit eaque ducimus vel veritatis sapiente.</p>
							<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Veniam, adipisci nemo. Magnam possimus blanditiis provident</p>
							<img src="images/logo-certificado.jpg" alt="Certificado" class="img-fluid my-4 mr-3 rounded-circle" data-aos="fade-down" data-aos-delay="300" />
							<img src="images/logo-certificado.jpg" alt="Certificado" class="img-fluid my-4 mr-3 rounded-circle" data-aos="fade-down" data-aos-delay="600" />
							<img src="images/logo-certificado.jpg" alt="Certificado" class="img-fluid my-4 mr-3 rounded-circle" data-aos="fade-down" data-aos-delay="900" />
						</div>
					</div>
				</div>
			</div>
		
		</section>

		<section id="servicios">
		
			<div class="container">

				<div class="row">
				
					<header id="header-section" class="text-center mb-5">
						<h4>SIEMPRE BUSCAMOS LA EXCELENCIA</h4>
						<h2>Servicios</h2>
					</header>
				
				</div>

				<div class="row">
					<div class="col-md-6 col-lg-5" data-aos="fade-left" data-aos-delay="300">
						<div class="box-servicio">
							<h3>Servicio importante</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis quasi magni nesciunt dolore repellat. Hic, perspiciatis error! Accusantium laborum praesentium voluptate magni harum fugiat?</p>
						</div>
						<div class="box-servicio">
							<h3>Otro servicio</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
						</div>
						<div class="box-servicio">
							<h3>Más servicios</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
						</div>
						<div class="box-servicio">
							<h3>Somos los mejores</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
						</div>
						<div class="box-servicio">
							<h3>Y si ponemos otro servicio</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
						</div>

					</div>
					<div class="d-none d-lg-block col-lg-2 text-center align-item-center" data-aos="fade-down" data-aos-delay="600">
						<img src="images/separador.png" alt="Servicios" class="img-fluid"/>
					</div>
					<div class="col-md-6 col-lg-5" data-aos="fade-right" data-aos-delay="900">
						<div class="box-servicio">
							<h3>Otra columna de servicios</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Harum tempore eos nulla animi distinctio? Facilis unde consequatur commodi deserunt quidem sit cumque. Maxime praesentium.</p>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
						</div>
						<div class="box-servicio">
							<h3>Sigamos agregando servicios, al cabo que no cuesta nada</h3>
							<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta eligendi aperiam nisi minus veritatis eius commodi at animi iste, eum blanditiis nihil</p>
						</div>
						<div class="box-servicio">
							<h3>Ultimo servicio a destacar</h3>
							<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
							<p>Lorem ipsum dolor, sit amet consectetur adipisicing elit. Non nemo beatae ea! Officiis, magni voluptatum voluptatem nesciunt quo consequatur architecto neque beatae sunt adipisci officia dolor? Ducimus nemo possimus porro? Lorem ipsum dolor sit, amet consectetur adipisicing elit. Praesentium doloribus repudiandae eos omnis! Obcaecati, debitis</p>
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
				<h3 class="mb-3">¿TIENES DUDAS? CONTÁCTANOS</h3>
				<h2><i class="fas fa-phone"></i> Llámanos al <a href="tel:<?php echo cleanString($config->contactos->telefono); ?>" class="link-phone"><?php echo $config->contactos->telefono; ?></a></h2>
			</div>
		
		</section>

		<section id="unidades">
		
			<div class="box-unidades-center d-none d-xl-block pt-5" data-aos="zoom-in" data-aos-delay="300">
				<img src="images/logo.png" alt="Grupo Verden" class="img-fluid" />
				<p class="mt-4">AMENIDADES</p>
				<a href="#masinformacion" class="btn btn-link mt-3">SOLICITA MÁS INFORMACIÓN</a>
			</div>
				

			<div class="container-fluid m-0 p-0">
			
				<div class="row no-gutters">

					<div class="col-md-6 col-unidad box-amenidad1">
						<div class="box-unidad" data-aos="fade-up-left" data-aos-delay="300">
							<h3 class="mb-3">AMENIDADES</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo possimus id sapiente dolorum</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-amenidad2">
						<div class="box-unidad" data-aos="fade-up-right" data-aos-delay="600">
							<h3 class="mb-3">AMENIDADES</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo possimus id sapiente dolorum</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-amenidad3">
						<div class="box-unidad" data-aos="fade-down-left" data-aos-delay="300">
							<h3 class="mb-3">AMENIDADES</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo possimus id sapiente dolorum</p>
						</div>
					</div>
					<div class="col-md-6 col-unidad box-amenidad4">
						<div class="box-unidad" data-aos="fade-down-right" data-aos-delay="600">
							<h3 class="mb-3">AMENIDADES</h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nemo possimus id sapiente dolorum</p>
						</div>
					</div>					
				
				</div>
			
			</div>
		
		</section>

		<section id="nuestros-clientes">
		
			<div class="slider-logos">

				<h4 class="mb-4 text-white text-center">NUESTROS CERFIFICADOS</h4>

				<div class="slide-logos d-flex justify-content-around align-items-center">
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
					<div><img src="images/iso.png" class="img-fluid" alt="Iso 9000" /></div>
				</div>
			
			</div>
			
		</section>
		

		<footer id="footer">

			<div class="container">
				<div class="row align-items-center text-center mb-xs-5">
					<div class="col-md-3">
						<div class="logo-footer mb-4">
							<img src="images/logo.png" alt="<?php echo $config->info->titulo; ?>" class="img-fluid" />
						</div>
					</div>
					<div class="col-md-4">
						<div class="contact-footer mb-4">
							<h4>CONTACTO</h4>
							<a href="mailto:<?php echo cleanString($config->contactos->email); ?>" class="link-email" target="_blank"><?php echo $config->contactos->email; ?></a>
							<br/><br/>
							<h4>TELÉFONO</h4>
							<a href="tel:<?php echo cleanString($config->contactos->telefono); ?>"><?php echo $config->contactos->telefono; ?></a><br/>
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
		<?php endif; ?>

		<!-- jQuery -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Bootstrap JavaScript -->
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js"></script>
		<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js"></script>

		<?php if ( $config->configuracion->assets->matchHeight == 1 ): ?>
		<script src="https://cdn.javimata.com/assets/js/jquery.matchHeight-min.js"></script>
		<?php endif; ?>

		<?php if ( $config->configuracion->assets->slick == 1 ): ?>
		<script type="text/javascript" src="//cdn.jsdelivr.net/npm/slick-carousel@1.8.1/slick/slick.min.js"></script>
		<?php endif; ?>

		<?php if ( $config->configuracion->assets->validate == 1 ): ?>
		<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/jquery-validation@1.17.0/dist/jquery.validate.js"></script>
		<?php endif; ?>

		<?php if ( $config->configuracion->revolution == 1 ): ?>
        <script type="text/javascript" src="assets/js/revolution.init.js"></script>
	    <script src="uniterevolution/assets/rs-plugin/js/jquery.themepunch.tools.min.js" type="text/javascript"></script>
	    <script src="uniterevolution/assets/rs-plugin/js/jquery.themepunch.revolution.min.js" type="text/javascript"></script>
		<?php endif ?>

		<?php if ( $config->configuracion->assets->aos == 1 ): ?>
		<script src="assets/js/aos.js"></script>
		<script>
		AOS.init({
			easing: 'ease-out-back',
			duration: 1000,
			once: true
		});
		</script>
		<?php endif; ?>
		<script src="assets/js/scripts.js"></script>

	</body>
</html>