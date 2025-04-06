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
        if ($note < 0 || $note > 20) {
            return;
        }

        array_push($this->notes, $note);
    }

    public function setNotes(array $notes) {
        foreach ($notes as $note) {
            if ($note < 0 || $note > 20) {
                return;
            }
        }

        $this->notes = $notes;
    }

    public function getNotes() {
        return $this->notes;
    }

    public function afficherNotes() {
        echo "<div class=\"bg-light border-dark-subtle border rounded p-1\">" . $this->nom . "</div>\n";

        $curr_class = "";

        foreach ($this->notes as $note) {
            if ($note > 10) {
                $curr_class = "bg-success-subtle";
            } elseif ($note < 10) {
                $curr_class = "bg-danger-subtle";
            } else {
                $curr_class = "bg-warning-subtle";
            }

            echo "<div class=\"" . $curr_class . "border-dark-subtle border rounded p-1\">" . $note . "</div>\n";
        }

        echo "<div class=\"bg-primary-subtle border-dark-subtle border rounded p-1\">Votre moyenne est : " . $this->calculMoyenne() . "</div>\n";
        echo "<div class=\"bg-dark-subtle border-light-subtle border rounded p-1\">" . $this->admisOuNon() . "</div>";

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