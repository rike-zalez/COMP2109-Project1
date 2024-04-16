<?php
/*
Template Name: Homepage
*/

get_header(); ?>

<div class="hero-image" style="background-image:url('<?php the_field('hero-image'); ?>'); height: 400px; background-size: cover; background-position: center;">
</div>

<div class="intro-text" style="text-align: center; margin: 20px 0;">
    <?php the_field('intro-text');  ?>
</div>

<div class="home-posts">
    <?php
    $args = array(
        'posts_per_page' => 3 
    );
    $query = new WP_Query($args);
    if ($query->have_posts()) : ?>
        <div class="posts-grid">
            <?php while ($query->have_posts()) : $query->the_post(); ?>
                <div class="post-column" style="width: 33%; float: left; padding: 0 15px; box-sizing: border-box;">
                    <h2><?php the_title(); ?></h2>
                    <?php if (has_post_thumbnail()): ?>
                        <img src="<?php the_post_thumbnail_url('medium'); ?>" alt="<?php the_title(); ?>" style="width: 100%; height: auto;">
                    <?php endif; ?>
                    <p><?php the_excerpt(); ?></p>
                    <a href="<?php the_permalink(); ?>" class="read-more">Read More</a>
                </div>
            <?php endwhile; ?>
        </div>
    <?php endif; wp_reset_postdata(); ?>
</div>

<style>
    .posts-grid::after {
        content: "";
        display: table;
        clear: both;
    }
</style>

<?php get_footer(); ?>

