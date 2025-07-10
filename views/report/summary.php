<?php
// filepath: /computer-asset-management/computer-asset-management/views/report/summary.php

// Include necessary files
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Asset.php';
require_once __DIR__ . '/../../models/Invoice.php';
require_once __DIR__ . '/../../models/Warranty.php';

// Fetch summary data
$assetModel = new Asset($conn);
$invoiceModel = new Invoice($conn);
$warrantyModel = new Warranty($conn);

$totalAssets = $assetModel->getTotalAssets();
$totalInvoices = $invoiceModel->getTotalInvoices();
$totalWarranties = $warrantyModel->getTotalWarranties();
$availableAssets = $assetModel->getAvailableAssets();
$inUseAssets = $assetModel->getInUseAssets();

// Render the summary report
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Summary Report</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Asset Summary Report</h1>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card text-white bg-success mb-3">
                    <div class="card-header">Total Assets</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalAssets; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-info mb-3">
                    <div class="card-header">Total Invoices</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalInvoices; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card text-white bg-warning mb-3">
                    <div class="card-header">Total Warranties</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $totalWarranties; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-4">
            <div class="col-md-6">
                <div class="card text-white bg-primary mb-3">
                    <div class="card-header">Available Assets</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $availableAssets; ?></h5>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card text-white bg-danger mb-3">
                    <div class="card-header">Assets In Use</div>
                    <div class="card-body">
                        <h5 class="card-title"><?php echo $inUseAssets; ?></h5>
                    </div>
                </div>
            </div>
        </div>
        <div class="text-center mt-4">
            <a href="/views/dashboard/index.php" class="btn btn-primary">Back to Dashboard</a>
        </div>
    </div>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>