<?php get_header(); ?>

<div class="wp-block-group has-global-padding">
    <article class="c-post">
        <div class="c-post__header">
            <h1 class="c-post__title"><?php the_title(); ?></h1>
        </div>
        <div class="c-post__content">
            <?php the_content(); ?>
        </div>
    </article>
</div>

<?php get_footer(); ?>
