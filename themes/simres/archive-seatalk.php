<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

get_header(); ?>

	<div class="side-area">
		<h2 class="screen-reader-text"><?php the_archive_title(); ?></h2>
	</div>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		if ( have_posts() ) : ?>

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>

				<?php $fields = CFS()->get(); ?>
				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">

						<h4> <?php echo date('F j, Y', strtotime(CFS()->get('seatalk_date'))); ?>
							<?php if (!empty($fields['header_image'])): ?>
								<?php
									the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h3>' );
								?>
							<?php else: ?>
								<?php the_title( '<h3 class="entry-title">', '</h3>'); ?>
							<?php endif; ?>

					</header><!-- .entry-header -->

					<div class="entry-content">



							<?php if(!empty( $fields['presenter'] )): ?>
								<?php echo wp_kses_post( $fields['presenter'] ); ?>
							<?php endif; ?>

							<?php if(!empty( $fields['description'] )): ?>
								<?php echo wp_kses_post( $fields['description'] ); ?>
							<?php endif; ?>

							<p>
							<?php if(!empty($fields['time'])): ?>

								<span class="time"> <?php echo wp_kses_post( $fields['time'] ); ?> </span>

							<?php endif; ?>
							<?php if(!empty($fields['location'])): ?>

								<span class="location"> <?php echo wp_kses_post( $fields['location'] ); ?> </span>

							<?php endif; ?>
							<?php if(!empty($fields['price'])): ?>

								<span class="price"> <?php echo wp_kses_post( $fields['price'] ); ?> </span>

							<?php endif; ?>
						</p>

					</div><!-- .entry-content -->

				</article><!-- #post-## -->

			<?php endwhile;



		else :

			get_template_part( 'template-parts/content', 'none' );

		endif; ?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php

	get_footer();
