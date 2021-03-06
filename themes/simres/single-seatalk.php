<?php
/**
 * The template for displaying all single seatalk (cpt) posts.
 *
 *
 * @package simres
 */

get_header('blog'); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">

		<?php
		while ( have_posts() ) : the_post(); ?>
    <?php $fields = CFS()->get(); ?> <!-- get all the custom fields for this post-type -->
      <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

        <header>
          <?php if (!empty($fields['header_image'])): ?>
            <img src="<?php echo $fields['header_image'] ?>" alt="" />
          <?php endif; ?>
          <h2 class="screen-reader-text"><?php echo the_title() ?></h2>
        </header>
        <div class="seatalk-content">

          <div class="meta">
            <h2><?php echo the_title(); ?></h2>
            <h3><?php echo $fields['subtitle']; ?></h3>
            <h4 class="featured">Saturna Island, BC</h4>

            <h4><?php echo the_date(); ?> <?php echo $fields['time']; ?></h4>

            <p><?php echo $fields['location']; ?></p>
            <p><?php echo $fields['price']; ?></p>

            <!-- loop through cfs loop of pictures -->
            <?php if (!empty($fields['small_pics'])): ?>
              <div class="seatalk-pics">
                <?php $pic_group = $fields['small_pics'];
                foreach($pic_group as $pic): ?>
                  <img src="<?php echo $pic['small_photo']; ?>" alt="" />
                <?php endforeach; ?>
              </div>
            <?php endif; ?>

          </div>

          <div class="content">

            <h3><?php echo $fields['presenter']; ?></h3>
            <?php echo $fields['long_description']; ?>

            <div class="logotext">
              <a href="<?php echo get_home_url(); ?>">
                <h3>saturna<span class="featured">marine</span>research.ca</h3>
              </a>
              <p>SEA<strong>TALKS </strong>| Saturna Environmental Awareness Talks presented by Saturna Island Marine Research &amp; Education Society | <strong>SIMRES</strong></p>
            </div>
      </div>


    </div>




      </article>


		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_footer();
