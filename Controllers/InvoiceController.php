<?php
declare(strict_types=1);

namespace App\Controllers;

use App\Models\Invoice;

class InvoiceController
{
    private Invoice $invoiceModel;

    public function __construct()
    {
        $this->invoiceModel = new Invoice();
    }

    public function list()
    {
        $invoices = $this->invoiceModel->getAllInvoices();
        require __DIR__ . '/../views/invoice/list.php';
    }

    public function detail(int $id)
    {
        $invoice = $this->invoiceModel->getInvoiceById($id);
        if (!$invoice) {
            throw new Exception('Invoice not found', 404);
        }
        require __DIR__ . '/../views/invoice/detail.php';
    }

    public function create()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST; // Validate and sanitize input data
            $this->invoiceModel->createInvoice($data);
            header('Location: /invoices');
            exit;
        }
        require __DIR__ . '/../views/invoice/create.php';
    }

    public function edit(int $id)
    {
        $invoice = $this->invoiceModel->getInvoiceById($id);
        if (!$invoice) {
            throw new Exception('Invoice not found', 404);
        }

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $data = $_POST; // Validate and sanitize input data
            $this->invoiceModel->updateInvoice($id, $data);
            header('Location: /invoices/' . $id);
            exit;
        }
        require __DIR__ . '/../views/invoice/edit.php';
    }

    public function delete(int $id)
    {
        $this->invoiceModel->deleteInvoice($id);
        header('Location: /invoices');
        exit;
    }
}