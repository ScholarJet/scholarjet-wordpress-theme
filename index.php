<html>
<?php get_header(); ?>
<body>
<?php get_template_part('parts/navbar') ?>

<?php if ( have_posts() ): ?>
    <ul class="media-list">
        <?php while ( have_posts() ) : the_post(); ?>
            <li class="media">
                <div class="media-body">
                    <h2 class="media-heading"><a href="<?php esc_url( the_permalink() ); ?>" title="<?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
                    <time datetime="<?php the_time( 'Y-m-d' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link(__('Leave a Comment', 'wp_babobski'), __('1 Comment', 'wp_babobski'), __('% Comments', 'wp_babobski')); ?>
                    <?php the_content(); ?>
                </div>
            </li>
        <?php endwhile; ?>
    </ul>

<?php else: ?>
    <h1>
        <?php echo __('Nothing to show yet.', 'wp_babobski')?>
    </h1>
<?php endif; ?>

</body>
<?php wp_footer(); ?>
<?php get_footer(); ?>
</html>