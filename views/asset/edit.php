<?php
// filepath: /computer-asset-management/computer-asset-management/views/asset/edit.php

// Assuming $asset is an associative array containing the asset details to be edited
// Example: $asset = ['id' => 1, 'name' => 'Computer A', 'specs' => 'Intel i7, 16GB RAM', 'location' => 'Office 1'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Asset</title>
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="/assets/css/style.css">
</head>
<body>
    <div class="container mt-5">
        <h2>Edit Asset</h2>
        <form action="/asset/update/<?php echo $asset['id']; ?>" method="POST">
            <div class="mb-3">
                <label for="name" class="form-label">Asset Name</label>
                <input type="text" class="form-control" id="name" name="name" value="<?php echo htmlspecialchars($asset['name']); ?>" required>
            </div>
            <div class="mb-3">
                <label for="specs" class="form-label">Specifications</label>
                <textarea class="form-control" id="specs" name="specs" required><?php echo htmlspecialchars($asset['specs']); ?></textarea>
            </div>
            <div class="mb-3">
                <label for="location" class="form-label">Location</label>
                <input type="text" class="form-control" id="location" name="location" value="<?php echo htmlspecialchars($asset['location']); ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update Asset</button>
            <a href="/asset/list" class="btn btn-secondary">Cancel</a>
        </form>
    </div>

    <script src="/assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>