<?php

/*
CREATE TABLE Section (
	id int NOT NULL UNIQUE AUTO_INCREMENT,
    designation varchar(3),
    description varchar(100),
    PRIMARY KEY (id)
);
*/

class Section {
    private int $id;
    private string $designation;
    private string $description;

    public function __construct(int $id, string $designation, string $description) {
        $this->id = $id;
        $this->designation = $designation;
        $this->description = $description;
    }

    public function getId(): int {
        return $this->id;
    }

    public function setId(int $id): void {
        $this->id = $id;
    }

    public function getDesignation(): string {
        return $this->designation;
    }

    public function setDesignation(string $designation): void {
        $this->designation = $designation;
    }

    public function getDescription(): string {
        return $this->description;
    }

    public function setDescription(string $description): void {
        $this->description = $description;
    }
}

?>