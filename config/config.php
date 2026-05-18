<?php
// Detect if running on Railway
if (getenv('DB_HOST')) {
    // Running on Railway — use environment variables
    define('DB_HOST', getenv('DB_HOST'));
    define('DB_NAME', getenv('DB_NAME'));
    define('DB_USER', getenv('DB_USER'));
    define('DB_PASS', getenv('DB_PASS'));
    define('DB_PORT', getenv('DB_PORT') ?: '3306');
    define('FDC_API_KEY', getenv('FDC_API_KEY'));
    define('AI_API_KEY', getenv('AI_API_KEY'));
    define('AI_PROVIDER', getenv('AI_PROVIDER') ?: 'claude');
    define('AI_MODEL', getenv('AI_MODEL') ?: 'claude-sonnet-4-6');
} else {
    // Running locally — use local config
    define('DB_HOST', 'localhost');
    define('DB_NAME', 'smart_plate_db');
    define('DB_USER', 'root');

    if (file_exists('C:\Program Files\Ampps')) {
        $db_pass = 'mysql';
        $db_port = '3306';
    } elseif (file_exists('C:\xampp')) {
        $db_pass = '';
        $db_port = '3306';
    } elseif (file_exists('/Applications/AMPPS')) {
        $db_pass = 'mysql';
        $db_port = '3306';
    } elseif (file_exists('/Applications/MAMP')) {
        $db_pass = 'root';
        $db_port = '8889';
    } else {
        $db_pass = '';
        $db_port = '3306';
    }

    define('DB_PASS', $db_pass);
    define('DB_PORT', $db_port);

    // Load API keys from local file
    require_once __DIR__ . '/config/api-keys.php';
}
?>
