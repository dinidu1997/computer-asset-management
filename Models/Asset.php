<?php

class Asset {
    private int $id;
    private string $name;
    private string $description;
    private string $serialNumber;
    private string $status;
    private string $location;
    private string $department;
    private DateTime $purchaseDate;
    private DateTime $warrantyExpiry;

    public function __construct(int $id, string $name, string $description, string $serialNumber, string $status, string $location, string $department, DateTime $purchaseDate, DateTime $warrantyExpiry) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
        $this->serialNumber = $serialNumber;
        $this->status = $status;
        $this->location = $location;
        $this->department = $department;
        $this->purchaseDate = $purchaseDate;
        $this->warrantyExpiry = $warrantyExpiry;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function getSerialNumber(): string {
        return $this->serialNumber;
    }

    public function getStatus(): string {
        return $this->status;
    }

    public function getLocation(): string {
        return $this->location;
    }

    public function getDepartment(): string {
        return $this->department;
    }

    public function getPurchaseDate(): DateTime {
        return $this->purchaseDate;
    }

    public function getWarrantyExpiry(): DateTime {
        return $this->warrantyExpiry;
    }

    public function save(): bool {
        // Logic to save the asset to the database
        // This would typically involve preparing a SQL statement and executing it
        return true; // Return true on success
    }

    public function update(): bool {
        // Logic to update the asset in the database
        return true; // Return true on success
    }

    public function delete(): bool {
        // Logic to delete the asset from the database
        return true; // Return true on success
    }

    public static function findById(int $id): ?Asset {
        // Logic to find an asset by its ID from the database
        return null; // Return the Asset object or null if not found
    }

    public static function all(): array {
        // Logic to retrieve all assets from the database
        return []; // Return an array of Asset objects
    }
}