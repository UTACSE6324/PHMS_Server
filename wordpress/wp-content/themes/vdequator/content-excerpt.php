<?php
/**
 * @package vdequator
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
		
		<?php 
if ( has_post_thumbnail() ) { ?>
		<div class="entry-featured">
		<?php the_post_thumbnail(); ?>
		</div>
		<?php } 
?>
		
		<div class="entry-meta">
			<?php vdequator_posted_on(); ?>
		</div><!-- .entry-meta -->
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php the_excerpt(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'vdequator' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php vdequator_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
