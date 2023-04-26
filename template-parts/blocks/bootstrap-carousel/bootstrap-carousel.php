<?php

/**
 * Carousel Block Using Bootstrap v5.2.x
 *
 * @param   array $block The block settings and attributes.
 * @param   string $content The block inner HTML (empty).
 * @param   bool $is_preview True during AJAX preview.
 * @param   (int|string) $post_id The post ID this block is saved to.
 */

// Create id attribute allowing for custom "anchor" value.
$id = 'bootstrap-carousel-id-' . $block['id'];
if( !empty($block['anchor']) ) {
    $id = $block['anchor'];
}

// Create class attribute allowing for custom "className" and "align" values.
$className = 'bootstrap-carousel';
if( !empty($block['className']) ) {
    $className .= ' ' . $block['className'];
}
if( !empty($block['align']) ) {
    $className .= ' align' . $block['align'];
}

?>
<div id="<?php echo esc_attr($id); ?>" class="<?php echo esc_attr($className); ?>">
    <div id="bootstrapCarouselACF" class="carousel slide" data-bs-ride="false">
        <div class="carousel-inner">

            <?php if( have_rows( 'bootstrap_carousel_repeater' ) ): ?>
                <?php while( have_rows( 'bootstrap_carousel_repeater' ) ): the_row(); 
                    // Load the sub_fields created in ACF
                    $image = get_sub_field('carousel_image');
                    $heading = get_sub_field('carousel_caption_heading');
                    $paragraph = get_sub_field('carousel_caption_paragraph');
                    if (get_row_index() == 1) {
                        $active = ' active';
                    } else {
                        $active = '';
                    }
                    ?>
                    <div class="carousel-item carousel-item-<?php echo get_row_index(); ?> <?php echo $active; ?>">
                        <?php 
                        // Check if there's an image selected 
                        if( !empty( $image ) ): ?>
                            <figure class="adaptive">
                                <picture class="adaptive-photo">
                                    <img src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" />
                                </picture>
                            </figure>
                        <?php endif; ?>
                        <div class="carousel-caption">
                            <?php if( $heading || $paragraph) : ?>
                            <div class="carousel-caption__inner">
                                <?php 
                                // Check if the headline field is empty
                                if( !empty( $heading ) ): ?>
                                    <h5>
                                        <?php echo $heading; ?>
                                    </h5>
                                <?php endif; ?>
                                <?php 
                                // Check if the paragraph field is empty
                                if( !empty( $paragraph ) ): ?>
                                    <p>
                                        <?php echo $paragraph; ?>
                                    </p>
                                <?php endif; ?>
                            </div>
                            <?php endif; ?>
                        </div>
                    </div>
                <?php endwhile; ?>
            <?php endif; ?>
        </div>
        <button class="carousel-control-prev" type="button" data-bs-target="#bootstrapCarouselACF" data-bs-slide="prev">
            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Previous</span>
        </button>
        <button class="carousel-control-next" type="button" data-bs-target="#bootstrapCarouselACF" data-bs-slide="next">
            <span class="carousel-control-next-icon" aria-hidden="true"></span>
            <span class="visually-hidden">Next</span>
        </button>
    </div>
</div>