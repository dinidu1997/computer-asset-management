<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Asset;
use Exception;

class AssetController
{
    public function index()
    {
        $assets = Asset::getAll();
        require __DIR__ . '/../views/asset/list.php';
    }

    public function detail(int $id)
    {
        $asset = Asset::getById($id);
        if (!$asset) {
            throw new Exception('Asset not found', 404);
        }
        require __DIR__ . '/../views/asset/detail.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['asset'];
            Asset::create($data);
            header('Location: /assets');
            exit;
        }
        require __DIR__ . '/../views/asset/create.php';
    }

    public function edit(int $id)
    {
        $asset = Asset::getById($id);
        if (!$asset) {
            throw new Exception('Asset not found', 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST['asset'];
            Asset::update($id, $data);
            header('Location: /assets/' . $id);
            exit;
        }
        require __DIR__ . '/../views/asset/edit.php';
    }

    public function delete(int $id)
    {
        Asset::delete($id);
        header('Location: /assets');
        exit;
    }
}