<?php
// filepath: /computer-asset-management/computer-asset-management/views/dashboard/index.php

// Include necessary files
require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../controllers/DashboardController.php';

// Initialize the DashboardController
$dashboardController = new DashboardController();
$metrics = $dashboardController->getDashboardMetrics();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard - Computer Asset Management</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4">Dashboard</h1>
        <div class="row">
            <div class="col-md-4">
                <div class="card text-white bg-primary mb-4">
                    <div class="card-header">Total Assets</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $metrics['totalAssets']; ?></h5>
                        <p class="card-text">Total number of computer assets managed.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-success mb-4">
                    <div class="card-header">Assets in Use</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $metrics['assetsInUse']; ?></h5>
                        <p class="card-text">Number of assets currently in use.</p>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-danger mb-4">
                    <div class="card-header">Assets Needing Attention</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $metrics['assetsNeedingAttention']; ?></h5>
                        <p class="card-text">Assets that require maintenance or updates.</p>
                    </div>
                </div>
            </div>
        </div>

        <h2 class="mt-4">Recent Activity</h2>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Date</th>
                    <th>Action</th>
                    <th>Asset ID</th>
                    <th>User</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($dashboardController->getRecentActivity() as $activity): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($activity['date']); ?></td>
                        <td><?php echo htmlspecialchars($activity['action']); ?></td>
                        <td><?php echo htmlspecialchars($activity['asset_id']); ?></td>
                        <td><?php echo htmlspecialchars($activity['user']); ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="/assets/js/main.js"></script>
</body>
</html>