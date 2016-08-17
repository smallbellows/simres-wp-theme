<?php
/**
 * The template for displaying pages with a large image on the right side.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 *
 * Template Name: Image on Right Side
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h2 class="entry-title">', '</h2>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
            the_content(); ?>

						<?php if(CFS()->get('links')): ?>
							<ul class="related">
								 <?php $related_links = CFS()->get('links');
								 	foreach($related_links as $link): ?>
									<li><?php echo wp_kses_post( $link['link'] ); ?></li>
								<?php endforeach;?>
							</ul>
						<?php endif; ?>
        </div><!-- .entry-content -->


      </article><!-- #post-## -->

      <div class="side-image">
        <?php the_post_thumbnail( 'large' ); ?>

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
      </div>



			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
