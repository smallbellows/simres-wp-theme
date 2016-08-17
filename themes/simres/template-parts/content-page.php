<?php
/**
 * Template part for displaying page content in page.php.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
			the_content(); ?>

			<ul>
		    <?php
		    global $id;
		    wp_list_pages( array(
		        'title_li'    => '',
		        'child_of'    => $id
		    ) );
		    ?>
		</ul>

	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php

			if(CFS()->get('related_news')): ?>
			<div class="related-news">
				<h4>Recent SIMRES News about <?php the_title(); ?></h4>
				<?php
					$news_category = CFS()->get('related_news');
					foreach ($news_category as $key => $label) {
						$news_category = $label;
					}

					$args = array(
						'category' => $news_category,
						'posts_per_page' => 2
					);
					$posts_array = get_posts( $args);
					foreach( $posts_array as $post ): setup_postdata($post);
					?>
					<p>
						<a href="<?php the_permalink();  ?>"><?php the_title(); ?></a>
					</p>

				<?php endforeach; wp_reset_postdata(); ?>
			</div>
		<?php endif; ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
