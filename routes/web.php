<?php
// filepath: /computer-asset-management/computer-asset-management/routes/web.php

use App\Controllers\DashboardController;
use App\Controllers\AssetController;
use App\Controllers\InvoiceController;
use App\Controllers\WarrantyController;
use App\Controllers\ReportController;
use App\Controllers\SearchController;

$router = new Router();

// Dashboard Routes
$router->get('/', [DashboardController::class, 'index']);
$router->get('/dashboard', [DashboardController::class, 'index']);

// Asset Routes
$router->get('/assets', [AssetController::class, 'list']);
$router->get('/assets/create', [AssetController::class, 'create']);
$router->post('/assets', [AssetController::class, 'store']);
$router->get('/assets/edit/{id}', [AssetController::class, 'edit']);
$router->post('/assets/update/{id}', [AssetController::class, 'update']);
$router->get('/assets/{id}', [AssetController::class, 'detail']);
$router->post('/assets/delete/{id}', [AssetController::class, 'delete']);

// Invoice Routes
$router->get('/invoices', [InvoiceController::class, 'list']);
$router->get('/invoices/{id}', [InvoiceController::class, 'detail']);

// Warranty Routes
$router->get('/warranties', [WarrantyController::class, 'list']);
$router->get('/warranties/{id}', [WarrantyController::class, 'detail']);

// Report Routes
$router->get('/reports/department', [ReportController::class, 'department']);
$router->get('/reports/summary', [ReportController::class, 'summary']);

// Search Routes
$router->get('/search', [SearchController::class, 'index']);

// Handle 404 Not Found
$router->setNotFoundHandler(function() {
    http_response_code(404);
    require __DIR__ . '/../views/errors/404.php';
});
?>