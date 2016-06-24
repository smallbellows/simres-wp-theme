<?php
/**
 * The template for styling the blog page.
 *
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

get_header('blog'); ?>
<header class="hero">
	<h2>SIMRES News</h2>
</header>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


		<?php
		if ( have_posts() ) : ?>

		<div class="blog-archive">
			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<?php get_template_part( 'template-parts/content', 'post' );

			endwhile; ?>
		</div>
			<?php the_posts_navigation();

		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

get_footer();
