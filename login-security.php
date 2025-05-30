<?php
/**
 * Change WP-Admin login error message to be more generic
 *
 * @param $msg
 * @return string
 */
function generic_login_msg($msg) {
    global $errors;
    $err_codes = $errors->get_error_codes();
    if (in_array('invalid_username', $err_codes) || in_array('incorrect_password', $err_codes)) {
        $msg = 'ERROR: Invalid credential.';
    }
    return $msg;
}

add_filter('login_errors', 'generic_login_msg');

/**
 * Return 403 instead of 200 when wp-login failed
 */
function login_failed() {
    status_header(403);
}

add_action('wp_login_failed', 'login_failed');