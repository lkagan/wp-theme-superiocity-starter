<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class( ! is_front_page() ? 'inner' : '' ); ?>>
<div id="page" class="site">
    <div class="header-wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
				<?php
				if ( $super_logo = get_theme_mod( 'super_logo' ) ) :
						echo wp_get_attachment_image( get_theme_mod( 'super_logo' ) );
				else :
					?><h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<?php endif;

				$description = get_bloginfo( 'description', 'display' );
				if ( $description || is_customize_preview() ) : ?>
					<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
				<?php
				endif; ?>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-open" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<div class="main-nav-wrapper">
                    <a href="#" class="menu-close">close <i class="fa fa-angle-right"></i></a>
					<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_id' => 'primary-menu' ) ); ?>
				</div><!-- .main-nav-wrapper -->
			</nav><!-- #site-navigation -->
			<?php if ( is_active_sidebar( 'header_bar' ) ) : ?>
				<div class="extra_header_section">
					<?php dynamic_sidebar( 'header_bar' ); ?>
				</div>
			<?php endif; ?>
		</header><!-- #masthead -->
    </div><!-- .header-wrapper -->
	<div id="content" class="site-content">
		<div class='hero-container-wrapper'>
			<div class="hero-container" id="hero-container">
				<section class="hero">
                    <video src="https://www.superiocity.com/wp-content/themes/superiocity.com/bubbles.mp4" autoplay loop poster="https://www.superiocity.com/wp-content/themes/superiocity.com/images/bubbles-poster.jpg">
				</section>
			</div><!-- .hero-container -->
		</div><!-- .hero-conteiner-wrapper -->
