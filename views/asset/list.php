<?php
// filepath: /computer-asset-management/computer-asset-management/views/asset/list.php

require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Asset.php';

$assetModel = new Asset($conn);
$assets = $assetModel->getAllAssets();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset List</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1 class="mb-4">Computer Assets</h1>
        <a href="create.php" class="btn btn-primary mb-3">Add New Asset</a>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Location</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($assets as $asset): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($asset['id']); ?></td>
                        <td><?php echo htmlspecialchars($asset['name']); ?></td>
                        <td><?php echo htmlspecialchars($asset['type']); ?></td>
                        <td><?php echo htmlspecialchars($asset['status']); ?></td>
                        <td><?php echo htmlspecialchars($asset['location']); ?></td>
                        <td>
                            <a href="detail.php?id=<?php echo $asset['id']; ?>" class="btn btn-info btn-sm">View</a>
                            <a href="edit.php?id=<?php echo $asset['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                            <a href="delete.php?id=<?php echo $asset['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this asset?');">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>