<?php get_header(); ?>

<main>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <article>

                <h1><?php the_title(); ?></h1>

                <p>
                    Published on <?php echo get_the_date(); ?>
                </p>

                <div>
                    <?php the_content(); ?>
                </div>

            </article>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>