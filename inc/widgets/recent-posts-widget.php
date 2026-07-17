<?php

/**
 * Carvia Recent Posts Widget
 *
 * @package Carvia
 */

if (! defined('ABSPATH')) {
    exit;
}

if (! class_exists('Carvia_Recent_Posts_Widget')) :

    class Carvia_Recent_Posts_Widget extends WP_Widget
    {

        /**
         * Constructor.
         */
        public function __construct()
        {
            parent::__construct(
                'carvia_recent_posts',
                esc_html__('Carvia: Recent Posts', 'carvia'),
                [
                    'description' => esc_html__('Display recent posts with thumbnail, title, and date.', 'carvia'),
                    'classname'   => 'carvia-recent-posts-widget',
                ]
            );
        }

        /**
         * Frontend display.
         *
         * @param array $args     Widget area arguments.
         * @param array $instance Saved widget settings.
         */
        public function widget($args, $instance)
        {
            $title          = ! empty($instance['title']) ? $instance['title'] : esc_html__('Recent Posts', 'carvia');
            $number         = ! empty($instance['number']) ? absint($instance['number']) : 5;
            $show_thumbnail = isset($instance['show_thumbnail']) ? (bool) $instance['show_thumbnail'] : true;
            $show_title     = isset($instance['show_title']) ? (bool) $instance['show_title'] : true;
            $show_date      = isset($instance['show_date']) ? (bool) $instance['show_date'] : true;

            $number = max(1, min($number, 20));

            $recent_posts = new WP_Query([
                'post_type'           => 'post',
                'posts_per_page'      => $number,
                'post_status'         => 'publish',
                'ignore_sticky_posts' => true,
                'no_found_rows'       => true,
            ]);

            echo wp_kses_post($args['before_widget']);

            echo wp_kses_post($args['before_title']) . esc_html($title) . wp_kses_post($args['after_title']);

            if ($recent_posts->have_posts()) {
                echo '<ul class="carvia-recent-posts-list">';
                while ($recent_posts->have_posts()) {
                    $recent_posts->the_post();
                    $post_id  = get_the_ID();
                    $post_url = esc_url(get_permalink());
?>
                    <li class="carvia-recent-post-item">

                        <?php if ($show_thumbnail && has_post_thumbnail()) : ?>
                            <a href="<?php echo esc_url($post_url); ?>"
                                class="carvia-rp-thumb"
                                aria-hidden="true"
                                tabindex="-1">
                                <?php the_post_thumbnail('carvia-thumb-small', [
                                    'alt'     => esc_attr(get_the_title()),
                                    'loading' => 'lazy',
                                ]); ?>
                            </a>
                        <?php endif; ?>

                        <div class="carvia-rp-content">

                            <?php if ($show_title) : ?>
                                <h4 class="carvia-rp-title">
                                    <a href="<?php echo esc_url($post_url); ?>">
                                        <?php echo esc_html(get_the_title()); ?>
                                    </a>
                                </h4>
                            <?php endif; ?>

                            <?php if ($show_date) : ?>
                                <time class="carvia-rp-date"
                                    datetime="<?php echo esc_attr(get_the_date('c')); ?>">
                                    <?php echo esc_html(get_the_date()); ?>
                                </time>
                            <?php endif; ?>

                        </div>
                    </li>
            <?php
                }
                echo '</ul>';
                wp_reset_postdata();
            } else {
                echo '<p>' . esc_html__('No recent posts found.', 'carvia') . '</p>';
            }

            echo wp_kses_post($args['after_widget']);
        }

        /**
         * Backend admin form.
         *
         * @param array $instance Saved widget settings.
         */
        public function form($instance)
        {
            $title          = ! empty($instance['title'])    ? $instance['title']    : esc_html__('Recent Posts', 'carvia');
            $number         = ! empty($instance['number'])   ? absint($instance['number']) : 5;
            $show_thumbnail = isset($instance['show_thumbnail']) ? (bool) $instance['show_thumbnail'] : true;
            $show_title     = isset($instance['show_title'])     ? (bool) $instance['show_title']     : true;
            $show_date      = isset($instance['show_date'])      ? (bool) $instance['show_date']      : true;
            ?>
            <p>
                <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                    <?php esc_html_e('Title:', 'carvia'); ?>
                </label>
                <input class="widefat"
                    id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('title')); ?>"
                    type="text"
                    value="<?php echo esc_attr($title); ?>">
            </p>

            <p>
                <label for="<?php echo esc_attr($this->get_field_id('number')); ?>">
                    <?php esc_html_e('Number of Posts:', 'carvia'); ?>
                </label>
                <input class="tiny-text"
                    id="<?php echo esc_attr($this->get_field_id('number')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('number')); ?>"
                    type="number"
                    min="1"
                    max="20"
                    value="<?php echo esc_attr($number); ?>"
                    size="3">
            </p>

            <p>
                <input id="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('show_thumbnail')); ?>"
                    type="checkbox"
                    value="1"
                    <?php checked($show_thumbnail); ?>>
                <label for="<?php echo esc_attr($this->get_field_id('show_thumbnail')); ?>">
                    <?php esc_html_e('Show Thumbnail', 'carvia'); ?>
                </label>
            </p>

            <p>
                <input id="<?php echo esc_attr($this->get_field_id('show_title')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('show_title')); ?>"
                    type="checkbox"
                    value="1"
                    <?php checked($show_title); ?>>
                <label for="<?php echo esc_attr($this->get_field_id('show_title')); ?>">
                    <?php esc_html_e('Show Title', 'carvia'); ?>
                </label>
            </p>

            <p>
                <input id="<?php echo esc_attr($this->get_field_id('show_date')); ?>"
                    name="<?php echo esc_attr($this->get_field_name('show_date')); ?>"
                    type="checkbox"
                    value="1"
                    <?php checked($show_date); ?>>
                <label for="<?php echo esc_attr($this->get_field_id('show_date')); ?>">
                    <?php esc_html_e('Show Date', 'carvia'); ?>
                </label>
            </p>
<?php
        }

        /**
         * Sanitize widget settings on save.
         *
         * @param  array $new_instance New values.
         * @param  array $old_instance Old values.
         * @return array
         */
        public function update($new_instance, $old_instance)
        {
            $instance                    = [];
            $instance['title']           = sanitize_text_field($new_instance['title']);
            $instance['number']          = absint($new_instance['number']);
            $instance['show_thumbnail']  = isset($new_instance['show_thumbnail']) ? 1 : 0;
            $instance['show_title']      = isset($new_instance['show_title'])     ? 1 : 0;
            $instance['show_date']       = isset($new_instance['show_date'])      ? 1 : 0;
            return $instance;
        }
    }

endif; // class_exists

/**
 * Register widget and widget areas.
 */
function carvia_register_sidebars()
{

    register_widget('Carvia_Recent_Posts_Widget');

    // Blog Sidebar
    register_sidebar([
        'name'          => esc_html__('Blog Sidebar', 'carvia'),
        'id'            => 'blog-sidebar',
        'description'   => esc_html__('Widgets in this area will be shown in the blog/archive sidebar.', 'carvia'),
        'before_widget' => '<div id="%1$s" class="widget %2$s">',
        'after_widget'  => '</div>',
        'before_title'  => '<h3 class="widget-title">',
        'after_title'   => '</h3>',
    ]);
}

add_action('widgets_init', 'carvia_register_sidebars');
