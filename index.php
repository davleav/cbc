<?php get_header(); ?>

        <div class="content">
            <?php
			if ( have_posts() ) :

				/* Start the Loop */
				while ( have_posts() ) : the_post();
					/*
					 * Include the Post-Format-specific template for the content.
					 * If you want to override this in a child theme, then include a file
					 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
					 */
					 echo "POST TYPE =".get_post_type();
					get_template_part( 'templates/content', get_post_type() );

				endwhile;

            endif;
            ?>
        </div>

<?php get_footer(); ?>