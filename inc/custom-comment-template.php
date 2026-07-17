<?php

/**
 * Comment Form
 *
 * @package Pestro
 */

// ─── Custom field markup ──────────────────────────────────────
add_filter('comment_form_default_fields', 'pestro_comment_form');

function pestro_comment_form($pestro_fields)
{
    $pestro_fields['author'] = '
        <div class="row comment-form-wrap">
        <div class="col-lg-6">
            <div class="form-group">
                <label for="name-cmt">' . esc_html__('Name', 'pestro') . ' <span>*</span></label>
                <input type="text" name="author" id="name-cmt">
            </div>
        </div>
    ';

    $pestro_fields['email'] =  '
        <div class="col-lg-6">
            <div class="form-group">
                <label for="email-cmt">' . esc_html__('Email', 'pestro') . ' <span>*</span></label>
                <input type="email" name="email" id="email-cmt">
            </div>
        </div>
    ';

    $pestro_fields['url'] = '
        <div class="col-lg-12">
            <div class="form-group">
                <label for="website">' . esc_html__('Website', 'pestro') . '</label>
                <input type="text" name="url" id="website">
            </div>
        </div>
        </div>
        
    ';

    return $pestro_fields;
}

// ─── Comment textarea + submit button ─────────────────────────
add_filter('comment_form_defaults', 'pestro_comment_default_form');

function pestro_comment_default_form($default_form)
{

    $default_form['comment_field'] = '
        <div class="row">
            <div class="col-sm-12">
                <div class="comment-message">
                    <label>' . esc_html__('Your Comment', 'pestro') . '<span>*</span></label>
                    <textarea name="comment" rows="4" required="required"></textarea>
                </div>
            </div>
        </div>
    ';

    $default_form['submit_button'] = '
        <button type="submit" class="comment-btn">' . esc_html__('Post Comment', 'pestro') . '</button>
    ';

    $default_form['comment_notes_before'] = esc_html__('All fields marked with an asterisk (*) are required', 'pestro');
    $default_form['title_reply'] = esc_html__('Leave A Comment', 'pestro');
    $default_form['title_reply_before'] = '<h4 class="comments-heading">';
    $default_form['title_reply_after'] = '</h4>';

    return $default_form;
}


// ─── Move comment textarea after the other fields ─────────────
add_filter('comment_form_fields', 'pestro_move_comment_field_to_bottom');

function pestro_move_comment_field_to_bottom($fields)
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