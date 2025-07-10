<?php
// filepath: /computer-asset-management/computer-asset-management/views/asset/create.php

require_once __DIR__ . '/../../config/constants.php';
require_once __DIR__ . '/../../config/functions.php';

// Fetch departments for the dropdown
$departments = getDepartments(); // Assume this function fetches department data

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Asset</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Create New Computer Asset</h2>
        <form action="/asset/store" method="POST">
            <div class="form-group">
                <label for="assetName">Asset Name</label>
                <input type="text" class="form-control" id="assetName" name="assetName" required>
            </div>
            <div class="form-group">
                <label for="serialNumber">Serial Number</label>
                <input type="text" class="form-control" id="serialNumber" name="serialNumber" required>
            </div>
            <div class="form-group">
                <label for="department">Department</label>
                <select class="form-control" id="department" name="department" required>
                    <option value="">Select Department</option>
                    <?php foreach ($departments as $department): ?>
                        <option value="<?= htmlspecialchars($department['id']) ?>"><?= htmlspecialchars($department['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="form-group">
                <label for="warrantyPeriod">Warranty Period (months)</label>
                <input type="number" class="form-control" id="warrantyPeriod" name="warrantyPeriod" min="0" required>
            </div>
            <div class="form-group">
                <label for="status">Status</label>
                <select class="form-control" id="status" name="status" required>
                    <option value="active">Active</option>
                    <option value="inactive">Inactive</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Create Asset</button>
            <a href="/asset/list" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>