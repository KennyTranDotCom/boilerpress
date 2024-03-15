<?php
    $block_wrapper_attributes = get_block_wrapper_attributes();

    if($attributes['imageId']) {
        $imageId = $attributes['imageId'];
    }
?>

<div <?php echo $block_wrapper_attributes; ?>>
    <div class="wp-block-boilerpress-hero__layout">
        <div class="wp-block-boilerpress-hero__content o-flow">
            <?php echo $content; ?>
        </div>
        <?php if(!empty($imageId)) : ?>
            <div class="wp-block-boilerpress-hero__image">
                <?php echo wp_get_attachment_image( $imageId, "full" ); ?>
            </div>
        <?php endif; ?>
    </div>
</div>
