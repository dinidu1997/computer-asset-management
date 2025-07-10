<?php
declare(strict_types=1);

/**
 * Front Controller - Computer Asset Management System
 * 
 * Handles all incoming requests and routes them to appropriate controllers
 */

// Start session with secure settings
session_start([
    'cookie_httponly' => true,
    'cookie_secure' => true,
    'cookie_samesite' => 'Strict',
    'use_strict_mode' => true
]);

// Load configuration
require __DIR__ . '/config/constants.php';
require __DIR__ . '/config/functions.php';
require __DIR__ . '/config/database.php';

// Set error reporting based on environment
define('ENVIRONMENT', 'development');

if (defined('ENVIRONMENT') && ENVIRONMENT === 'development') {
    error_reporting(E_ALL);
    ini_set('display_errors', '1');
} else {
    error_reporting(0);
    ini_set('display_errors', '0');
}

// Route processing
try {
    // Get requested path (with fallback to dashboard)
    $requestPath = $_GET['url'] ?? 'dashboard';
    $requestPath = trim($requestPath, '/');
    $pathParts = explode('/', $requestPath);

    // Extract controller and action
    $controllerName = ucfirst($pathParts[0] ?? 'dashboard') . 'Controller';
    $actionName = $pathParts[1] ?? 'index';
    $id = $pathParts[2] ?? null;

    // Security validation
    if (!preg_match('/^[a-zA-Z0-9_-]+$/', $controllerName) || 
        !preg_match('/^[a-zA-Z0-9_-]+$/', $actionName)) {
        throw new Exception('Invalid request path');
    }

    // Controller file path
    $controllerFile = __DIR__ . '/../Controllers/' . $controllerName . '.php';

    // Check if controller exists
    if (!file_exists($controllerFile)) {
        throw new Exception('Controller not found', 404);
    }

    // Load controller
    require $controllerFile;

    if (!class_exists($controllerName)) {
        throw new Exception('Controller class not found', 500);
    }

    // Initialize controller
    $controller = new $controllerName();

    // Check if action exists
    if (!method_exists($controller, $actionName)) {
        throw new Exception('Action not found', 404);
    }

    // Execute the action
    if ($id !== null) {
        $controller->$actionName($id);
    } else {
        $controller->$actionName();
    }

} catch (Exception $e) {
    // Error handling
    $errorCode = $e->getCode() ?: 500;
    http_response_code($errorCode);

    // Log the error
    error_log('[' . date('Y-m-d H:i:s') . '] ' . $e->getMessage() . 
              ' in ' . $e->getFile() . ':' . $e->getLine());

    // Show error page
    $errorPage = match($errorCode) {
        404 => '../views/errors/404.php',
        403 => '../views/errors/403.php',
        default => '../views/errors/500.php'
    };

    if (file_exists(__DIR__ . '/../' . $errorPage)) {
        require __DIR__ . '/../' . $errorPage;
    } else {
        die('An error occurred. Error code: ' . $errorCode);
    }
}

// Close database connection if exists
if (isset($conn) && $conn instanceof mysqli) {
    $conn->close();
}

echo "Hello, PHP works!";
?>