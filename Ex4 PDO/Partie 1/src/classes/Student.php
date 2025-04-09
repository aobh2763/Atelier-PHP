<?php
include_once "ConnectionBD.php";

class Student {
    private int $id;
    private string $name;
    private string $birthday;

    public function __construct(int $id, string $name, string $birthday) {
        $this->id = $id;
        $this->name = $name;
        $this->birthday = $birthday;
    }

    public function storeStudent() {
        $bd = ConnectionBD::getInstance();

        $reponse = $bd->query("SELECT * FROM Student WHERE id = $this->id");

        if ($reponse->rowCount() > 0) {
            echo "L'étudiant exist déja, utiliser getStudientById<br>";
            return;
        }

        $req = $bd->prepare("INSERT INTO Student (id, name, birthday) VALUES (?, ?, ?)");
        $req->execute(array($this->id, $this->name, $this->birthday));
    }

    public static function getStudentById(int $id) {
        $bd = ConnectionBD::getInstance();

        $req = $bd->prepare("SELECT * FROM Student WHERE id = ?");
        $req->execute(array($id));

        if ($req->rowCount() == 0) {
            return null;
        }

        $data = $req->fetch(PDO::FETCH_ASSOC);

        return new Student($data['id'], $data['name'], $data['birthday']);
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

}

?>