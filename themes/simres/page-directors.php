<?php
/**
 * The template for displaying the Directors Page. It has a loop for displaying all
 * Dirctor posts.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site may use a
 * different template.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

get_header(); ?>
	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<?php
			while ( have_posts() ) : the_post(); ?>


      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
        <header class="entry-header">
          <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>
        </header><!-- .entry-header -->

        <div class="entry-content">
          <?php
            the_content(); ?>

          <!-- start custom loop for dislaying all directors -->

        </div><!-- .entry-content -->

      </article><!-- #post-## -->



			<?php endwhile; wp_reset_postdata(); // End of the loop.?>


                <div class="directors">
                  <?php  $args = array( 'post_type' => 'directors', 'order' => 'ASC', 'posts_per_page' => -1);
                         $directors = get_posts( $args );
                         foreach($directors as $post): setup_postdata( $post ); ?>

                         <div class="director-photo">
                           <a class="lightbox" href="#<?php echo the_id(); ?>">
                             <img src="<?php echo CFS()->get('primary_photo'); ?>" alt="<?php the_title(); ?>" />
                           </a>
                           <div class="lightbox-target" id="<?php echo the_id(); ?>">
                             <img src="<?php echo CFS()->get('secondary_photo'); ?>" alt="<?php the_title(); ?>" />
                             <div class="caption">
                               <?php the_title('<h2>', '</h2>') ?>
                               <?php the_content(); ?>
                             </div>
                             <a class="lightbox-close" href="#"></a>
                           </div>
                         </div>
                  <?php endforeach; wp_reset_postdata(); ?>
              </div>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
