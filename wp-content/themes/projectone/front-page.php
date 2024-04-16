<?php get_header(); ?>

<main role="main">
   
    <section>
        <h2>Featured Product</h2>
        <?php echo do_shortcode('[featured_product]'); ?>
    </section>

    <section>
        <?php
        if (have_posts()) :
            while (have_posts()) : the_post();
                the_content();
            endwhile;
        endif;
        ?>
    </section>
</main>

<?php get_footer(); ?>
