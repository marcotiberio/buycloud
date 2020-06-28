<?php 
	/* Template Name: Home */
?>

<?php get_header(); ?>

<section class="background_landing">

    <?php
		while ( have_posts() ) :
			the_post();

			get_template_part( 'template-parts/content', 'page' );

		endwhile; // End of the loop.
	?>

</section>


<?php
get_sidebar();
get_footer();