<?php

/**
 * Default Footer Template Part
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

$copyright     = carvia_option('footer_copyright', '&copy; ' . wp_date('Y') . ' Carvia');
?>

<div class="carvia-footer-copyright">
    <div class="container">
        <p>
            <?php echo wp_kses_post($copyright); ?>
        </p>
    </div>
</div>