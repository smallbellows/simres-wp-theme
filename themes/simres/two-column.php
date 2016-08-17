<?php
/**
 * The template for displaying 2-column pages (on small screens, right column will
 * sit below the left column).
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 *
 * Template Name: 2-Column
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
							<li><img src="<?php echo esc_url( $slide['slide'] ); ?>" alt="" /></li>
					<?php endforeach; ?>
				</ul>
			<?php endif; ?>
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <!-- .entry-header -->

        <div class="entry-content">

          <div class="left-column">
						<header class="entry-header">
		          <?php the_title( '<h2 class="entry-title parent-page">', '</h2>' ); ?>
		        </header>
            <?php echo CFS()->get( 'left_side' ); ?>
          </div>

          <div class="right-column">
            <?php echo CFS()->get( 'right_side' ); ?>
          </div>


        </div><!-- .entry-content -->

        <footer class="entry-footer">
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
