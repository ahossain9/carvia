<?php

/**
 * Comment Form
 *
 * @package Carvia
 */

// ─── Custom field markup ──────────────────────────────────────
add_filter('comment_form_default_fields', 'carvia_comment_form');

function carvia_comment_form($carvia_fields)
{
    $carvia_fields['author'] = '
        <div class="row comment-form-wrap">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name-cmt">' . esc_html__('Name', 'carvia') . ' <span>*</span></label>
                <input type="text" name="author" id="name-cmt">
            </div>
        </div>
    ';

    $carvia_fields['email'] =  '
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email-cmt">' . esc_html__('Email', 'carvia') . ' <span>*</span></label>
                <input type="email" name="email" id="email-cmt">
            </div>
        </div>
    ';

    $carvia_fields['url'] = '
        <div class="col-lg-12">
            <div class="form-group">
                <label for="website">' . esc_html__('Website', 'carvia') . '</label>
                <input type="text" name="url" id="website">
            </div>
        </div>
        </div>
        
    ';

    return $carvia_fields;
}

// ─── Comment textarea + submit button ─────────────────────────
add_filter('comment_form_defaults', 'carvia_comment_default_form');

function carvia_comment_default_form($default_form)
{

    $default_form['comment_field'] = '
        <div class="row">
            <div class="col-sm-12">
                <div class="comment-message">
                    <label>' . esc_html__('Your Comment', 'carvia') . '<span>*</span></label>
                    <textarea name="comment" rows="4" required="required"></textarea>
                </div>
            </div>
        </div>
    ';

    $default_form['submit_button'] = '
        <button type="submit" class="comment-btn">' . esc_html__('Post Comment', 'carvia') . '</button>
    ';

    $default_form['comment_notes_before'] = esc_html__('All fields marked with an asterisk (*) are required', 'carvia');
    $default_form['title_reply'] = esc_html__('Leave A Comment', 'carvia');
    $default_form['title_reply_before'] = '<h4 class="comments-heading">';
    $default_form['title_reply_after'] = '</h4>';

    return $default_form;
}


// ─── Move comment textarea after the other fields ─────────────
add_filter('comment_form_fields', 'carvia_move_comment_field_to_bottom');

function carvia_move_comment_field_to_bottom($fields)
{
    if (isset($fields['comment'])) {
        $comment = $fields['comment'];
        unset($fields['comment']);
        $fields['comment'] = $comment;
    }

    // Move cookies checkbox to after the comment textarea
    if (isset($fields['cookies'])) {
        $cookies = $fields['cookies'];
        unset($fields['cookies']);
        $fields['cookies'] = $cookies;
    }

    return $fields;
}
