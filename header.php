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
<?php
$navBG = ot_get_option( 'pp_navbar_color');
$navLogo = ot_get_option( 'pp_logo_upload');
$logo_area_width = ot_get_option('pp_logo_area_width');
?>
<header id="header" <?php wpv_header_class(); ?> style="<?php if(!empty($navBG)){echo 'background:' . $navBG; } ?>">
	<div class="container">

		<a href="/" class="header-logo <?php echo wpv_number_to_width($logo_area_width); ?> columns">
			<?php
			if(!empty($navLogo)) {
				echo '<img src="' . esc_url($navLogo) . '" alt="Website logo" />';
			} ?>
		</a>

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

		<div id="mobile-navigation">
			<a href="#menu" class="menu-trigger"><i class="fa fa-reorder"></i></a>
		</div>
			
	</div>
</header>
<!-- Header / End -->

<?php 
if(is_home() || is_front_page()) {

	/* Hero */
	$homeHero = ot_get_option( 'pp_hero_image');
	if(!empty($homeHero)) {
		$homeHeroTitle = ot_get_option( 'pp_hero_image_title');
		$homeHeroSubtitle = ot_get_option( 'pp_hero_image_subtitle');
		?>
		<div id="fullscreen-image" class="fullscreen background parallax" style="background: url(<?php echo esc_url($homeHero); ?>) no-repeat center center;">
			<div class="fullscreen-image-title">
				<?php if(!empty($homeHeroTitle)) { ?>
					<h1 class="entry-title"><?php echo $homeHeroTitle ?></h1>
				<?php } ?>
				<?php if(!empty($homeHeroSubtitle)) { ?>
					<span><?php echo $homeHeroSubtitle ?></span>
				<?php } ?>
			</div>
			<div class="scroll-to-content bounce"></div>
		</div>
		<?php 
	}
}
?>
