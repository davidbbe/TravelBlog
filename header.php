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

  <!-- Favicon stuff -->
  <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
  <link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
  <link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
  <link rel="manifest" href="/site.webmanifest">
  <link rel="mask-icon" href="/safari-pinned-tab.svg" color="#5bbad5">
  <meta name="msapplication-TileColor" content="#da532c">
  <meta name="theme-color" content="#ffffff">
</head>

<body <?php body_class(); ?>>

<!-- Header
================================================== -->
<header id="header" <?php wpv_header_class(); ?>>
	<div class="container">

    <div class="header-info">
      <div class="header-info-inner">
        <a href="/">
          <h1 class="header-info-1">David<br />Beauchamp</h1>
          <img src="<?php echo get_template_directory_uri(); ?>/images/profile-photo.jpg" alt="Author prfile image" />
          <h1 class="header-info-2">Digital Nomad<br />World traveler</h1>
        </a>
      </div>
    </div>
			
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

