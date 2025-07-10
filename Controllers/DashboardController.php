<?php
declare(strict_types=1);

namespace App\Controllers;

require __DIR__ . '/../vendor/autoload.php';

use App\Models\Asset;
use App\Models\Invoice;
use App\Models\Warranty;

class DashboardController
{
    private Asset $assetModel;
    private Invoice $invoiceModel;
    private Warranty $warrantyModel;

    public function __construct()
    {
        $this->assetModel = new Asset();
        $this->invoiceModel = new Invoice();
        $this->warrantyModel = new Warranty();
    }

    public function index()
    {
        echo "Dashboard works!";
    }
}

$controllerName = 'App\\Controllers\\' . ucfirst($pathParts[0] ?? 'dashboard') . 'Controller';
?>