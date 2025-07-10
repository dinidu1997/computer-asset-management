<?php
// filepath: /computer-asset-management/computer-asset-management/views/invoice/list.php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Invoice.php';

$invoices = Invoice::getAllInvoices(); // Assuming a method to fetch all invoices

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice List</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Invoice List</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Invoice ID</th>
                    <th>Asset ID</th>
                    <th>Amount</th>
                    <th>Date Issued</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (!empty($invoices)): ?>
                    <?php foreach ($invoices as $invoice): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($invoice['id']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['asset_id']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['amount']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['date_issued']); ?></td>
                            <td><?php echo htmlspecialchars($invoice['status']); ?></td>
                            <td>
                                <a href="detail.php?id=<?php echo htmlspecialchars($invoice['id']); ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit.php?id=<?php echo htmlspecialchars($invoice['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center">No invoices found.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Create New Invoice</a>
    </div>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>