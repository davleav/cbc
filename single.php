<?php get_header(); ?>
        <div class="content">
            <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();
					
					get_template_part( 'templates/content', 'single' );

				endwhile;

            endif;
            ?>
        </div>

<?php get_footer(); ?>