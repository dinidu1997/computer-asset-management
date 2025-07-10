<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Asset;
use App\Models\Invoice;
use App\Models\Warranty;
use App\Models\Department;

class ReportController
{
    public function departmentReport()
    {
        // Fetch department-wise asset data
        $departments = Department::getAll();
        $reportData = [];

        foreach ($departments as $department) {
            $assets = Asset::getByDepartment($department->id);
            $reportData[$department->name] = [
                'total_assets' => count($assets),
                'warranty_count' => Warranty::countByDepartment($department->id),
                'invoice_count' => Invoice::countByDepartment($department->id),
            ];
        }

        // Load the report view
        require __DIR__ . '/../views/report/department.php';
    }

    public function summaryReport()
    {
        // Fetch overall asset data
        $totalAssets = Asset::countAll();
        $totalInvoices = Invoice::countAll();
        $totalWarranties = Warranty::countAll();

        // Prepare summary data
        $summaryData = [
            'total_assets' => $totalAssets,
            'total_invoices' => $totalInvoices,
            'total_warranties' => $totalWarranties,
        ];

        // Load the summary report view
        require __DIR__ . '/../views/report/summary.php';
    }
}