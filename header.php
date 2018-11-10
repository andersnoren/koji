<!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta http-equiv="content-type" content="<?php bloginfo( 'html_type' ); ?>" charset="<?php bloginfo( 'charset' ); ?>" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="http://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<div id="site-wrapper">

			<header id="site-header">

				<div class="header-top section-inner">

					<?php

					if ( function_exists( 'the_custom_logo' ) && get_theme_mod( 'custom_logo' ) ) :

						koji_custom_logo();

					elseif ( is_front_page() || is_home() ) : ?>

						<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></h1>

					<?php else : ?>

						<p class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a></p>

					<?php endif; ?>

					<button class="toggle nav-toggle" data-toggle-target=".mobile-menu-wrapper" data-toggle-scroll-lock="true">
						<label>
							<span class="show"><?php _e( 'Menu', 'koji' ); ?></span>
							<span class="hide"><?php _e( 'Close', 'koji' ); ?></span>
						</label>
						<div class="bars">
							<div class="bar"></div>
							<div class="bar"></div>
							<div class="bar"></div>
						</div><!-- .bars -->
					</button><!-- .nav-toggle -->

				</div><!-- .header-top -->

				<div class="header-inner section-inner">

					<div class="header-inner-top">

						<?php if ( get_bloginfo( 'description' ) ) : ?>

							<p class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></p>

						<?php endif; ?>

						<ul class="site-nav reset-list-style">
							<?php
							if ( has_nav_menu( 'primary-menu' ) ) {
								wp_nav_menu( array(
									'container' 		=> '',
									'items_wrap' 		=> '%3$s',
									'theme_location' 	=> 'primary-menu',
								) );
							} else {
								wp_list_pages( array(
									'container' => '',
									'title_li' 	=> '',
								) );
							}
							?>
						</ul>

						<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

							<div class="sidebar-widgets">
								<?php dynamic_sidebar( 'sidebar' ); ?>
							</div><!-- .sidebar-widgets -->

						<?php endif; ?>

					</div><!-- .header-inner-top -->

					<div class="social-menu-wrapper">

						<?php

						$disable_search = get_theme_mod( 'koji_disable_search' ) ? get_theme_mod( 'koji_disable_search' ) : false;
						$show_social_menu = has_nav_menu( 'social' ) || ! $disable_search;

						if ( $show_social_menu ) : ?>

							<ul class="social-menu reset-list-style social-icons s-icons">

								<?php if ( ! $disable_search ) : ?>

									<li class="search-toggle-wrapper"><a href="#" data-toggle-target=".search-overlay" data-set-focus=".search-overlay .search-field" class="toggle search-toggle"></a></li>

									<?php
								endif;

								$social_menu_args = array(
									'theme_location'	=> 'social',
									'container'			=> '',
									'container_class'	=> '',
									'items_wrap'		=> '%3$s',
									'menu_id'			=> '',
									'menu_class'		=> '',
									'depth'				=> 1,
									'link_before'		=> '<span class="screen-reader-text">',
									'link_after'		=> '</span>',
									'fallback_cb'		=> '',
								);

								wp_nav_menu( $social_menu_args );

								?>

							</ul><!-- .social-menu -->

						<?php endif; ?>

					</div><!-- .social-menu-wrapper -->

				</div><!-- .header-inner -->

			</header><!-- #site-header -->

			<div class="mobile-menu-wrapper">

				<div class="mobile-menu section-inner">

					<div class="mobile-menu-top">

						<?php if ( get_bloginfo( 'description' ) ) : ?>

							<p class="site-description"><?php echo wp_kses_post( get_bloginfo( 'description' ) ); ?></p>

						<?php endif; ?>

						<ul class="site-nav reset-list-style">
							<?php
							if ( has_nav_menu( 'mobile-menu' ) ) {
								wp_nav_menu( array(
									'container' 		=> '',
									'items_wrap' 		=> '%3$s',
									'theme_location' 	=> 'mobile-menu',
								) );
							} else {
								wp_list_pages( array(
									'container' => '',
									'title_li' 	=> '',
								) );
							}
							?>
						</ul>

						<?php if ( is_active_sidebar( 'sidebar' ) ) : ?>

							<div class="sidebar-widgets">
								<?php dynamic_sidebar( 'sidebar' ); ?>
							</div><!-- .sidebar-widgets -->

						<?php endif; ?>

					</div><!-- .mobile-menu-top -->

					<div class="social-menu-wrapper">

						<?php if ( $show_social_menu ) : ?>

							<ul class="social-menu reset-list-style social-icons s-icons mobile">

								<?php if ( ! $disable_search ) : ?>

									<li class="search-toggle-wrapper"><a href="#" data-toggle-target=".search-overlay" data-set-focus=".search-overlay .search-field" class="toggle search-toggle"></a></li>

									<?php
								endif;

								wp_nav_menu( $social_menu_args ); ?>

							</ul><!-- .social-menu -->

						<?php endif; ?>

					</div><!-- .social-menu-wrapper -->

				</div><!-- .mobile-menu -->

			</div><!-- .mobile-menu-wrapper -->

			<?php if ( ! $disable_search ) : ?>

				<div class="search-overlay cover-modal">

					<button class="toggle search-untoggle" data-toggle-target=".search-overlay">
						<img src="<?php echo get_template_directory_uri(); ?>/assets/images/icons/cross.svg" />
					</button><!-- .search-untoggle -->

					<div class="section-inner search-overlay-form-wrapper">
						<?php echo get_search_form(); ?>
					</div><!-- .section-inner -->

				</div><!-- .search-overlay -->

			<?php endif; ?>
