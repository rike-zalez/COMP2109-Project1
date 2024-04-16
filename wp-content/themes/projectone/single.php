<?php get_header(); ?>

<div id="primary" class="content-area">
    <main id="main" class="site-main" style="width: 75%; float: left;">

        <?php while ( have_posts() ) : the_post(); ?>
        
            <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
                <?php if ( has_post_thumbnail() ) : ?>
                    <div class="post-thumbnail">
                        <?php the_post_thumbnail('full', ['style' => 'width: 100%; height: auto; margin-bottom: 20px;']); ?>
                    </div>
                <?php endif; ?>

                <header class="entry-header">
                    <h1 class="entry-title"><?php the_title(); ?></h1>
                    <p>Posted by <?php the_author_posts_link(); ?> 
                </header>

                <div class="entry-content">
                    <?php the_content(); ?>
                </div>

                <footer class="entry-footer">
                    
                </footer>
            </article>

        <?php endwhile; ?>

    </main>

    <!--hardcoded side reference:https://wordpress.org/support/topic/custom-php-code-in-sidebar/-->
    <aside id="secondary" class="widget-area" style="flex: 1 0 25%; background-color: #f1f1f1; padding: 20px; box-sizing: border-box;">
        <h2 class="widget-title">Other Posts</h2>
        <ul style="list-style: none; padding: 0;">
            <?php 
            $recent_posts = wp_get_recent_posts(array(
                'numberposts' => 5,
                'post_status' => 'publish',
                'post__not_in' => array( get_the_ID() )
            ));
            foreach( $recent_posts as $post ) : ?>
                <li style="margin-bottom: 10px;">
                    <div class="widget-post-item" style="display: flex; align-items: center;">
                        <div class="widget-post-thumbnail" style="flex-shrink: 0;">
                            <?php echo get_the_post_thumbnail($post['ID'], 'thumbnail', array( 'style' => 'margin-right: 10px; width: 80px; height: auto;' )); ?>
                        </div>
                        <div class="widget-post-title">
                            <a href="<?php echo get_permalink($post['ID']); ?>">
                                <?php echo get_the_title($post['ID']); ?>
                            </a>
                        </div>
                    </div>
                </li>
            <?php endforeach; wp_reset_postdata(); ?>
        </ul>
    </aside>
</div>

<?php get_footer(); ?>
