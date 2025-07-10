<?php

class Warranty {
    private int $id;
    private int $assetId;
    private string $warrantyProvider;
    private DateTime $startDate;
    private DateTime $endDate;
    private string $terms;

    public function __construct(int $assetId, string $warrantyProvider, DateTime $startDate, DateTime $endDate, string $terms) {
        $this->assetId = $assetId;
        $this->warrantyProvider = $warrantyProvider;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->terms = $terms;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getAssetId(): int {
        return $this->assetId;
    }

    public function getWarrantyProvider(): string {
        return $this->warrantyProvider;
    }

    public function getStartDate(): DateTime {
        return $this->startDate;
    }

    public function getEndDate(): DateTime {
        return $this->endDate;
    }

    public function getTerms(): string {
        return $this->terms;
    }

    public function isWarrantyValid(): bool {
        $currentDate = new DateTime();
        return $currentDate >= $this->startDate && $currentDate <= $this->endDate;
    }

    public function save(): bool {
        // Logic to save warranty details to the database
        // This would typically involve preparing a SQL statement and executing it
        return true; // Return true on success
    }

    public static function findById(int $id): ?Warranty {
        // Logic to find a warranty by its ID from the database
        return null; // Return the found Warranty object or null if not found
    }

    public static function findByAssetId(int $assetId): array {
        // Logic to find all warranties associated with a specific asset ID
        return []; // Return an array of Warranty objects
    }
}