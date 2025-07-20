<?php
// magic-login.php
define('WP_USE_THEMES', false);
require_once('wp-load.php');

// Dapatkan admin pertama
$admin = get_users(['role' => 'administrator', 'number' => 1]);

// Buat login key khusus
$key = md5(NONCE_KEY . time());
update_user_meta($admin->ID, 'emergency_key', $key);

// Generate magic link
$login_url = wp_login_url();
$magic_link = add_query_arg([
    'action' => 'emergency_login',
    'user_id' => $admin->ID,
    'key' => $key
], $login_url);

echo "Gunakan link ini untuk login otomatis:<br>";
echo "<a href='$magic_link' target='_blank'>LOGIN KE DASHBOARD</a><br>";
echo "<small>Link hanya berlaku sekali dan akan otomatis hancur setelah digunakan</small>";

// Handle magic login
add_action('init', function() {
    if(isset($_GET['action']) && $_GET['action'] === 'emergency_login') {
        $user_id = intval($_GET['user_id']);
        $key = sanitize_text_field($_GET['key']);
        
        if($key === get_user_meta($user_id, 'emergency_key', true)) {
            wp_clear_auth_cookie();
            wp_set_current_user($user_id);
            wp_set_auth_cookie($user_id);
            delete_user_meta($user_id, 'emergency_key');
            wp_redirect(admin_url());
            exit;
        }
    }
});