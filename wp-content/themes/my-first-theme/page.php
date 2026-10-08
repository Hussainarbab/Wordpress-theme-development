<?php get_header(); ?>

<main>

    <?php if ( have_posts() ) : ?>

        <?php while ( have_posts() ) : the_post(); ?>

            <h1><?php the_title(); ?></h1>

            <div>
                <?php the_content(); ?>
            </div>

        <?php endwhile; ?>

    <?php endif; ?>

</main>

<?php get_footer(); ?>