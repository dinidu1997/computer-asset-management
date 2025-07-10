<?php
// filepath: /computer-asset-management/computer-asset-management/views/report/department.php

// Include necessary files
require_once __DIR__ . '/../../config/database.php';
require_once __DIR__ . '/../../models/Department.php';
require_once __DIR__ . '/../../models/Asset.php';

// Fetch department data
$departmentModel = new Department();
$departments = $departmentModel->getAllDepartments();

// Fetch asset data by department
$assetModel = new Asset();
$assetsByDepartment = [];
foreach ($departments as $department) {
    $assetsByDepartment[$department['id']] = $assetModel->getAssetsByDepartment($department['id']);
}

// Include header
include __DIR__ . '/../partials/header.php';
?>

<div class="container">
    <h1 class="mt-4">Department-wise Asset Report</h1>
    <div class="row">
        <?php foreach ($departments as $department): ?>
            <div class="col-md-6">
                <h3><?php echo htmlspecialchars($department['name']); ?></h3>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Asset Name</th>
                            <th>Specifications</th>
                            <th>Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($assetsByDepartment[$department['id']])): ?>
                            <?php foreach ($assetsByDepartment[$department['id']] as $asset): ?>
                                <tr>
                                    <td><?php echo htmlspecialchars($asset['name']); ?></td>
                                    <td><?php echo htmlspecialchars($asset['specifications']); ?></td>
                                    <td><?php echo htmlspecialchars($asset['status']); ?></td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="3" class="text-center">No assets found for this department.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        <?php endforeach; ?>
    </div>
</div>

<?php
// Include footer
include __DIR__ . '/../partials/footer.php';
?>