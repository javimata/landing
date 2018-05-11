<?php
$jsonStr = file_get_contents("config.json");
$config = json_decode($jsonStr);

$strS = array('(',')',' ','-');
$strL = array('');
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
		<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet">

		<?php if ( $config->configuracion->revolution == 1 ): ?>
		<!-- Add Revolution Slider -->
	    <link href="uniterevolution/assets/rs-plugin/css/settings.css" rel="stylesheet" type="text/css" />
	    <link href="uniterevolution/assets/rs-plugin/css/dynamic-captions.css" rel="stylesheet" type="text/css" />
		<link href="uniterevolution/assets/rs-plugin/css/static-captions.css" rel="stylesheet" type="text/css" />
		<!-- End Revolution Slider -->
		<?php endif; ?>

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css">

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

		<header id="header">

		</header>

		<section id="navigation">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="#"><img src="<?php echo $config->info->logo; ?>" alt="<?php echo $config->info->titulo; ?>"></a>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarMain" aria-controls="navbarMain" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarMain">
					<div class="navbar-nav">
						<?php foreach($config->menu as $key => $menu): ?>
						<a href="<?php echo $menu->url; ?>" class="nav-item nav-link"><?php echo $key; ?></a>
						<?php endforeach; ?>
					</div>
				</div>
			</nav>
		</section>

		<section id="main" style="height: 2000px;">

		</section>

		<footer id="footer">

		</footer>

		<section id="copy">

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