<?php
// filepath: /computer-asset-management/computer-asset-management/views/warranty/detail.php

// Assuming $warranty is an object containing warranty details passed from the controller
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Warranty Detail</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h1>Warranty Details</h1>
        <div class="card">
            <div class="card-header">
                <h5>Warranty ID: <?php echo htmlspecialchars($warranty->id); ?></h5>
            </div>
            <div class="card-body">
                <p><strong>Asset ID:</strong> <?php echo htmlspecialchars($warranty->asset_id); ?></p>
                <p><strong>Warranty Period:</strong> <?php echo htmlspecialchars($warranty->start_date); ?> to <?php echo htmlspecialchars($warranty->end_date); ?></p>
                <p><strong>Warranty Provider:</strong> <?php echo htmlspecialchars($warranty->provider); ?></p>
                <p><strong>Terms and Conditions:</strong> <?php echo nl2br(htmlspecialchars($warranty->terms)); ?></p>
                <p><strong>Status:</strong> <?php echo htmlspecialchars($warranty->status); ?></p>
            </div>
            <div class="card-footer">
                <a href="/warranty/list" class="btn btn-primary">Back to Warranty List</a>
            </div>
        </div>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>