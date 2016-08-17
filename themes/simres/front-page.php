<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package simres
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<!-- slider of images -->
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
		<div class="entry-content homepage">
			<?php the_content(); ?>
		</div>

	<?php endwhile; wp_reset_postdata();?>

        <!-- custom loop of seatalks -->
			<section>
				<h2 class="loop-title" >SIMRES Events</h2>
			<ul class="related-pages">
				<?php
					$args = array('post_type' => 'seatalk',
												'order' => 'DESC',
												'posts_per_page' => 5,
												'meta_query' => array(array('key' => '_thumbnail_id')) );
					$seatalks = get_posts($args);
					foreach($seatalks as $post): setup_postdata($post);
				 ?>
				 	<li>
						<a href="<?php echo the_permalink(); ?>">
							<?php the_post_thumbnail('thumbnail'); ?>
							<h3><?php the_title(); ?></h3>
							<p><?php echo date( 'F j, Y', strtotime( CFS()->get('seatalk_date') ) ); ?></p>
						</a>
					</li>
				 <?php endforeach; wp_reset_postdata(); ?>
			 </ul>
			</section>
        <!-- custom loop of news posts -->

				<section>
					<h2 class="loop-title">SIMRES News</h2>
					<ul class="related-pages">
						<?php
							$args = array('post_type' => 'post',
														'order' => 'DESC',
														'posts_per_page' => 5,
														'meta_query' => array(array('key' => '_thumbnail_id')) );
							$news = get_posts($args);
							foreach($news as $post): setup_postdata($post);
						 ?>
							<li>
								<a href="<?php echo the_permalink(); ?>">
									<?php the_post_thumbnail('thumbnail'); ?>
									<h3><?php the_title(); ?></h3>
									<p><?php the_date(); ?></p>
								</a>
							</li>
						 <?php endforeach; wp_reset_postdata(); ?>

					</ul>
				</section>


		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
