<?php

class Utilisateur {
    private int $id;
    private string $username;
    private string $password;
    private string $email;
    private string $role;

    public function __construct(int $id, string $username, string $password, string $email) {
        $this->id = $id;
        $this->username = $username;
        $this->password = $password;
        $this->email = $email;
        $this->role = "user";
    }

    public function getId(): int {
        return $this->id;
    }

    public function getUsername(): string {
        return $this->username;
    }

    public function setUsername(string $username): void {
        $this->username = $username;
    }

    public function getEmail(): string {
        return $this->email;
    }

    public function getRole(): string {
        return $this->role;
    }

    public function getPassword(): string {
        return $this->password;
    }

    public function setRole(string $role): void {
        if ($role === 'admin' || $role === 'user') {
            $this->role = $role;
        } else {
            echo "Invalid role. Please set to 'admin' or 'user'.";
        }
    }
}

?>