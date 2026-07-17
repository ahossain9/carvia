<?php

/**
 * Default Footer Template Part
 *
 * @package Pestro
 */

if (! defined('ABSPATH')) {
    exit;
}

$copyright     = pestro_option('footer_copyright', '&copy; ' . wp_date('Y') . ' Pestro');
?>

<div class="pestro-footer-copyright">
    <div class="container">
        <p>
            <?php echo wp_kses_post($copyright); ?>
        </p>
    </div>
</div>