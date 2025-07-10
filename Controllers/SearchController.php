<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Asset;

class SearchController
{
    public function index()
    {
        $searchTerm = $_GET['search'] ?? '';
        $assets = [];

        if ($searchTerm) {
            $assetModel = new Asset();
            $assets = $assetModel->searchAssets($searchTerm);
        }

        require __DIR__ . '/../views/search/index.php';
    }
}
?>