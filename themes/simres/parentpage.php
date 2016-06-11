<?php
/**
 * The template for displaying pages that have a list of images to use as a slideshow.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 *
 * Template Name: Parent Page with Slideshow
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

			<?php
			while ( have_posts() ) : the_post(); ?>

			<?php if(CFS()->get('images')): ?>
				<ul class="slideshow">
					<?php $slides = CFS()->get('images');
								foreach($slides as $slide):?>
							<li><img src="<?php echo $slide['slide']; ?>" alt="" /></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>

      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title parent-page">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
            the_content(); ?>

						<?php if(CFS()->get('links')): ?>
							<ul class="related">
								 <?php $related_links = CFS()->get('links');
								 	foreach($related_links as $link): ?>
									<li><?php echo $link['link']; ?></li>
								<?php endforeach;?>
							</ul>
						<?php endif; ?>
        </div><!-- .entry-content -->

        <footer class="entry-footer">

					<ul class="related-pages">
						<?php
						global $id;

						$args = array( 'child_of' => $id, 'post_type' => 'page');
						$related_pages = get_pages($args);
						foreach($related_pages as $page): ?>
						<li>
							<?php if(has_post_thumbnail($page->ID)): ?>
								<a href="<?php echo get_permalink($page->ID) ?>">
									<?php echo get_the_post_thumbnail($page->ID, 'thumbnail'); ?>
									<p><?php echo $page->post_title ?></p>
								</a>
							<?php endif; ?>
						</li>
					<?php endforeach;?>
					</ul>
          <?php
            edit_post_link(
              sprintf(
                /* translators: %s: Name of current post */
                esc_html__( 'Edit %s', 'simres' ),
                the_title( '<span class="screen-reader-text">"', '"</span>', false )
              ),
              '<span class="edit-link">',
              '</span>'
            );
          ?>
        </footer><!-- .entry-footer -->
      </article><!-- #post-## -->

      <div class="side-image">
        <?php the_post_thumbnail( 'large' ); ?>
      </div>


			<?php endwhile; // End of the loop.
			?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
