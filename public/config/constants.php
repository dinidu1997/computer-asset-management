<?php
// Database connection settings
define('DB_HOST', 'localhost');
define('DB_USER', 'your_username');
define('DB_PASS', 'your_password');
define('DB_NAME', 'computer_asset_management');

// Application-specific constants
define('APP_NAME', 'Computer Asset Management System');
define('APP_VERSION', '1.0.0');
define('APP_URL', 'http://localhost/computer-asset-management');

// Other constants
define('ASSET_STATUS_ACTIVE', 'active');
define('ASSET_STATUS_INACTIVE', 'inactive');
define('ASSET_STATUS_DECOMMISSIONED', 'decommissioned');

// Invoice constants
define('INVOICE_STATUS_PAID', 'paid');
define('INVOICE_STATUS_PENDING', 'pending');
define('INVOICE_STATUS_OVERDUE', 'overdue');

// Warranty constants
define('WARRANTY_STATUS_ACTIVE', 'active');
define('WARRANTY_STATUS_EXPIRED', 'expired');
?>