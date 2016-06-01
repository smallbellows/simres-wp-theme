<?php
/**
 * The template for displaying archive pages.
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

			<?php
			/* Start the Loop */
			while ( have_posts() ) : the_post(); ?>


				<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
					<header class="entry-header">

						<h4> <?php echo date('F j, Y', strtotime(CFS()->get('seatalk_date'))); ?>
						<?php
							the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
 						?>
					</header><!-- .entry-header -->

					<div class="entry-content">

						<?php $fields = CFS()->get(); ?>

							<?php if(!empty( $fields['presenter'] )): ?>
								<p> <?php echo $fields['presenter'] ?>
							<?php endif; ?>

							<?php if(!empty( $fields['description'] )): ?>
								<p> <?php echo $fields['description'] ?>
							<?php endif; ?>

							<p>
							<?php if(!empty($fields['time'])): ?>

								<span class="time"> <?php echo $fields['time']; ?> </span>

							<?php endif; ?>
							<?php if(!empty($fields['location'])): ?>

								<span class="location"> <?php echo $fields['location']; ?> </span>

							<?php endif; ?>
							<?php if(!empty($fields['price'])): ?>

								<span class="price"> <?php echo $fields['price']; ?> </span>

							<?php endif; ?>


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
