<?php

class Invoice {
    private int $id;
    private int $assetId;
    private float $amount;
    private string $issueDate;
    private string $dueDate;
    private string $status;

    public function __construct(int $id, int $assetId, float $amount, string $issueDate, string $dueDate, string $status) {
        $this->id = $id;
        $this->assetId = $assetId;
        $this->amount = $amount;
        $this->issueDate = $issueDate;
        $this->dueDate = $dueDate;
        $this->status = $status;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getAssetId(): int {
        return $this->assetId;
    }

    public function getAmount(): float {
        return $this->amount;
    }

    public function getIssueDate(): string {
        return $this->issueDate;
    }

    public function getDueDate(): string {
        return $this->dueDate;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function setStatus(string $status): void {
        $this->status = $status;
    }

    public function save(): bool {
        // Logic to save the invoice to the database
        // This would typically involve preparing a SQL statement and executing it
        return true; // Placeholder return value
    }

    public static function findById(int $id): ?Invoice {
        // Logic to find an invoice by its ID from the database
        // This would typically involve a database query
        return null; // Placeholder return value
    }

    public static function all(): array {
        // Logic to retrieve all invoices from the database
        // This would typically involve a database query
        return []; // Placeholder return value
    }
}