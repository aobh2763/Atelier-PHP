<?php

require_once __DIR__."\ConnectionBD.php";
require_once __DIR__."\..\Model\Etudiant.php";
require_once __DIR__."\..\Model\Section.php";
require_once __DIR__."\..\Model\Utilisateur.php";

class Repository {
    private string $nomTable;

    public function __construct(string $nomTable) {
        $this->nomTable = $nomTable;
    }

    // Retourne un tableau d'objets de la classe correspondante à la table (fix)
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
                    return new Utilisateur($donnee['id'], $donnee['username'], $donnee['password'], $donnee['email'], $donnee["role"]);
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
                    return new Utilisateur($donnee['id'], $donnee['username'], $donnee['password'], $donnee['email'], $donnee["role"]);
                default:
                    echo "Table non reconnue : " . $this->nomTable;
                    return null;
            }
        } else {
            return null;
        }
    }

    // Retourne l'id de l'objet créé
    public function create(array $details): int {
        $bd = ConnectionBD::getInstance();

        $keys = array_keys($details);
        $keyString = implode(",", $keys);
        $paramselements = array_fill(0, count($keys), "?");
        $paramString = implode(",", $paramselements);

        $req = "INSERT INTO $this->nomTable ($keyString) VALUES ($paramString);";
        $reponse = $bd->prepare($req);
        $reponse->execute(array_values($details));

        return $bd->lastInsertId();
    }

    // Retourne le nombre de lignes affectées
    public function update(array $details): int {
        $bd = ConnectionBD::getInstance();

        $keyValuePairs = implode(",", array_map(function ($key) {
            return $key !== 'id' ? "$key=?" : null;
        }, array_keys($details)));
        $keyValuePairs = implode(",", array_filter(explode(",", $keyValuePairs)));

        $req = "UPDATE $this->nomTable SET $keyValuePairs WHERE id=?;";
        $reponse = $bd->prepare($req);
        $values = array_values(array_filter($details, fn($key) => $key !== 'id', ARRAY_FILTER_USE_KEY));
        $values[] = $details['id'];
        $reponse->execute($values);

        return $reponse->rowCount();
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