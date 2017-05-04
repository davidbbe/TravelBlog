<?php
/**
 * The template for displaying 404 pages (not found).
 *
 * @package TravelBlog
 */
get_header(); ?>


<section class="titlebar">
<div class="container">
	<div class="sixteen columns">
		<h2><?php _e('404 Page Not Found','travelblog') ?></h2>

		<nav id="breadcrumbs">
			<ul>
				<li><a href="<?php echo esc_url(home_url()); ?>"><?php _e('Home','travelblog') ?></a></li>
				<li><?php _e('404 Page Not Found','travelblog') ?></li>
			</ul>
		</nav>
	</div>
</div>
</section>


<!-- Container -->
<div class="container">

	<div class="sixteen columns">
		<section id="not-found">
			<h2>404 <i class="fa fa-question-circle"></i></h2>
			<p><?php _e( 'Oops! That page can&rsquo;t be found.', 'travelblog' ); ?></p>

		</section>
	</div>

</div>
<!-- Container / End -->

<div class="margin-top-50"></div>


<?php get_footer(); ?>
