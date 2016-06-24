<?php
/**
 * Template part for displaying blog posts on archive.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

?>

<div id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php

				the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php simres_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<?php
      the_post_thumbnail('small');
		?>
	</div><!-- .entry-content -->

</div><!-- #post-## -->
