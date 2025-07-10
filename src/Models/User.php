<?php

class User {
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $role;

    public function __construct(int $id, string $username, string $password, string $email, string $role) {
        $this->id = $id;
        $this->username = $username;
        $this->password = password_hash($password, PASSWORD_DEFAULT);
        $this->email = $email;
        $this->role = $role;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function verifyPassword(string $password): bool {
        return password_verify($password, $this->password);
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function setEmail(string $email): void {
        $this->email = $email;
    }

    public function setRole(string $role): void {
        $this->role = $role;
    }

    public function save(): bool {
        // Logic to save user data to the database
        return true;
    }

    public static function findById(int $id): ?User {
        // Logic to find a user by ID from the database
        return null; // Placeholder return
    }

    public static function findByUsername(string $username): ?User {
        // Logic to find a user by username from the database
        return null; // Placeholder return
    }
}