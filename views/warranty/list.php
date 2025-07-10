<?php
// filepath: /computer-asset-management/computer-asset-management/views/warranty/list.php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Warranty.php';

$warrantyModel = new Warranty($conn);
$warranties = $warrantyModel->getAllWarranties();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty List</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Warranty List</h1>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Asset ID</th>
                    <th>Warranty Period</th>
                    <th>Start Date</th>
                    <th>End Date</th>
                    <th>Status</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if (empty($warranties)): ?>
                    <tr>
                        <td colspan="7" class="text-center">No warranties found.</td>
                    </tr>
                <?php else: ?>
                    <?php foreach ($warranties as $warranty): ?>
                        <tr>
                            <td><?php echo htmlspecialchars($warranty['id']); ?></td>
                            <td><?php echo htmlspecialchars($warranty['asset_id']); ?></td>
                            <td><?php echo htmlspecialchars($warranty['warranty_period']); ?></td>
                            <td><?php echo htmlspecialchars($warranty['start_date']); ?></td>
                            <td><?php echo htmlspecialchars($warranty['end_date']); ?></td>
                            <td><?php echo htmlspecialchars($warranty['status']); ?></td>
                            <td>
                                <a href="detail.php?id=<?php echo htmlspecialchars($warranty['id']); ?>" class="btn btn-info btn-sm">View</a>
                                <a href="edit.php?id=<?php echo htmlspecialchars($warranty['id']); ?>" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php endif; ?>
            </tbody>
        </table>
        <a href="create.php" class="btn btn-success">Add New Warranty</a>
    </div>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>