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
					post_type_archive_title( '<h1 class="page-title">', '</h1>' );
				?>
				<p>The directors of SIMRES are residents of Saturna Island with a broad variety of interests and life experiences. Each, in their own way, brings a different personality and perspective to the organization. Click on a photo to learn more about our directors.</p>
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
