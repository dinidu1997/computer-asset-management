<?php
// filepath: /computer-asset-management/computer-asset-management/views/asset/detail.php

// Assuming $asset is an associative array containing asset details
// Example: $asset = ['id' => 1, 'name' => 'Laptop', 'specs' => '16GB RAM, 512GB SSD', 'status' => 'In Use', 'location' => 'Office 1', 'warranty' => '2023-12-31'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Asset Detail - <?php echo htmlspecialchars($asset['name']); ?></title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Asset Detail</h1>
        <div class="card">
            <div class="card-header">
                <h2><?php echo htmlspecialchars($asset['name']); ?></h2>
            </div>
            <div class="card-body">
                <h5 class="card-title">Specifications</h5>
                <p class="card-text"><?php echo htmlspecialchars($asset['specs']); ?></p>

                <h5 class="card-title">Status</h5>
                <p class="card-text"><?php echo htmlspecialchars($asset['status']); ?></p>

                <h5 class="card-title">Location</h5>
                <p class="card-text"><?php echo htmlspecialchars($asset['location']); ?></p>

                <h5 class="card-title">Warranty Expiry</h5>
                <p class="card-text"><?php echo htmlspecialchars($asset['warranty']); ?></p>

                <a href="/asset/edit/<?php echo $asset['id']; ?>" class="btn btn-primary">Edit Asset</a>
                <a href="/asset/list" class="btn btn-secondary">Back to Asset List</a>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>