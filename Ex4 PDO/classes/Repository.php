<?php

require_once 'ConnectionBD.php';
require_once 'Etudiant.php';
require_once 'Section.php';
require_once 'Utilisateur.php';

class Repository {
    private string $nomTable;

    public function __construct(string $nomTable) {
        $this->nomTable = $nomTable;
    }

    // Retourne un tableau d'objets de la classe correspondante à la table
    public function findAll() {
        $bd = ConnectionBD::getInstance();

        $req = $bd->prepare("SELECT * FROM " . $this->nomTable . " ORDER BY id ASC");
        $req->execute();

        $donnees = $req->fetchAll(PDO::FETCH_ASSOC);

        switch (strtolower($this->nomTable)) {
            case 'etudiant':
                return array_map(function ($donnee) {
                    return new Etudiant($donnee['id'], $donnee['name'], $donnee['birthday'], $donnee['image'], $donnee['section']);
                }, $donnees);
            case 'section':
                return array_map(function ($donnee) {
                    return new Section($donnee['id'], $donnee['designation'], $donnee['description']);
                }, $donnees);
            case 'utilisateur':
                return array_map(function ($donnee) {
                    return new Utilisateur($donnee['id'], $donnee['username'], $donnee['password'], $donnee['email']);
                }, $donnees);
            default:
                echo "Table non reconnue : " . $this->nomTable;
                return null;
        }
    }

    // Retourne un objet de la classe correspondante à la table ou null si l'id n'existe pas
    public function findById(int $id) {
        $bd = ConnectionBD::getInstance();

        $req = $bd->prepare("SELECT * FROM " . $this->nomTable . " WHERE id = ?");
        $req->execute(array($id));

        $donnee = $req->fetch(PDO::FETCH_ASSOC);

        if ($donnee) {
            switch (strtolower($this->nomTable)) {
                case 'etudiant':
                    return new Etudiant($donnee['id'], $donnee['name'], $donnee['birthday'], $donnee['image'], $donnee['section']);
                case 'section':
                    return new Section($donnee['id'], $donnee['designation'], $donnee['description']);
                case 'utilisateur':
                    return new Utilisateur($donnee['id'], $donnee['username'], $donnee['password'], $donnee['email']);
                default:
                    echo "Table non reconnue : " . $this->nomTable;
                    return null;
            }
        } else {
            return null;
        }
    }

    // Retourne l'id de l'objet créé ou -1 en cas d'erreur
    public function create(array $details): int {
        $bd = ConnectionBD::getInstance();

        switch (strtolower($this->nomTable)) {
            case 'etudiant':
                if (count($details) != 4) {
                    echo "Erreur : Il fault 4 paramètres (name, birthday, image, section).";
                    return -1;
                }
                $req = $bd->prepare("INSERT INTO etudiant (name, birthday, image, section) VALUES (?, ?, ?, ?)");
                $req->execute(array($details[0], $details[1], $details[2], $details[3]));
                return $bd->lastInsertId();
            case 'section':
                if (count($details) != 2) {
                    echo "Erreur : Il fault 2 paramètres (designation, description).";
                    return -1;
                }
                $req = $bd->prepare("INSERT INTO section (designation, description) VALUES (?, ?)");
                $req->execute(array($details[0], $details[1]));
                return $bd->lastInsertId();
            case 'utilisateur':
                if (count($details) != 3) {
                    echo "Erreur : Il fault 3 paramètres (username, password, email).";
                    return -1;
                }
                $req = $bd->prepare("INSERT INTO utilisateur (username, password, email) VALUES (?, ?, ?)");
                $req->execute(array($details[0], password_hash($details[1], PASSWORD_BCRYPT), $details[2]));
                return $bd->lastInsertId();
            default:
                echo "Table non reconnue : " . $this->nomTable;
                return -1;
        }
    }

    // Supprime l'objet de la table et retourne true si la suppression a réussi, sinon false si l'id n'existe pas
    public function delete(int $id): bool {
        $bd = ConnectionBD::getInstance();

        $req = $bd->prepare("DELETE FROM " . $this->nomTable . " WHERE id = ?");
        $req->execute(array($id));

        return ($req->rowCount() > 0);
    }
}

?>