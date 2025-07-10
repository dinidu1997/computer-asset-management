<?php
// filepath: /computer-asset-management/computer-asset-management/views/search/index.php

require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Asset.php';
require_once __DIR__ . '/../../models/Invoice.php';
require_once __DIR__ . '/../../models/Warranty.php';

$searchResults = [];
$searchQuery = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['search'])) {
    $searchQuery = trim($_POST['search']);
    
    // Perform search in assets, invoices, and warranties
    $assetModel = new Asset();
    $invoiceModel = new Invoice();
    $warrantyModel = new Warranty();

    $searchResults['assets'] = $assetModel->search($searchQuery);
    $searchResults['invoices'] = $invoiceModel->search($searchQuery);
    $searchResults['warranties'] = $warrantyModel->search($searchQuery);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Search Computer Assets</title>
    <link rel="stylesheet" href="/public/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/public/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center">Search Computer Assets</h1>
        <form method="POST" class="mb-4">
            <div class="input-group">
                <input type="text" name="search" class="form-control" placeholder="Enter search term..." value="<?php echo htmlspecialchars($searchQuery); ?>" required>
                <button class="btn btn-primary" type="submit">Search</button>
            </div>
        </form>

        <?php if (!empty($searchResults)): ?>
            <h2>Results</h2>
            <div class="accordion" id="searchResultsAccordion">
                <?php if (!empty($searchResults['assets'])): ?>
                    <div class="card">
                        <div class="card-header" id="headingAssets">
                            <h2 class="mb-0">
                                <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseAssets" aria-expanded="true" aria-controls="collapseAssets">
                                    Assets (<?php echo count($searchResults['assets']); ?>)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseAssets" class="collapse show" aria-labelledby="headingAssets" data-parent="#searchResultsAccordion">
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php foreach ($searchResults['assets'] as $asset): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($asset['name']); ?> - <?php echo htmlspecialchars($asset['status']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($searchResults['invoices'])): ?>
                    <div class="card">
                        <div class="card-header" id="headingInvoices">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseInvoices" aria-expanded="false" aria-controls="collapseInvoices">
                                    Invoices (<?php echo count($searchResults['invoices']); ?>)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseInvoices" class="collapse" aria-labelledby="headingInvoices" data-parent="#searchResultsAccordion">
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php foreach ($searchResults['invoices'] as $invoice): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($invoice['invoice_number']); ?> - <?php echo htmlspecialchars($invoice['amount']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>

                <?php if (!empty($searchResults['warranties'])): ?>
                    <div class="card">
                        <div class="card-header" id="headingWarranties">
                            <h2 class="mb-0">
                                <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseWarranties" aria-expanded="false" aria-controls="collapseWarranties">
                                    Warranties (<?php echo count($searchResults['warranties']); ?>)
                                </button>
                            </h2>
                        </div>
                        <div id="collapseWarranties" class="collapse" aria-labelledby="headingWarranties" data-parent="#searchResultsAccordion">
                            <div class="card-body">
                                <ul class="list-group">
                                    <?php foreach ($searchResults['warranties'] as $warranty): ?>
                                        <li class="list-group-item"><?php echo htmlspecialchars($warranty['warranty_number']); ?> - <?php echo htmlspecialchars($warranty['expiry_date']); ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                <?php endif; ?>
            </div>
        <?php endif; ?>
    </div>

    <script src="/public/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>