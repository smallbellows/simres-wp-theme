<?php
/**
 * The template for displaying the directors page
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<header class="page-header">
				<?php
					the_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
			</header><!-- .page-header -->


      <div class="directors">


			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

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

			<?php endwhile; ?>
  </div>

	   <?php else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
