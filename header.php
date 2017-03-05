<!DOCTYPE html>
<html <?php language_attributes(); ?>>
	<head>
		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title><?php wp_title(); ?> <?php bloginfo('name'); ?></title>

		<meta name="description" content="<?php bloginfo( 'description' ); ?>">
        <meta name="keywords" content="" />

		<!-- Favicon -->
		<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png?v=wAvo4aN2YO">
		<link rel="icon" type="image/png" href="/favicon-32x32.png?v=wAvo4aN2YO" sizes="32x32">
		<link rel="icon" type="image/png" href="/favicon-16x16.png?v=wAvo4aN2YO" sizes="16x16">
		<link rel="manifest" href="/manifest.json?v=wAvo4aN2YO">
		<link rel="mask-icon" href="/safari-pinned-tab.svg?v=wAvo4aN2YO" color="#5bbad5">
		<link rel="shortcut icon" href="/favicon.ico?v=wAvo4aN2YO">
		<meta name="apple-mobile-web-app-title" content="Blue Jay">
		<meta name="application-name" content="Blue Jay">
		<meta name="theme-color" content="#ffffff">

		<!-- Bootstrap CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" integrity="sha384-1q8mTJOASx8j1Au+a5WDVnPi2lkFfwwEAa8hDDdjZlpLegxhjVME1fgjWPGmkzs7" crossorigin="anonymous">
	
		<!-- font styles -->
		<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,700" rel="stylesheet">

		<!-- Theme styles -->
		<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>">

		<!-- Font awesome -->
		<link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/font-awesome-4.7.0/css/font-awesome.min.css">

		<!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
		<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
		<!--[if lt IE 9]>
			<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.2/html5shiv.min.js"></script>
			<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
		<![endif]-->

		<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
    	<?php if ( is_singular() && get_option( 'thread_comments' ) ) wp_enqueue_script( 'comment-reply' ); ?>

        <?php wp_head(); ?>
	</head>
	<body <?php body_class(); ?>>
		<?php
		
		?>

		<header id="header">
			<div class="container"> 
				<a href="<?php echo get_site_url() ?>" class="navbar-brand">
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo.svg" alt="" class="logo"/>
					<img src="<?php echo get_template_directory_uri(); ?>/img/logo-onblack.svg" alt="" class="logo-negative"/>
				</a>
				<input type="checkbox" id="ncMenu" autocomplete="off"/>
				<label for="ncMenu">Menu</label>
				<div id="cover"></div>

				<?php

				$defaults = array(
					'theme_location'  => 'primary',
					'menu'            => 'main-menu',
					'container'       => 'nav',
					'container_class' => '',
					'container_id'    => '',
					'menu_class'      => 'nav navbar',
					'menu_id'         => '',
					'echo'            => true,
					'fallback_cb'     => 'wp_page_menu',
					'before'          => '',
					'after'           => '',
					'link_before'     => '',
					'link_after'      => '',
					'items_wrap'      => '<ul id="%1$s" class="%2$s">%3$s</ul>',
					'depth'           => 0,
					'walker'          => ''
				);

				wp_nav_menu( $defaults );

				?>
			</div>
		</header>