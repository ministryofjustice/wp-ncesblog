<?php global $linen; ?>
<!DOCTYPE html>
<html <?php language_attributes( 'html' ) ?>>
<head>
	<?php if ( is_front_page() ) : ?>
		<title><?php bloginfo( 'name' ); ?></title>
	<?php elseif ( is_404() ) : ?>
		<title><?php _e( 'Page Not Found |', 'linen' ); ?> | <?php bloginfo( 'name' ); ?></title>
	<?php elseif ( is_search() ) : ?>
		<title><?php printf(__ ("Search results for '%s'", "linen"), get_search_query()); ?> | <?php bloginfo( 'name' ); ?></title>
	<?php else : ?>
		<title><?php wp_title($sep = '' ); ?> | <?php bloginfo( 'name' );?></title>
	<?php endif; ?>

	<!-- Basic Meta Data -->
	<meta charset="<?php bloginfo( 'charset' ); ?>" />
	<meta name="copyright" content="<?php
		echo esc_attr( sprintf(
			__( 'Design is copyright %1$s The Theme Foundry', 'linen' ),
			date( 'Y' )
		) );
	?>" />

	<!-- Favicon -->
	<link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/images/favicon.ico" />

	<!-- WordPress -->
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	<?php wp_head(); ?>

    <link rel="stylesheet" type="text/css" href="<?php echo home_url(); ?>/wp-content/themes/linen_pro/stylesheets/one.css">
    <link rel="stylesheet" type="text/css" href="<?php echo home_url(); ?>/wp-content/themes/linen_pro/stylesheets/two.css">
	<link href='http://fonts.googleapis.com/css?family=Cabin:400,700' rel='stylesheet' type='text/css'>

</head>
<body <?php body_class(); ?>>
	<div class="skip-content"><a href="#content"><?php _e( 'Skip to content', 'linen' ); ?></a></div>
	<div id="wrapper" class="clear">
		<div id="header" class="clear">
			<div id="title">
				<a href="<?php echo home_url( '/' ); ?>">
					<img src="<?php echo get_stylesheet_directory_uri(); ?>/images/hmcts-logo.png" alt="HM Courts &amp; Tribunals Service" />
					<span class="blogname"><?php bloginfo( 'name' ); ?></span>
				</a>
			</div>
			<?php
				wp_nav_menu(
					array(
						'theme_location'  => 'nav-1',
						'container_id'    => 'navigation',
						'container_class' => 'clear',
						'menu_class'      => 'nav',
						'fallback_cb'     => array( &$linen, 'main_menu_fallback')
						)
					);
			?>
		</div><!--end header-->
		<?php if ( (is_front_page() || $wp_query->is_posts_page) && !is_paged() && $linen->use_featured_header() ) { ?>
			<?php get_template_part( 'tmpart-featured' ); ?>
		<?php } ?>
		<?php if (is_page_template( 'tm-left-sidebar.php' )) : ?>
			<?php get_sidebar(); ?>
		<?php endif; ?>

	<div id="featured" class="clear">
		<div class="blog-description"><?php bloginfo('description'); ?></div>
	</div>

		<div id="content" <?php if ( ( is_page_template( 'tm-no-sidebar.php' ) ) || ( $linen->sidebarDisable() == 'true' ) ) echo ( 'class="no-sidebar"' ); ?>>
