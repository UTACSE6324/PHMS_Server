<?php get_header(); ?>
<div class="col-8" id="main">
	<div class="res-cons">
		<?php if (have_posts()) : while (have_posts()) : the_post(); ?>
			<article class="post">
				<h2 class="post-title">
					<a href="<?php the_permalink() ?>"><?php the_title() ?></a>
				</h2>
				<ul class="post-meta">
					<li><?php the_time('F j, Y'); ?></li>
					<li class="comment-count"><a href="<?php the_permalink() ?>" rel="bookmark" title="进入<?php the_title();?>" >阅读全文</a></li>
				</ul>
			</article>
		<?php endwhile; endif;?>
		<?php pagenavi();?>
	</div>
</div>
<?php get_sidebar(); ?>
<?php get_footer(); ?>
