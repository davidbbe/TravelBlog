<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package TravelBlog
 */

get_header(); 
$home = ot_get_option('pp_front_page_setup','global');
if ( class_exists( 'TravellerPress' ) ) {
	$mapflag = ($home == 'global' || $home == 'single' || $home == 'custom') ? true : false ;
} else {
	$mapflag = false;
}
$layout = ot_get_option('pp_blog_layout','full-width');
$position = ot_get_option('pp_front_map_position','behind');
?>

<!-- Content
================================================== -->

<?php if($mapflag) { if($position != 'alternative') {?>
	<div id="home-post-container">
	<?php } } ?>

	<!-- Container -->
	<div class="container <?php echo esc_attr($layout); ?>">

	<?php echo wpv_welcome(); ?>

		<?php
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
		} ?>

	<div class="home-map">
		<?php 
			if ($mapflag) { ?>
				<!-- Map Navigation -->
				<ul id="mapnav-buttons" class="<?php echo esc_attr($position); ?>">
					<li><a href="#" id="prevpoint" title="<?php _e('Previous Point On Map','travelblog'); ?>"><?php _e('Prev','travelblog') ?></a></li>
					<li><a href="#" id="nextpoint" title="<?php _e('Next Point On Map','travelblog'); ?>"><?php _e('Next','travelblog') ?></a></li>
				</ul>
		<?php } ?>
	</div>

		<!-- Blog Posts -->
		<?php if($layout !="full-width") { ?>
			<div class="eleven columns"> 
		<?php } else { ?>
			<div class="sixteen columns">
		<?php } ?>

 		<?php 
 			$post_style = ot_get_option('pp_posts_style','std');
 			if ($post_style=='std') {
 				$post_style = '';
 			}
 			if ( have_posts() ) :
 				while ( have_posts() ) : the_post(); 
					get_template_part( 'post-formats/content'.$post_style, get_post_format() );
				endwhile; 
			else : 
					get_template_part( 'post-formats/content'.$post_style, 'none' ); 
			endif; 
		?>
		<?php if($layout =="full-width") { ?></div><?php } ?>
		<!-- Blog Posts / End -->
		
		
		<div class="clearfix"></div>


		<!-- Pagination -->
		<div class="pagination-container alt">
			<?php 
			if(function_exists('wp_pagenavi')) { 
				wp_pagenavi(array(
					'next_text' => '<i class="fa fa-chevron-right"></i>',
					'prev_text' => '<i class="fa fa-chevron-left"></i>',
					'use_pagenavi_css' => false,
					));
			} else {
				the_posts_navigation(array(
		 			'prev_text'  => ' ',
		      'next_text'  => ' ',
				)); 
			}
			?>
		</div>
		<?php if($layout !="full-width") { ?>
		</div>
		<?php get_sidebar(); ?>
		<?php } ?>
	</div>
<?php if($mapflag) {  if($position != 'alternative') { ?></div><?php } } ?>

<?php get_footer(); ?>
