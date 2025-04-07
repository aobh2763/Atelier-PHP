<?php

/*
CREATE TABLE Etudiant (
	id int UNIQUE NOT NULL AUTO_INCREMENT,
    name varchar(40),
    birthday date,
    image varchar(100),
    section varchar(3),
    PRIMARY KEY (id)
);
*/

class Etudiant {
    private int $id;
    private string $name;
    private string $birthday;
    private string $image;
    private string $section;

    public function __construct(int $id, string $name, string $birthday, string $image, string $section) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
        $this->image = $image;
        $this->section = $section;
    }

    public function getId(): int {
        return $this->id;
    }

    public function getName(): string {
        return $this->name;
    }

    public function getBirthday(): string {
        return $this->birthday;
    }

    public function getSection(): string {
        return $this->section;
    }
}

?>