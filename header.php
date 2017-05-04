<?php
/**
 * The header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package TravelBlog
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>

<!-- Header
================================================== -->
<header id="header" <?php wpv_header_class(); ?>>
	<div class="container">
		<?php 
		$logo_area_width = ot_get_option('pp_logo_area_width',5);
    $menu_area_width = 16 - intval($logo_area_width); ?>
		<!-- Logo / Mobile Menu -->
		<div class="<?php echo wpv_number_to_width($logo_area_width); ?> columns">
			
			<!-- Navigation -->
			<div id="mobile-navigation">
				<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
			</div>

			<!-- Logo -->
			<div id="logo">
				 <?php
                $logo = ot_get_option( 'pp_logo_upload' );
                if($logo) {
                    if(is_front_page()){ ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr(get_bloginfo('name', 'display')); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"/></a>
                    <?php } else { ?>
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><img src="<?php echo esc_url($logo); ?>" alt="<?php esc_attr(bloginfo('name')); ?>"/></a>
                    <?php }
                } else {
                    if(is_front_page()) { ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                    <?php } else { ?>
                    <h2><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h2>
                    <?php }
                }
                ?>
                <?php if(get_theme_mod('travelblog_tagline_switch','hide') == 'show') { ?><div id="blogdesc"><?php bloginfo( 'description' ); ?></div><?php } ?>
			</div>
			
		</div>

		<!-- Navigation -->
		<div class="<?php echo wpv_number_to_width($menu_area_width); ?> columns">
			<nav id="navigation" class="menu">
				<?php wp_nav_menu( array(
            'theme_location' => 'primary',
            'container' => false,
            'menu_id'  => 'responsive',
          ));
        ?>
			</nav>
		</div>
		<div class="clearfix"></div>
	</div>
</header>
<!-- Header / End -->

<?php 

if(is_home() || is_front_page()) {
	$home = ot_get_option('pp_front_page_setup','global');
	$position = ot_get_option('pp_front_map_position','behind');
		if ( class_exists( 'TravellerPress' ) ) {
			switch ($home) {
				case 'global':
					echo do_shortcode('[tp-global-map class="'.$position.'"]' );
					break;	
				case 'slider':
					get_template_part( 'slider' );
					break;	
				case 'custom':
					echo do_shortcode('[tp-custom-map type="as_global" id="'.ot_get_option('pp_custom_map_global',0).'" class="'.$position.'"]' );
					break;	
				case 'none':
					echo '<div class="margin-top-50"></div>';
					break;	
				default:
					echo '<div class="margin-top-50"></div>';
					break;
			};
		} else {
			switch ($home) {
				case 'slider':
					get_template_part( 'slider' );
					break;	
				case 'none':
					echo '<div class="margin-top-50"></div>';
					break;	
				default:
					echo '<div class="margin-top-50"></div>';
					break;
			};

		}
}

?>

