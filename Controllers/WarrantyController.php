<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Warranty;

class WarrantyController
{
    private Warranty $warrantyModel;

    public function __construct()
    {
        $this->warrantyModel = new Warranty();
    }

    public function index(): void
    {
        $warranties = $this->warrantyModel->getAllWarranties();
        require __DIR__ . '/../views/warranty/list.php';
    }

    public function detail(int $id): void
    {
        $warranty = $this->warrantyModel->getWarrantyById($id);
        if (!$warranty) {
            throw new Exception('Warranty not found', 404);
        }
        require __DIR__ . '/../views/warranty/detail.php';
    }

    public function create(): void
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'asset_id' => $_POST['asset_id'],
                'warranty_period' => $_POST['warranty_period'],
                'warranty_details' => $_POST['warranty_details'],
            ];
            $this->warrantyModel->createWarranty($data);
            header('Location: /warranty');
            exit;
        }
        require __DIR__ . '/../views/warranty/create.php';
    }

    public function edit(int $id): void
    {
        $warranty = $this->warrantyModel->getWarrantyById($id);
        if (!$warranty) {
            throw new Exception('Warranty not found', 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = [
                'warranty_period' => $_POST['warranty_period'],
                'warranty_details' => $_POST['warranty_details'],
            ];
            $this->warrantyModel->updateWarranty($id, $data);
            header('Location: /warranty');
            exit;
        }
        require __DIR__ . '/../views/warranty/edit.php';
    }

    public function delete(int $id): void
    {
        $this->warrantyModel->deleteWarranty($id);
        header('Location: /warranty');
        exit;
    }
}