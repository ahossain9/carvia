<?php

/**
 * Template for displaying search forms
 *
 * @package pestro
 */

?>

<?php $unique_id = uniqid('pestro-search-form-'); ?>

<form role="search" method="get" class="search-form" action="<?php echo esc_url(home_url('/')); ?>">
    <label for="<?php echo esc_attr($unique_id); ?>">
        <span class="screen-reader-text"><?php echo _x('Search for:', 'label', 'pestro'); ?></span>
        <input type="search" id="<?php echo esc_attr($unique_id); ?>" class="search-field" placeholder="<?php echo esc_attr_x('Search &hellip;', 'placeholder', 'pestro'); ?>" value="<?php echo get_search_query(); ?>" name="s" />
    </label>
    <button type="submit" class="search-submit"><span class="screen-reader-text"><?php echo _x('Search', 'submit button', 'pestro'); ?></span><i class="fa-solid fa-search"></i></button>
</form>