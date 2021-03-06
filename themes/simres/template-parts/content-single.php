<?php
/**
 * Template part for single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

?>
<header class="single-standard-header">
	<?php the_post_thumbnail('full'); ?>
</header>

<section class="main-single-standard">

	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
		<header class="entry-header">
			<?php
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );

			if ( 'post' === get_post_type() ) : ?>
			<div class="entry-meta">
				<p><?php echo get_the_date(); ?></p>
			</div><!-- .entry-meta -->
			<?php
			endif; ?>
		</header><!-- .entry-header -->

		<div class="entry-content">
			<?php
				the_content();
			?>
		</div><!-- .entry-content -->

		<?php if(CFS()->get('related_links')): ?>
	  <ul class="related">

		    <?php $links = CFS()->get('related_links');
				if ( $links ):
		      foreach( $links as $link ): ?>
		      <li>
		        <?php echo wp_kses_post( $link['link'] ); ?>
		      </li>
	    <?php  endforeach; endif;?>
	  </ul>
	<?php endif; ?>

	</article><!-- #post-## -->

	<aside <?php post_class(); ?>>
	  <?php $images = CFS()->get('sidebar_images');
			if ( $images ):
	      foreach( $images as $image): ?>
	      <img src="<?php echo esc_url( $image['picture'] ); ?>" alt="" />
	    <?php  endforeach; endif;?>
	</aside>
</section>
