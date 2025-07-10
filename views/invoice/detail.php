<?php
// filepath: /computer-asset-management/computer-asset-management/views/invoice/detail.php

// Assuming $invoice is an associative array containing invoice details
// and $assets is an array of associated assets for the invoice

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Detail</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Invoice Detail</h1>
        <div class="card">
            <div class="card-header">
                Invoice #<?php echo htmlspecialchars($invoice['id']); ?>
            </div>
            <div class="card-body">
                <h5 class="card-title">Invoice Information</h5>
                <p><strong>Date:</strong> <?php echo htmlspecialchars($invoice['date']); ?></p>
                <p><strong>Customer:</strong> <?php echo htmlspecialchars($invoice['customer_name']); ?></p>
                <p><strong>Total Amount:</strong> $<?php echo htmlspecialchars(number_format($invoice['total_amount'], 2)); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($invoice['status']); ?></p>

                <h5 class="mt-4">Associated Assets</h5>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Asset ID</th>
                            <th>Description</th>
                            <th>Value</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($assets as $asset): ?>
                            <tr>
                                <td><?php echo htmlspecialchars($asset['id']); ?></td>
                                <td><?php echo htmlspecialchars($asset['description']); ?></td>
                                <td>$<?php echo htmlspecialchars(number_format($asset['value'], 2)); ?></td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>

                <a href="/invoice/list" class="btn btn-primary">Back to Invoices</a>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>