<?php

class Etudiant {
    private $nom;
    private $notes;

    public function __construct($nom) {
        $this->nom = $nom;
        $this->notes = array();
    }

    public function getNom() {
        return $this->nom;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function addNote(float $note) {
        if ($note < 0 && $note > 20) {
            return;
        }

        array_push($this->notes, $note);
    }

    public function getNotes() {
        return $this->notes;
    }

    public function afficheNotes() {
        return "TBD";
    }

    public function calculMoyenne() {
        $moy = 0;
        $nb_notes = count($this->notes);
        if ($nb_notes == 0) {
            return 0.0;
        }

        foreach ($this->notes as $note) {
            $moy += $note;
        }
        $moy = $moy / $nb_notes;

        return (float) $moy;
    }

    public function admisOuNon() {
        if ($this->calculMoyenne() >= 10) {
            return "Admis";
        } else {
            return "Non admis";
        }
    }
}

?>