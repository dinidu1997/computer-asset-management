<?php
// Utility functions for the Computer Asset Management System

/**
 * Sanitize input data to prevent XSS attacks.
 *
 * @param string $data The input data to sanitize.
 * @return string The sanitized data.
 */
function sanitizeInput(string $data): string {
    return htmlspecialchars(trim($data), ENT_QUOTES, 'UTF-8');
}

/**
 * Validate an email address.
 *
 * @param string $email The email address to validate.
 * @return bool True if valid, false otherwise.
 */
function validateEmail(string $email): bool {
    return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
}

/**
 * Format a date to a specified format.
 *
 * @param string $date The date to format.
 * @param string $format The format to apply.
 * @return string The formatted date.
 */
function formatDate(string $date, string $format = 'Y-m-d'): string {
    $dateTime = new DateTime($date);
    return $dateTime->format($format);
}

/**
 * Generate a unique identifier for assets.
 *
 * @return string The generated unique identifier.
 */
function generateUniqueId(): string {
    return uniqid('asset_', true);
}

/**
 * Log errors to a specified log file.
 *
 * @param string $message The error message to log.
 * @param string $logFile The log file path.
 */
function logError(string $message, string $logFile = __DIR__ . '/../logs/error.log'): void {
    $timestamp = date('Y-m-d H:i:s');
    file_put_contents($logFile, "[$timestamp] $message" . PHP_EOL, FILE_APPEND);
}
?>