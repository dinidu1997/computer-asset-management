<?php

class Department {
    private int $id;
    private string $name;
    private string $description;

    public function __construct(int $id, string $name, string $description) {
        $this->id = $id;
        $this->name = $name;
        $this->description = $description;
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

    public function setName(string $name): void {
        $this->name = $name;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }

    public static function findAll(mysqli $conn): array {
        $departments = [];
        $result = $conn->query("SELECT * FROM departments");

        while ($row = $result->fetch_assoc()) {
            $departments[] = new self($row['id'], $row['name'], $row['description']);
        }

        return $departments;
    }

    public static function findById(mysqli $conn, int $id): ?self {
        $stmt = $conn->prepare("SELECT * FROM departments WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($row = $result->fetch_assoc()) {
            return new self($row['id'], $row['name'], $row['description']);
        }

        return null;
    }

    public function save(mysqli $conn): bool {
        if ($this->id) {
            $stmt = $conn->prepare("UPDATE departments SET name = ?, description = ? WHERE id = ?");
            $stmt->bind_param("ssi", $this->name, $this->description, $this->id);
        } else {
            $stmt = $conn->prepare("INSERT INTO departments (name, description) VALUES (?, ?)");
            $stmt->bind_param("ss", $this->name, $this->description);
        }

        return $stmt->execute();
    }

    public function delete(mysqli $conn): bool {
        $stmt = $conn->prepare("DELETE FROM departments WHERE id = ?");
        $stmt->bind_param("i", $this->id);
        return $stmt->execute();
    }
}