<?php
/**
 * The template for displaying all single seatalk (cpt) posts.
 *
 *
 * @package simres
 */

get_header(); ?>

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
          <h1 class="screen-reader-text"><?php echo the_title() ?></h1>
        </header>
        <div class="seatalk-content">

          <div class="meta">
            <h1><?php echo the_title(); ?></h1>
            <h3 class="featured">Saturna Island, BC</h3>

            <h4><?php echo the_date(); ?> <?php echo $fields['time']; ?></h4>

            <p><?php echo $fields['location']; ?></p>
            <p><?php echo $fields['price']; ?></p>

            <!-- loop through cfs loop of pictures -->
          </div>

          <div class="content">

            <h2><?php echo $fields['presenter']; ?></h2>
            <?php echo $fields['long_description']; ?>

            <div class="logotext">
              <a href="<?php echo get_home_url(); ?>">
                <h2>saturna<span class="featured">marine</span>research.ca</h2>
              </a>
              <p>SEA<strong>TALKS </strong>| Saturna Environmental Awareness Talks presented by Saturna Island Marine Research &amp; Education Society | <strong>SIMRES</strong></p>
            </div>
      </div>


          </div>
        </div>



      </article>


		<?php endwhile; // End of the loop.
		?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
