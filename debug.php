<?php
// Aktifkan laporan error
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Tes apakah PHP jalan
echo "<h2>Debug Mode Aktif</h2>";
echo "<pre>";
echo "PHP Version: " . phpversion() . "\n";
echo "Loaded php.ini: " . php_ini_loaded_file() . "\n";
echo "Error Log File: " . ini_get('error_log') . "\n";
echo "</pre>";

// Coba include index OJS untuk lihat error
echo "<h3>Test Load OJS</h3>";
require 'index.php';
