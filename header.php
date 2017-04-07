<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="format-detection" content="telephone=no">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php wp_head(); ?>
</head>
<body <?php body_class( ( ! is_front_page() ? 'inner' : '' ) . ' ' . get_post_field( 'post_name', get_post() ) ); ?>>
<div id="page" class="site">
    <div class="header-wrapper">
		<header id="masthead" class="site-header" role="banner">
			<div class="site-branding">
                <a href="/">
					<?php
					if ( $super_logo = get_theme_mod( 'super_logo' ) ) {
							echo wp_get_attachment_image( get_theme_mod( 'super_logo' ), 'full', false, 'class=logo' );
					} ?>
					<div class="text">
						<h1 class="site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php
						$description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h2 class="site-description"><?php echo $description; /* WPCS: xss ok. */ ?></h2>
						<?php endif; ?>
					</div><!-- .text -->
				</a>
			</div><!-- .site-branding -->
			<nav id="site-navigation" class="main-navigation" role="navigation">
				<button class="menu-open" aria-controls="primary-menu" aria-expanded="false"><i class="fa fa-bars"></i></button>
				<div class="main-nav-wrapper">
                    <a href="#" class="menu-close"><i class="fa fa-close"></i></a>
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
			<div class="hero-container fixed" id="hero-container">
				<section class="hero">
					<?php
					$super_webm        = get_field( 'webm' );
					$super_mp4         = get_field( 'mp4' );
					$super_poster      = get_field( 'poster_image' )->url;
					$super_primary_vid = $super_mp4 ?? $super_webm;

					if ( $super_primary_vid ) : ?>
                    <video src="<?php echo $super_primary_vid ?>"
                           autoplay loop
                           poster="<?php echo $super_poster ?>">
                        <?php if ( $super_mp4 ) : ?>
                        <source src="<?php echo $super_mp4 ?>">
                        <?php endif; ?>
	                    <?php if ( $super_webm ) : ?>
                            <source src="<?php echo $super_webm ?>">
	                    <?php endif; ?>
					<?php endif; ?>
				</section>
			</div><!-- .hero-container -->
            <div class="call-to-action"><?php echo get_theme_mod( 'super_call_to_action' ) ?></div>
			<?php if ( ! is_front_page() ) : ?>
                <h1 class="page-title"><?php echo get_the_title( $GLOBALS['post_id'] ); ?></h1>
			<?php endif; ?>
            <?php if ( is_404() ) : ?>
                <h1 class="page-title"><?php echo __( 'Page Not Found', 'superiocity' ); ?></h1>
            <?php endif; ?>
		</div><!-- .hero-conteiner-wrapper -->
