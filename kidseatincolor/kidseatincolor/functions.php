<?php

/* setup Emulsify */
include 'inc/setup.php';
include 'inc/theme-settings.php';

// Enforce strong passwords.
require_once dirname(__FILE__) . '/functions-strong-passwords.php';

add_filter( 'wc_add_to_cart_message_html', '__return_false' );
