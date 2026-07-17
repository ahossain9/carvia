<?php

/**
 * Comments Template
 *
 * @package Carvia
 */

if (post_password_required()) {
	return;
}
?>

<div id="comments" class="carvia-comments">

	<?php if (have_comments()) : ?>

		<h3 class="comments-title">
			<?php
			$comments_count = get_comments_number();
			if ('1' === $comments_count) {
				printf(
					/* translators: 1: post title */
					esc_html__('One comment on &ldquo;%1$s&rdquo;', 'carvia'),
					'<span>' . get_the_title() . '</span>'
				);
			} else {
				printf(
					/* translators: 1: comment count, 2: post title */
					esc_html(_nx('%1$s comment on &ldquo;%2$s&rdquo;', '%1$s comments on &ldquo;%2$s&rdquo;', $comments_count, 'comments title', 'carvia')),
					number_format_i18n($comments_count),
					'<span>' . get_the_title() . '</span>'
				);
			}
			?>
		</h3>

		<ol class="comment-list">
			<?php
			wp_list_comments([
				'style'      => 'ol',
				'short_ping' => true,
			]);
			?>
		</ol>

		<?php the_comments_navigation(); ?>

	<?php endif; ?>

	<?php if (! comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments')) : ?>
		<p class="no-comments"><?php esc_html_e('Comments are closed.', 'carvia'); ?></p>
	<?php endif; ?>

	<?php
	comment_form([
		'title_reply_before' => '<h3 id="reply-title" class="comment-reply-title">',
		'title_reply_after'  => '</h3>',
	]);
	?>

</div>