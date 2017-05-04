<?php
/**
 * Template part for displaying posts.
 *
 * @package TravelBlog
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	
	<?php if ( has_post_thumbnail() ) { ?>
		<!-- Thumbnail -->
		<a href="<?php echo esc_url(get_permalink()); ?>">
			<?php the_post_thumbnail('post'); ?>
		</a>
	<?php } ?>
	<!-- Post Content -->
	<div class="post-content">
		
		<?php travelblog_full_posted_on(); ?>
			<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
			<?php the_excerpt(); ?>
			<a href="<?php the_permalink(); ?>" class="button"><?php esc_html_e('View More','travelblog') ?></a>
	</div>
</article>
